<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\District;
use App\Models\Quarters;
use App\Models\Applicant;
use App\Models\MotherUnit;
use App\Models\PresentUnit;
use App\Models\UnitHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;

class ApplicationController extends Controller
{


    // view Apply Form 
    public function newApplication()
    {

        $presentUnits = PresentUnit::select('present_unit')->get();
        $districts = District::select('district')->get();

        $user = Auth::user();
        $name = $user->name;
        $motherUnit = $user->mother_unit;
        $pen = $user->pen;
        $applied = $user->applied;

        if ($applied == '0') {
            return view('user.user_application', compact('name', 'pen', 'presentUnits', 'motherUnit', 'districts'));
        } else {
            return redirect('/manage_application');
        }
    }


    //store new listing
    public function store(Request $request)
    {

        $formdata = request()->validate([
            'user_id' => '',
            'application_no' => '',
            'photo' => 'required',

            'applicant_name' => 'required',
            'pen' => 'required',
            'applicant_type' => 'required',
            'rank' => 'required',
            'gl_no' => '',
            'pay' => 'required',
            'scale_of_pay' => 'required',

            'mother_unit' => 'required',
            'present_unit' => 'required',

            'working_status' => 'required',
            'working_status_doc' => '',

            'date_of_birth' => 'required',
            'date_of_joining' => 'required',
            'date_of_superannuation' => 'required',

            'house_name' => 'required',
            'street_name' => 'required',
            'post_office' => 'required',
            'pin_code' => 'required',

            'village' => 'required',
            'taluk' => 'required',
            'district' => 'required',

            'marital_status' => 'required',
            'partner_employee' => 'accepted',
            'radius_five_miles' => 'accepted',

            'mob' => 'required',
            'marriage_certificate' => 'required',

            'declaration' => 'required'
        ]);
        //   has image inserted 
        if ($request->hasFile('marriage_certificate')) {
            $formdata['marriage_certificate'] = $request->file('marriage_certificate')->store('marriage_certificates', 'public');
        }
        if ($request->hasFile('photo')) {
            $formdata['photo'] = $request->file('photo')->store('photo', 'public');
        }
        if ($request->hasFile('working_status_doc')) {
            $formdata['working_status_doc'] = $request->file('working_status_doc')->store('working_status_doc', 'public');
        }

        $formdata['user_id'] = auth()->user()->id;
        Applicant::create($formdata);

        // notification 
        $user = User::where('present_unit', $request->present_unit)
            ->where('role', '2')->first();
        $message = 'New Application Recieved';
        $path = "view_application_inbox";
        Notification::send($user, new UserNotification($request->applicant_name, $message, $request->present_unit, $path,));
       
        User::where('pen', $request->pen)->update(['applied' => '1']);  // TO Prevent Multiple Application submission, applied value SET to 1 in Users table
        User::where('pen', $request->pen)->update(['present_unit' => $request->present_unit]);  //  present_unit UPDATED in Users table  

        $unitHead_id = UnitHead::where('mother_unit', $request->present_unit)->pluck('id')->first();
        User::find(auth()->user()->id)->update(['unitHead_id' => $unitHead_id]); // FETCH id from UnitHead table and SET to User table 
        
        return redirect('/user');
    }
}
