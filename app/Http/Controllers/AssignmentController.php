<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;
use App\Models\Rider;

class AssignmentController extends Controller
{
    public function create()
    {
        $bikes = Bike::doesntHave('riders')->get();
        $riders = Rider::doesntHave('bikes')->get();
        
        return view('assignment.create', compact('bikes', 'riders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bike_id' => 'required',
            'rider_id' => 'required',
        ]);

        $bike = Bike::findOrFail($request->bike_id);
        if ($bike->riders()->exists()) {
            return back()->with('msg', 'This bike is already assigned.');
        }
        $bike->riders()->attach($request->rider_id, ['assigned_at' => now()]);
        return redirect()->route('assignment.create')->with('msg', 'Assignment successful!');
    }

    public function index()
    {
        $assignments = Bike::with(['riders' => function ($query) {
            $query->withPivot('assigned_at');
        }])->get();

        return view('assignment.index', compact('assignments'));
    }

    public function unassign($bike_id, $rider_id)
    {
        $bike = Bike::findOrFail($bike_id);
        $bike->riders()->detach($rider_id);
 
       return redirect()->back()->with('msg', 'Assignment removed.');
    }

    public function edit($bike_id, $rider_id)
    {
        $bikes = Bike::doesntHave('riders')->orWhere('id', $bike_id)->get();
        $riders = Rider::doesntHave('bikes')->orWhere('id', $rider_id)->get();
        $currentBike = Bike::findOrFail($bike_id);
        $currentRider = Rider::findOrFail($rider_id);

        return view('assignment.edit', compact('bikes', 'riders', 'currentBike', 'currentRider'));
    }

    public function update(Request $request, $bike_id, $rider_id)
    {
        $request->validate([
            'bike_id' => 'required',
            'rider_id' => 'required'
        ]);

        $oldBike = Bike::findOrFail($bike_id);
        $oldBike->riders()->detach($rider_id);

        $newBike = Bike::findOrFail($request->bike_id);
        $newBike->riders()->attach($request->rider_id, ['assigned_at' => now()]);

        return redirect()->back()->with('msg', 'Assignment updated.');
    }
}
