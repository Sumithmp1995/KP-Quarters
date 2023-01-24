<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Occupant;
use App\Models\Quarters;
use App\Models\Vacattee;
use App\Models\Applicant;
use App\Models\MotherUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;


class UserController extends Controller
{


    // View User Dashboard
    public function index()
    {
        $user = auth()->user();
        return view('user.home', compact('user'));
    }




    // View Seniority  list
    public function viewSeniorityList()
    {

        $allApplicants = Applicant::all()->where('approve', '=', '1');
        return view('user.seniorityList', [
            'applicants' => $allApplicants,
        ]);
    }




    // View vacate form
    public function ViewVacateForm()
    {

        return view('user.user_vacate');
    }


    // store user Vacate data
    public function selfVacate(Request $request)
    {
        
        $vacatee = $request->validate([
            'reason' => '',
            'other_reason' => '',
            'kseb_noDues' => '',
            'kwa_noDues' => 'required',
        ]);
        // dd($vacatee);
        if ($request->hasFile('kseb_noDues')) {
            $formdata['kseb_noDues'] = $request->file('kseb_noDues')->store('Nodues_kseb', 'public');
        }
        if ($request->hasFile('kwa_noDues')) {
            $formdata['kwa_noDues'] = $request->file('kwa_noDues')->store('Nodues_kwa', 'public');
        }

        $vacatee['user_id'] = auth()->user()->id;
        $vacatee['unitHead_id'] = auth()->user()->unitHead_id;

        $occupant = Occupant::where('user_id', auth()->user()->id)->first();
        $occupantId  = $occupant->pluck('id')->first();

        $quarters = Quarters::select('quarters.allottee_id')
            ->join('allottees', 'allottees.id', '=', 'quarters.allottee_id')
            ->select('quarters.id','quarters.class', 'quarters.status','allottees.id','allottees.applicant_type','allottees.type')
            ->where('user_id', auth()->user()->id)
            ->first();

        $quartersId = $quarters->pluck('id')->first();

        // $quarters = Quarters::where('user_id', auth()->user()->id)->first();
        // $quartersId = $quarters->select('id')->first();

        $vacatee['occupant_id'] = $occupantId;
        $vacatee['quarters_id'] = $quartersId;

        $vacattee = Vacattee::create($vacatee);
    
        $occupant->update(['occupant_status' => 'VACATED']);
        $quarters->update(['status' => 'VACATED']);

   
        // Send alert to UnitHead vacate request
        $user = User::where('unitHead_id', auth()->user()->unitHead_id)
                            ->where('role', '2')->first();
        $path = "/view_vacate_request/$vacattee->id";
        $message =  'click to view';
        Notification::send($user, new UserNotification($user['name'], $message, null, $path));
  
   // UPDATE Mother_unit columns  : 
   // Decrement value of No. of executive applicants / ministerial applicants  
   // Find  Class = LSQ or USQ
   // find MINISTERIAL or EXECUTIVE


    if ($quarters['applicant_type'] == 'MINISTERIAL') {
        if ($quarters['type'] == 'LSQ') {
            MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                       ->decrement('ministerial_ls_allotted_count');
            MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                       ->decrement('ministerial_ls_count');
        } else {
            MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
            ->decrement('ministerial_ls_allotted_count');
            MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
            ->decrement('ministerial_us_count');
        } 
    } else {
       
        if ( $quarters['type'] == 'LSQ') {
            MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                 ->decrement('executive_ls_allotted_count');
            MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
            ->decrement('executive_ls_count');
               
        } else {
            MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
            ->decrement('executive_us_allotted_count');
            MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
            ->decrement('executive_us_count');
        } 
    }
 
    
        // Find new Allottee
        $allottee = AllotmentController::findAllottee($quarters);
         
        // CHECK any allottees currently in seniority list
         if(!empty($allottee)) {

            $quarters->update( ['allottee_id'=> $allottee->id]);  
            $quarters->update( ['status'=> 1]);  

         // UPDATE quarters_d value IN Allottee table tempararly
            $allottee->update( ['quarters_id'=> $quarters->id]);   
            AllotmentController::askWilling($allottee);
            } else {
            dd('Eligible Applicants not found');
         }
       

        return redirect('/user');
    }



    //  manage applicant 
    public function manageProfile()
    {
        $user = Auth::user();
        $applications = Applicant::all()->where('pen', $user->pen);
        foreach ($applications as $applicant) {
            return view('user.user_manageProfile', compact('applicant'));
        }
    }
}
