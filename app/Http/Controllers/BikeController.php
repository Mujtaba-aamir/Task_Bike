<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bike;
use Illuminate\Support\Facades\DB;


class BikeController extends Controller
{
    public function ShowForm(){
        return view ('Form');
    }

    public function StoreData(Request $req)
    {
        $data=$req->validate([
         'plate_number' => 'required|unique:bikes,plate_number',
         'model' => 'required',
         'model_year' => 'required|integer',
         'chassis_number' => 'required|unique:bikes,chassis_number',
         'engine_number' => 'required|unique:bikes,engine_number',
         'mulkiya_front_image' => 'required|image',
         'mulkiya_back_image' => 'required|image'
        ]);

        $data['mulkiya_front_image']=$req->file('mulkiya_front_image')->store('mulkiya_images', 'public');
            $data['mulkiya_back_image']=$req->file('mulkiya_back_image')->store('mulkiya_images', 'public');

       $success=DB::table('bikes')->insert([
        'plate_number' => $data['plate_number'],
         'model' => $data['model'],
         'model_year' => $data['model_year'],
         'chassis_number' => $data['chassis_number'],
         'engine_number' => $data['engine_number'],
         'mulkiya_front_image' => $data['mulkiya_front_image'],
         'mulkiya_back_image' => $data['mulkiya_back_image']
  
        ]);

        if($success)
        {
           return redirect()->back()->with('msg', 'Bike Registered Successfully');
        }
       
        
    }
}
