<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;
use App\Models\Rider;

class AssignmentController extends Controller
{
    public function create()
    {
        $bikes = Bike::whereDoesntHave('riders', function ($query) {
            $query->where('bike_rider.status', 'assigned');
        })->get();

        $riders = Rider::where('status', 'active')->whereDoesntHave('bikes', function ($query) {
            $query->where('bike_rider.status', 'assigned');
        })->get();

        return view('assignment.create', compact('bikes', 'riders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bike_id' => 'required|exists:bikes,id',
            'rider_id' => 'required|exists:riders,id',
            'date'    => 'required|date|after:today'
        ]);

        $bike = Bike::findOrFail($request->bike_id);

        // Make sure the bike isn't already assigned
        if ($bike->riders()->wherePivot('status', 'assigned')->exists()) {
            return back()->with('msg', 'This bike is already assigned.');
        }

        $bike->riders()->attach($request->rider_id, [
            'assigned_at' => $request->date,
            'status' => 'assigned'
        ]);

        return redirect()->route('assignment.create')->with('msg', 'Assignment successful!');
    }

    public function index()
    {
        $assignments = Bike::whereHas('riders', function ($query) {
            $query->where('bike_rider.status', 'assigned');
        })->with(['riders' => function ($query) {
            $query->wherePivot('status', 'assigned')->withPivot('assigned_at');
        }])->get();

        return view('assignment.index', compact('assignments'));
    }

    public function unassign($bike_id, $rider_id)
    {
    $bike = Bike::findOrFail($bike_id);

    $bike->riders()->updateExistingPivot($rider_id, [
        'status' => 'unassigned',
        'unassigned_at' => now()
    ]);

    return redirect()->back()->with('msg', 'Bike unassigned');
    }


    public function edit($bike_id, $rider_id)
    {
    $bikes = Bike::whereDoesntHave('riders', function ($query) {
        $query->where('bike_rider.status', 'assigned');
    })->orWhere('id', $bike_id)->get();

    $riders = Rider::where('status', 'active')->whereDoesntHave('bikes', function ($query) {
        $query->where('bike_rider.status', 'assigned');
    })->orWhere('id', $rider_id)->get();

    $currentBike = Bike::findOrFail($bike_id);

    // 👇 This line loads the rider via relationship with pivot data
    $currentRider = $currentBike->riders()->where('riders.id', $rider_id)->first();

    return view('assignment.edit', compact('bikes', 'riders', 'currentBike', 'currentRider'));
    }


    public function update(Request $request, $bike_id, $rider_id)
    {
        $request->validate([
            'bike_id' => 'required|exists:bikes,id',
            'rider_id' => 'required|exists:riders,id',
            'date'    => 'required|date|after:today'
        ]);

        // Unassign old assignment (mark as unassigned)
        $oldBike = Bike::findOrFail($bike_id);
        $oldBike->riders()->updateExistingPivot($rider_id, [
            'status' => 'unassigned'
        ]);

        // Assign new relationship
        $newBike = Bike::findOrFail($request->bike_id);
        $newBike->riders()->attach($request->rider_id, [
            'assigned_at' => $request->date,
            'status' => 'assigned'
        ]);

        return redirect()->route('assignment.index')->with('msg', 'Assignment updated.');
    }

    public function unassignedIndex()
    {
    $unassigned = Bike::whereHas('riders', function ($query) {
        $query->where('bike_rider.status', 'unassigned');
    })->with(['riders' => function ($query) {
        $query->wherePivot('status', 'unassigned')
              ->withPivot('assigned_at', 'unassigned_at'); // 🆕 Include here
    }])->get();

    return view('assignment.unassigned', compact('unassigned'));
    }

}


