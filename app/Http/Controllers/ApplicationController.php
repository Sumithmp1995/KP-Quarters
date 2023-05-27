<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\District;
use App\Models\Quarters;
use App\Models\UnitHead;
use App\Models\Applicant;
use App\Models\PresentUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    // view Apply Form 
    public function createApplication()
    {
        $presentUnits = PresentUnit::select('present_unit')->get();
        $districts = District::select('district')->get();
        $quarters = Quarters::select('quarters_name', 'id')->distinct()->groupBy('quarters_name')->get();

        $user = Auth::user();
        $name = $user->name;
        $motherUnit = $user->mother_unit;
        $pen = $user->pen;
        $applied = $user->applied;

        if (auth()->user()->applied == 0) {
            return view('user.userApplication', compact('name', 'pen', 'presentUnits', 'motherUnit', 'districts', 'quarters'));
        } else {
            return redirect()->route('user-home')->with('message', ' Application already Submitted !');
        }
    }



    //store new listing
    public function storeApplication(Request $request)
    {
        $formdata = request()->validate([
            'user_id' => '',
            'unitHead_id' => '',
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

            'date_of_birth' => 'required',
            'date_of_joining' => 'required',
            'date_of_superannuation' => 'required',

            'house_name' => 'required',
            'street_name' => 'required',
            'post_office' => 'required',
            'pin_code' => 'required',

            'differentAddress' => 'nullable',

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
        //   has image uploaded 
        if ($request->hasFile('marriage_certificate')) {
            $formdata['marriage_certificate'] = $request->file('marriage_certificate')->store('marriage_certificates', 'public');
        }
        if ($request->hasFile('photo')) {
            $formdata['photo'] = $request->file('photo')->store('photo', 'public');
        }
        if ($request->hasFile('working_status_doc')) {
            $formdata['working_status_doc'] = $request->file('working_status_doc')->store('working_status_doc', 'public');
        }
        if ($request['differentAddress']) {
            $formdata['differentAddress'] = 0;
        } else {
            $formdata['tempAddress'] = $request['tempHouse_name'] . ' ' . $request['tempStreet_name'] . ' ' .
                $request['tempPost_office'] . ' ' . $request['tempPin_code'];
            $formdata['differentAddress'] = 1;
        }

        if ($request['working_status'] == null) {
            $formdata['working_status'] = null;
        }

        if ($request['p1']) {
            $formdata['p1'] = $request['p1'];
        }
        if ($request['p2']) {
            $formdata['p2'] = $request['p2'];
        }
        if ($request['p3']) {
            $formdata['p3'] = $request['p3'];
        }

        $formdata['remark'] = 'active';
        $formdata['approval']  = 0;   
        $formdata['user_id'] = auth()->user()->id;
        $applicant = Applicant::create($formdata);

        User::where('pen', $request->pen)->update(['photo' => $formdata['photo'], 'present_unit' => $request->present_unit, 'applied' => '1', 'remember_token' => '1']);  //  present_unit UPDATED in Users table  
        $unitHead_id = UnitHead::where('mother_unit', $request->present_unit)->pluck('id')->first();
        User::find(auth()->user()->id)->update(['unitHead_id' => $unitHead_id]); 
        $applicant->update(['unitHead_id' => $unitHead_id]);
        return redirect()->route('user-previewApplication');
    }



    // Preview submitted Application
    public function previewApplication()
    {
        $formdata = Applicant::where('user_id', auth()->user()->id)
            ->where('remark', 'active')
            ->first();
        return  view('user.applicationPreview', compact('formdata'));
    }




    // Set Reservation
    public function setReservation(Request $request,  $applicantId)
    {
        $applicant = Applicant::find($applicantId);
        if ($request['reservation']) {
            $formdata['reservation'] = $request['reservation'];
        }
        if ($request->hasFile('reservation_doc')) {
            $formdata['reservation_doc'] = $request->file('reservation_doc')->store('reservation_doc', 'public');
        }
        $applicant->update($formdata);
        return redirect()->route('user-home')->with('message', 'Application has been Submitted Successfully !');
    }




    //Edit my Application
    public function editMyApplication(Applicant $applicant)
    {
        $presentUnits = PresentUnit::select('present_unit')->get();
        $districts = District::select('district')->get();
        return view('user.user_editApplication', compact('applicant', 'presentUnits', 'districts'));
    }




    //update my Application
    public function updateMyApplication(Request $request, Applicant $applicant)
    {
        $formdata = request()->validate([
            'user_id' => '',
            'unitHead_id' => '',
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

            'working_status' => '',
            'working_status_doc' => '',

            'date_of_birth' => 'required',
            'date_of_joining' => 'required',
            'date_of_superannuation' => 'required',

            'house_name' => 'required',
            'street_name' => 'required',
            'post_office' => 'required',
            'pin_code' => 'required',

            'differentAddress' => 'nullable',

            'village' => 'required',
            'taluk' => 'required',
            'district' => 'required',

            'marital_status' => 'required',
            'partner_employee' => 'accepted',
            'radius_five_miles' => 'accepted',

            'mob' => 'required',
            'marriage_certificate' => 'required',

            'declaration' => 'required',
            'remark' => ''
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
        if ($request['differentAddress']) {
            $formdata['differentAddress'] = 0;
        } else {
            $formdata['differentAddress'] = 1;
            $formdata['tempAddress'] = $request['tempHouse_name'] . ' ' . $request['tempStreet_name'] . ' ' .
                $request['tempPost_office'] . ' ' . $request['tempPin_code'];
        }

        if ($request['working_status'] == null) {
            $formdata['working_status'] = null;
        }

        if ($request['p1']) {
            $formdata['p1'] = $request['p1'];
        }
        if ($request['p2']) {
            $formdata['p2'] = $request['p2'];
        }
        if ($request['p3']) {
            $formdata['p3'] = $request['p3'];
        }

        $formdata['user_id'] = auth()->user()->id;
        $formdata['unitHead_id'] = auth()->user()->unitHead_id;
        $formdata['approval'] = 0;
        $formdata['remark'] = 'active';
        $applicant->update($formdata);

        User::where('pen', $request->pen)->update(['photo' => $formdata['photo'], 'present_unit' => $request->present_unit, 'applied' => '1', 'remember_token' => '1']);  //  present_unit UPDATED in Users table  
       
        // // notification 
        // $user = User::where('unitHead_id', auth()->user()->unitHead_id)
        //     ->where('role', '2')
        //     ->first();
        // $message = $request->applicant_name . 'Re-submitted Application';
        // $path = "/view_application_inbox";
        // Notification::send($user, new UserNotification($request->applicant_name, $message, $path));

        return redirect()->route('user-previewApplication');
    }

}
