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

    public function ShowTable(){
        $bikes=DB::table('bikes')->get();
        return view('Table',['BikeData'=> $bikes]);
    }

    public function SingleBike($id){
        $singleBike=DB::table('bikes')->where('id', $id)->first();
        return view('ViewBike', ['data'=> $singleBike]);
    }

    public function DeleteBike($id){
      $delete=DB::table('bikes')->where('id', $id)->delete();
      
      if($delete){
        return back();
      }

      else
       {
          echo "<h1>Data not Deleted</h1>";

       }
    }

     public function Update($id){
        $bike=DB::table('bikes')->where('id', $id)->first();
        return view('Update',['data'=>$bike]);
     }


     public function UpdateBike($id , Request $req){
        
         
            $bike=DB::table('bikes')->where('id', $id)->update([
           'plate_number'=>$req->plate_number,
           'model'=>$req->model,
           'model_year'=>$req->model_year,
           'chassis_number'=>$req->chassis_number,
           'engine_number'=>$req->engine_number,
           'mulkiya_front_image'=>$req->file('mulkiya_front_image')->store('mulkiya', 'public'),
           'mulkiya_back_image'=>$req->file('mulkiya_back_image')->store('mulkiya', 'public'),


            ]);
        if($bike){

         return redirect()->back()->with('msg', 'Bike Updated Successfully');

        }
     }

}


