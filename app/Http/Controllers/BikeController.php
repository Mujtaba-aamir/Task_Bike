<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bike;

class BikeController extends Controller
{
   public function store(Request $request)
   {
      $data = $request->validate([
    'plate_number' => 'required|unique:bikes,plate_number',
    'model' => 'required',
    'model_year' => 'required|integer',
    'chassis_number' => 'required',
    'engine_number' => 'required',
    'mulkiya_front_image' => 'required|image',
    'mulkiya_back_image' => 'required|image',
   ]);

   $data['mulkiya_front_image'] = $request->file('mulkiya_front_image')->store('mulkiya', 'public');
   $data['mulkiya_back_image'] = $request->file('mulkiya_back_image')->store('mulkiya', 'public');
    Bike::create($data);
    return back();
   

   }
 
}
