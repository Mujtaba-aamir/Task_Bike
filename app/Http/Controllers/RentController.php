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
        $request->validate([
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

        $assignments = [];

        foreach ($bike->riders as $index => $rider) {
            $start = Carbon::parse($rider->pivot->assigned_at)->startOfDay();
            $end = $rider->pivot->unassigned_at
                ? Carbon::parse($rider->pivot->unassigned_at)->startOfDay()
                : $endOfMonth;

            $from = $start->lt($month) ? $month : $start;
            $to = $end->gt($endOfMonth) ? $endOfMonth : $end;

            if ($to->lt($month) || $from->gt($endOfMonth)) continue;

            $assignments[] = [
                'type' => 'rider',
                'name' => $rider->full_name,
                'from' => $from,
                'to' => $to,
            ];
        }

        usort($assignments, fn($a, $b) => $a['from']->timestamp <=> $b['from']->timestamp);

        $results = [];
        $currentDay = $month->copy();

        foreach ($assignments as $entry) {
            if ($entry['from']->gt($currentDay)) {
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

            $riderDays = $entry['from']->diffInDays($entry['to']) + 1;
            $results[] = [
                'rider' => $entry['name'],
                'assigned_from' => $entry['from']->format('Y-m-d'),
                'assigned_to' => $entry['to']->format('Y-m-d'),
                'assigned_days' => $riderDays,
                'calculated_rent' => round($dailyRate * $riderDays, 2),
            ];

            $currentDay = $entry['to']->copy()->addDay();
        }

        if ($currentDay->lte($endOfMonth)) {
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
