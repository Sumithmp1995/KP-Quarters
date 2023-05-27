<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Allottee;
use App\Models\Occupant;
use App\Models\Quarters;
use App\Models\MotherUnit;
use Illuminate\Http\Request;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;


class AllotmentController extends Controller
{
    // Find Allottee 
    public static function findAllottee($data)
    {  
        // LSQ
        if ($data['class'] == 'LSQ') 
        {
            $executiveLs = MotherUnit::select('executive_ls_count', 'executive_ls_allotted_count', 'lsq_quarters_count')
                ->where('unitHead_id', auth()->user()->unitHead_id)
                ->first();
  
         
            // FETCH the COUNT of Lower Subordinate Ministerial Applicants
            // $ministerialLs = MotherUnit::select('ministerial_ls_count', 'ministerial_ls_allotted_count', 'lsq_quarters_count')
            //    ->where('unitHead_id', auth()->user()->unitHead_id)
            //    ->first();

            // MINISTERIAL Applicants are considered only when No EXECUTIVE Applicants 
            if ((($executiveLs['lsq_quarters_count'] > $executiveLs['executive_ls_count']) || empty($executiveLs['executive_ls_count']) ))
             {
              
                $allottee = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                    ->where('quarters_id', null)
                    ->where('applicant_type', 'MINISTERIAL')
                    ->where('type', 'LSQ')
                    ->first();
         
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('ministerial_ls_allotted_count');
            } else {

                // MINISTERIAL Applicants are considered only when EXECUTIVE Applicants allocation reach 19
                if ($executiveLs->executive_ls_allotted_count < 20) {
                    $allottee = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                        ->where('quarters_id', null)
                        ->where('applicant_type', 'EXECUTIVE')
                        ->where('type', 'LSQ')
                        ->first();

                        MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                        ->increment('executive_ls_allotted_count');

                } else {
                    $allottee = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                        ->where('quarters_id', null)
                        ->where('applicant_type', 'MINISTERIAL')
                        ->where('type', 'LSQ')
                        ->first();

                    MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                        ->update(['executive_ls_allotted_count' => 0]);
                }
            }
        } else {
            // USQ   
            $executiveUs = MotherUnit::select('executive_us_count', 'executive_us_allotted_count', 'usq_quarters_count')
                ->where('unitHead_id', auth()->user()->unitHead_id)
                ->first();

            // FETCH the COUNT of Lower Subordinate Ministerial Applicants
            // $ministerialUs = MotherUnit::select('ministerial_us_count', 'ministerial_us_allotted_count', 'usq_quarters_count')
            // ->where('unitHead_id', auth()->user()->unitHead_id)
            // ->first();

            $executiveUsAllottedCount = $executiveUs->executive_Us_allotted_count;

            if (!empty($executiveUs['usq_quarters_count'] - $executiveUs['executive_us_count']) && empty($executiveUs['executive_us_count'])) {
                $allottee = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                    ->where('quarters_id', null)
                    ->where('applicant_type', 'MINISTERIAL')
                    ->where('type', 'USQ')
                    ->first();
                    MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('ministerial_us_allotted_count');
            } else {

                // MINISTERIAL Applicants are considered only when EXECUTIVE Applicants allocation reach 19
                if ($executiveUsAllottedCount < 20) {
                    $allottee = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                        ->where('quarters_id', null)
                        ->where('applicant_type', 'EXECUTIVE')
                        ->where('type', 'USQ')
                        ->first();
                    MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                        ->increment('executive_us_allotted_count');
                } else {

                    $allottee = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                        ->where('quarters_id', null)
                        ->where('applicant_type', 'MINISTERIAL')
                        ->where('type', 'USQ')
                        ->first();

                    MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                        ->update(['executive_us_allotted_count' => 0]);
                }
            }
        }
        return (($allottee));
    }



    // Unit Head Ask Willingness - send Notification
    public static function askWilling($allottee)
    {
        $user = User::find($allottee['user_id']);
        $path = "/user_view_willingness";
        $message = 'You are About to Allocated a Quarters';

        Notification::send($user, new UserNotification($allottee['applicant_name'], $message, $user['mother_unit'], $path));
    }





    //  User view allotment notification
    public function viewNotifications()
    {
        $data = Allottee::where('allottees.user_id', auth()->user()->id)
            ->join('quarters', 'quarters.id', '=', 'allottees.quarters_id')
            ->select('quarters.quarters_name', 'quarters.quarters_no', 'quarters.unit_name', 'quarters.created_at', 'allottees.application_no', 'allottees.id')
            ->where('willingness', null)
            ->first();

        return view('user.user_willingness', compact('data'));
    }



    // User Confirms Willingness before being  Allotted to Quarters
    public function confirmWilling($id)
    {
        $allottee =  Allottee::find($id);
        $allottee->update(['willingness' => 1]);

        $occupantData['user_id'] = $allottee['user_id'];
        $occupantData['applicant_name'] = $allottee['applicant_name'];
        $occupantData['allottee_id'] = $allottee['id'];
        $occupantData['application_no'] = $allottee['application_no'];
        $occupantData['unitHead_id'] = $allottee['unitHead_id'];

        $occupantData['quarters_id'] = $allottee['quarters_id'];
        $occupantData['occupant_status'] = $allottee['occupant_status'];
        $occupant = Occupant::create($occupantData);

        // Send alert to UnitHead Confirmation
        $user = User::where('unitHead_id', auth()->user()->unitHead_id)
            ->where('role', '2')->first();
        $path = "/unitHead_allot_quarters/$occupant->id";
        $message = $occupant->applicant_name . '  Confirmed to Occupie Quarters';
        Notification::send($user, new UserNotification($occupant['applicant_name'], $message, $user['mother_unit'], $path));
        return redirect('/user')->with('message',' Your Confirmation has been Recorded. Quarters will be allocated soon.  Kindly wait...');


        // UPDATE Mother_unit columns  : 
        // Increment value of No. of executive applicants / ministerial applicants  
        // Find  Class = LSQ or USQ
        // find MINISTERIAL or EXECUTIVE


        if ($allottee['class'] == 'MINISTERIAL') {
            if ($allottee['applicant_type'] == 'LSQ') {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('ministerial_ls_allotted_count');
            } else {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('ministerial_ls_allotted_count');
            }
        } else {
            if ($allottee['applicant_type'] == 'LSQ') {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('executive_ls_allotted_count');
            } else {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('executive_us_allotted_count');
            }
        }
    }



    // UnitHead  allot Quarters form
    public function allotQuartersPreview($occupant_id)
    {
        $occupant = Occupant::where('occupants.id', $occupant_id)
            ->join('applicants', 'applicants.id', '=',  'occupants.allottee_id')
            ->join('quarters', 'quarters.id', '=', 'occupants.quarters_id')
            ->first();

        // dd($occupant);
        return view('unitHead.occupantPreview', compact('occupant'));
    }


    // UnitHead  list all Confirmed Allottees
    public function listConfirmedAllottees()
    {
        $occupants = Occupant::where('occupant_status', null)->get();
        // dd($occupants);
        return view('unitHead.confirmedAllottees', compact('occupants'));
    }


    public function allotQuarters($allottee_id)
    {

        $allottee = Allottee::find($allottee_id);
        $occupantSeniorityNo = $allottee->seniority_no;
        $allottee->update(['status' => 'occupied', 'seniority_no' => null]); // UPDATE allottee status as occupied in allottees table and remove seniority No
   
        $quarters =  Quarters::find($allottee->quarters_id)->select('quarters_no', 'status', 'class')->first();
        $quarters->update(['status' => 1]);     // UPDATE occupied value as 1 quarters table


        Occupant::where('allottee_id', $allottee_id)
            ->update(['occupant_status' => '1']);    // UPDATE occupant status as 1 in occupant table 

        // UPDATE Seniority list                          
        if ($allottee->applicant_type == 'MINISTERIAL') {
            if ($quarters->class == 'LSQ') {
                Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                    ->where('applicant_type', 'MINISTERIAL')
                    ->where('type', 'LSQ')
                    ->where('seniority_no', '>', $occupantSeniorityNo)
                    ->select('seniority_no')
                    ->decrement('seniority_no');
            } else {
                Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                    ->where('applicant_type', 'MINISTERIAL')
                    ->where('type', 'USQ')
                    ->where('seniority_no', '>', $occupantSeniorityNo)
                    ->select('seniority_no')
                    ->decrement('seniority_no');
            }
        } else {
            if ($quarters->class  == 'LSQ') {
                Allottee::select('seniority_no')
                    ->where('unitHead_id', auth()->user()->unitHead_id)
                    ->where('applicant_type', 'EXECUTIVE')
                    ->where('type', 'LSQ')
                    ->where('seniority_no', '>', $occupantSeniorityNo)
                    ->select('seniority_no')
                    ->decrement('seniority_no');
            } else {
                Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                    ->where('applicant_type', 'EXECUTIVE')
                    ->where('type', 'USQ')
                    ->where('seniority_no', '>', $occupantSeniorityNo)
                    ->select('seniority_no')
                    ->decrement('seniority_no');
            }
        }


        // Send alert to user Confirmation : Allotted 
        $user_id = $allottee->where('id', $allottee_id)->pluck('user_id')->first();
        $user = User::find($user_id);
        $path = "/view_my_proceedings/$allottee_id";
        $message =  'Quarters allocated. Click to view proceedings..';
        Notification::send($user, new UserNotification($user['name'], $message, null, $path));
        return redirect('/unit_head')->with('message', ' Quarters has been allocated Successfully.');
    }
}

// $data = Allottee::select('allottees.quarters_id')
// ->join('quarters', 'quarters.id', '=', 'allottees.quarters_id')
// ->select('quarters.quarters_name','quarters.quarters_no','quarters.unit_name','quarters.created_at','allottees.application_no','allottees.id')
// ->first();
