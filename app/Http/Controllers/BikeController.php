<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;
use App\Models\Rider;


class BikeController extends Controller
{
    public function createBike()
    {
        return view ('bike.create');
    }

    public function storeBike(Request $request)
    {
        $bike = $request->validate([
            'plate_number' => 'required|unique:bikes,plate_number',
            'model' => 'required',
            'model_year' => 'required|integer',
            'chassis_number' => 'required|unique:bikes,chassis_number',
            'engine_number' => 'required|unique:bikes,engine_number',
            'mulkiya_front_image' => 'required|image',
            'mulkiya_back_image' => 'required|image'
        ]);

        $bike['mulkiya_front_image'] = $request->file('mulkiya_front_image')->store('mulkiya_images', 'public');
        $bike['mulkiya_back_image'] = $request->file('mulkiya_back_image')->store('mulkiya_images', 'public');

        $createdBike=Bike::create([
            'plate_number' => $bike['plate_number'],
            'model' => $bike['model'],
            'model_year' => $bike['model_year'],
            'chassis_number' => $bike['chassis_number'],
            'engine_number' => $bike['engine_number'],
            'mulkiya_front_image' => $bike['mulkiya_front_image'],
            'mulkiya_back_image' => $bike['mulkiya_back_image']
        ]);

        if($createdBike){
            return redirect()->route('bike.create')->with('msg', 'Bike Registered Successfully');
        }         
        return redirect()->route('bike.create')->with('msg', 'Bike Registration Unsuccessful');
    }

    public function indexBike()
    {
        $bikes = Bike::all();
        return view('bike.index', compact('bikes'));
    }

       public function viewBike($id)
{
    $bike = Bike::with(['riders' => function ($query) {
        $query->where('bike_rider.status', 'assigned');
    }])->findOrFail($id);

    return view('bike.view', compact('bike'));
}


    public function deleteBike(string $id)
    {
        $bike = Bike::find($id);
        $deletedBike = $bike->delete();

        if($deletedBike){
            return redirect()->route('bike.index');
        }
        return redirect()->route('bike.index')->with('error', 'Bike not deleted!');
        
    }

    public function editBike(string $id)
    {
        $bike = Bike::find($id);
        return view('bike.edit',compact('bike'));
    }

    public function updateBike(string $id , Request $request)
    {
        $updatedbike=Bike::find($id)->update([
            'plate_number' => $request->plate_number,
            'model' => $request->model,
            'model_year' => $request->model_year,
            'chassis_number' => $request->chassis_number,
            'engine_number' => $request->engine_number,
            'mulkiya_front_image' => $request->file('mulkiya_front_image')->store('mulkiya', 'public'),
            'mulkiya_back_image' => $request->file('mulkiya_back_image')->store('mulkiya', 'public'),
        ]);
     
        if($updatedbike){
           return redirect()->back()->with('msg', 'Bike Updated Successfully');
        }
        return redirect()->back()->with('msg', 'Bike Updation Unsuccessful');
    }    


}