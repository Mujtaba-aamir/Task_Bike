<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rider;
use App\Models\Bike;


class RiderController extends Controller
{
    public function createRider()
    {
        return view('rider.create');
    }

    public function storeRider(Request $request)
    {
        $rider = $request->validate([
            'full_name' => 'required',
            'mobile_number' => 'required|regex:/^\+9715[0-9]{8}$/',
            'email' => 'required',
            'emirates_id_number' => 'required|unique:riders,emirates_id_number|digits:15',
            'passport_number' => 'required|unique:riders,passport_number',
            'visa_expiry_date' => 'required|date|after:today',
            'date_of_birth' => 'required|date|before:today'
        ]);

        $createdRider = Rider::create([
            'full_name' => $rider['full_name'],
            'mobile_number' => $rider['mobile_number'],
            'email' => $rider['email'],
            'emirates_id_number' => $rider['emirates_id_number'],
            'passport_number' => $rider['passport_number'],
            'visa_expiry_date' => $rider['visa_expiry_date'],
            'date_of_birth' => $rider['date_of_birth']
        ]);

        if($createdRider){
            return redirect()->route('rider.create')->with('msg', 'Rider Registered Successfully');
        }         
        return redirect()->route('rider.create')->with('msg', 'Rider Registration Unsuccessful');
    }

    public function indexRider()
    {
        $riders = Rider::all();
        return view ('rider.index', compact('riders'));
    }

    public function viewRider(string $id)
    {
        $rider = Rider::find($id);
        return view ('rider.view', compact('rider'));
    }

    public function deleteRider(string $id)
    {
        $rider = Rider::find($id);
        $deletedBike = $rider->delete();

        if($deletedBike){
            return redirect()->route('rider.index');
        }
        return redirect()->route('rider.index')->with('error', 'Rider not deleted!');
    }

    public function editRider(string $id)
    {
        $rider = Rider::find($id);
        return view ('rider.edit', compact('rider'));
    }

    public function updateRider(string $id, Request $request)
    {
        $updatedRider = Rider::find($id)->update([
            'full_name' => $request->full_name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'emirates_id_number' => $request->emirates_id_number,
            'passport_number' => $request->passport_number,
            'visa_expiry_date' => $request->visa_expiry_date,
            'date_of_birth' => $request->date_of_birth,
            'status' => $request->status
        ]);

        if($updatedRider){
           return redirect()->back()->with('msg', 'Rider Updated Successfully');
        }
        return redirect()->back()->with('msg', 'Rider Updation Unsuccessful');
    }

    public function createAssign()
    {
       $rider = Rider::with('bike')->find(2);
       return $rider;
    }
}
