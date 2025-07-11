<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;
use Carbon\Carbon;

class RentController extends Controller
{
    public function create()
    {
        $bikes = Bike::all();
        return view('rent.create', compact('bikes'));
    }

    public function calculateRent(Request $request)
    {
        $request->validate([  //validates input
            'bike_id' => 'required',
            'month' => 'required|date_format:Y-m',
            'monthly_rent' => 'required|integer|min:1',
        ]);

        $monthly_rent = $request->monthly_rent;
        $bike = Bike::with('riders')->findOrFail($request->bike_id);
        $month = Carbon::parse($request->month)->startOfMonth()->startOfDay();
        $endOfMonth = $month->copy()->endOfMonth()->startOfDay();
        $daysInMonth = $month->daysInMonth;
        $dailyRate = round($monthly_rent / $daysInMonth, 2); 

        $assignments = [];  //array to hold the data of each rider

        foreach ($bike->riders as $index => $rider) {
            $start = Carbon::parse($rider->pivot->assigned_at)->startOfDay();
            $end = $rider->pivot->unassigned_at  
                ? Carbon::parse($rider->pivot->unassigned_at)->startOfDay() //if the user is unassigned then that date of unassigned_at will be taken as $end
                : $endOfMonth; //otherwise bike will be considered to be assigned for month

            $from = $start->lt($month) ? $month : $start;
            $to = $end->gt($endOfMonth) ? $endOfMonth : $end;

            if ($to->lt($month) || $from->gt($endOfMonth)) continue; //if assignment was done before that specific month or after then data of that rider will not be added in array 

            $assignments[] = [
                'type' => 'rider',
                'name' => $rider->full_name,
                'from' => $from,
                'to' => $to,
            ];
        }

        usort($assignments, fn($a, $b) => $a['from']->timestamp <=> $b['from']->timestamp); //it sorts all the entries date wise by taking two entries from the array at a time

        $results = [];
        $currentDay = $month->copy();

        foreach ($assignments as $entry) {
            if ($entry['from']->gt($currentDay)) { //if any gap occur in assigned dates of two consecutive assignments, then it will be considered company expense
                $gapStart = $currentDay;
                $gapEnd = $entry['from']->copy()->subDay();
                $gapDays = $gapStart->diffInDays($gapEnd) + 1;

                $results[] = [
                    'rider' => 'Company Expense',
                    'assigned_from' => $gapStart->format('Y-m-d'),
                    'assigned_to' => $gapEnd->format('Y-m-d'),
                    'assigned_days' => $gapDays,
                    'calculated_rent' => round($dailyRate * $gapDays, 2), 
                ];
            }

            $riderDays = $entry['from']->diffInDays($entry['to']) + 1; //rent is calculated for the time bike was assigned
            $results[] = [
                'rider' => $entry['name'],
                'assigned_from' => $entry['from']->format('Y-m-d'),
                'assigned_to' => $entry['to']->format('Y-m-d'),
                'assigned_days' => $riderDays,
                'calculated_rent' => round($dailyRate * $riderDays, 2),
            ];

            $currentDay = $entry['to']->copy()->addDay();
        }

        if ($currentDay->lte($endOfMonth)) { //after all entries of rider, if month is not completed then remaining days will be considered as company expense.
            $gapDays = $currentDay->diffInDays($endOfMonth) + 1;
            $results[] = [
                'rider' => 'Company Expense',
                'assigned_from' => $currentDay->format('Y-m-d'),
                'assigned_to' => $endOfMonth->format('Y-m-d'),
                'assigned_days' => $gapDays,
                'calculated_rent' => round($dailyRate * $gapDays, 2),
            ];
        }

        return view('rent.index', compact(
            'results', 'bike', 'month', 'daysInMonth', 'monthly_rent'
        ));
    }
}
