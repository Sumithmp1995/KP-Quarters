<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Allottee;
use App\Models\Occupant;
use App\Models\Quarters;
use App\Models\MotherUnit;
use Illuminate\Http\Request;
use App\Notifications\RiNotification;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;


class AllotmentController extends Controller
{
    // Find Allottee 
    public static function findAllottee($data)
    {

        // LSQ
        if ($data['class'] == 'LSQ') {
            $executiveLs = MotherUnit::select(
                'executive_ls_count',
                'executive_ls_allotted_count',
                'lsq_quarters_count',
                'ministerial_ls_count',
                'ministerial_ls_allotted_count',
                'lsq_quarters_count'
            )->where('unitHead_id', auth()->user()->unitHead_id)
                ->first();

            $ExecutiveLsqAllotteeCount = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                ->where('quarters_id', null)
                ->where('applicant_type', 'EXECUTIVE')
                ->where('type', 'LSQ')
                ->count();

            $ministerialPercent = ($executiveLs->ministerial_ls_allotted_count /  $executiveLs->lsq_quarters_count) * 100;

            if ($executiveLs->executive_ls_allotted_count % 20 == 0 || empty($ExecutiveLsqAllotteeCount)) {
               if($executiveLs->ministerial_ls_count) {
                if ($ministerialPercent <= 5 || empty($ExecutiveLsqAllotteeCount)) {
                    $allottee = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                        ->where('quarters_id', null)
                        ->where('applicant_type', 'MINISTERIAL')
                        ->where('type', 'LSQ')
                        ->first();

                    MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                        ->increment('ministerial_ls_allotted_count');
                } 
            } elseif( $executiveLs->executive_ls_count ) {

                    $allottee = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                        ->where('quarters_id', null)
                        ->where('applicant_type', 'EXECUTIVE')
                        ->where('type', 'LSQ')
                        ->first();

                    MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                        ->increment('executive_ls_allotted_count');
                }
                                  
            } // if executive count less than 20, following course of code will work
            elseif($executiveLs->executive_ls_count) {

                $allottee = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                    ->where('quarters_id', null)
                    ->where('applicant_type', 'EXECUTIVE')
                    ->where('type', 'LSQ')
                    ->first();

                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('executive_ls_allotted_count');
            }

        } else {    // if quarters is USQ type segment 2 will work )
            $executiveUs = MotherUnit::select(
                'executive_us_count',
                'executive_us_allotted_count',
                'usq_quarters_count',
                'ministerial_us_count',
                'ministerial_us_allotted_count',
                'usq_quarters_count')
                ->where('unitHead_id', auth()->user()->unitHead_id)
                ->first();

            $ExecutiveUsqAllotteeCount = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                ->where('quarters_id', null)
                ->where('applicant_type', 'EXECUTIVE')
                ->where('type', 'USQ')
                ->count();

            $ministerialPercent = ($executiveUs->ministerial_us_allotted_count /  $executiveUs->usq_quarters_count) * 100;

            if( ($executiveUs->executive_us_allotted_count % 20 == 0 ) || empty($ExecutiveUsqAllotteeCount ) ) {
                if($executiveUs->ministerial_us_count)   {
                if ($ministerialPercent <= 5 || empty($ExecutiveUsqAllotteeCount)) {

                    $allottee = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                        ->where('quarters_id', null)
                        ->where('applicant_type', 'MINISTERIAL')
                        ->where('type', 'USQ')
                        ->first();
                    MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                        ->increment('ministerial_us_allotted_count');
                }
            } elseif($executiveUs->executive_us_count) {

                    $allottee = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                        ->where('quarters_id', null)
                        ->where('applicant_type', 'EXECUTIVE')
                        ->where('type', 'USQ')
                        ->first();
                    MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                        ->increment('executive_us_allotted_count');
                }
            } elseif($executiveUs->executive_us_count) {
                

                $allottee = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                    ->where('quarters_id', null)
                    ->where('applicant_type', 'EXECUTIVE')
                    ->where('type', 'USQ')
                    ->first();
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('executive_us_allotted_count');
            }
        }
        return (($allottee?? null));
        }




    // Unit Head Ask Willingness - send Notification
    public static function askWilling($allottee)
    {
        // dd('done');
        $user = User::find($allottee['user_id']);
        $path = "/user_view_willingness";
        $message = 'You are About to Allocated a Quarters';

        Notification::send($user, new UserNotification($allottee['applicant_name'], $message, $path));
    }


    //  User view williness notification
    public function  viewWillingNotifications()
    {
        $data = Allottee::where('allottees.user_id', auth()->user()->id)
            ->join('quarters', 'quarters.id', '=', 'allottees.quarters_id')
            ->select('quarters.quarters_name', 'quarters.quarters_no', 'quarters.unit_name', 'quarters.created_at', 'allottees.application_no', 'allottees.id')
            ->where('willingness', null)
            ->first();
     if($data) {
        return view('user.user_willingness', compact('data'));
     } else {
        return redirect()->route('user.home')->with('message', "You don't have Permission");
     }
        
    }



    // User Confirms Willingness before being  Allotted to Quarters
    public function confirmWilling($id)
    {
        $allottee =  Allottee::find($id);
        if($allottee) {
            $allottee->update(['willingness' => 1]);
            User::find(auth()->user()->id)->update(['remember_token' => 0]);
            $occupantData['user_id'] = $allottee['user_id'];
            $occupantData['applicant_name'] = $allottee['applicant_name'];
            $occupantData['allottee_id'] = $allottee['id'];
            $occupantData['application_no'] = $allottee['application_no'];
            $occupantData['unitHead_id'] = $allottee['unitHead_id'];
            $occupantData['quarters_id'] = $allottee['quarters_id'];
            $occupantData['occupant_status'] = $allottee['occupant_status'];
            Occupant::create($occupantData);
         
            return redirect('/user')->with('message', ' Your Confirmation has been Recorded. Quarters will be allocated soon.  Kindly wait...');
        } else {
            return redirect()->route('user.home')->with('message', "You don't have Permission");
        }

    }



    // UnitHead  allot Quarters form
    public function allotQuartersPreview($occupant_id)
    {
        $occupant = Occupant::where('occupants.id', $occupant_id)
            ->join('applicants', 'applicants.id', '=',  'occupants.allottee_id')
            ->join('quarters', 'quarters.id', '=', 'occupants.quarters_id')
            ->first();

        return view('unitHead.occupantPreview', compact('occupant'));
    }




    // UnitHead  list all Confirmed Allottees
    public function listConfirmedAllottees()
    {
        // $occupants = Occupant::where('occupants.occupant_status', null)
        //     ->join('quarters', 'quarters.id', '=', 'occupants.quarters_id')
        //     ->join('allottees', 'allottees.id', '=', 'occupants.allottee_id')
        //     ->select('occupants.applicant_name', 'occupants.application_no', 
        //                'quarters.quarters_name', 'quarters.class','allottees.applicant_type', 
        //                'occupants.allottee_id')
        //     ->get();

        $allottees = Allottee::join('quarters', 'quarters.id', 'allottees.quarters_id')
                ->where('allottees.status', 'active')
                ->where('allottees.unitHead_id', auth()->user()->unitHead_id)
                ->select('allottees.*', 'quarters.class', 'quarters.type', 'quarters.quarters_name', 'quarters.quarters_no')
                ->get();
            return view('unitHead.confirmedAllottees', compact('allottees'));
    }




    // UnitHead  upload proceedings
    public function uploadProceedings(Request $request)
    {
        // dd($request->allottee_id);
           request()->validate([
            'proceedings_no' => 'required',
            'proceedings_doc' => 'required'
        ]);
        //   has image inserted 
        if ($request->hasFile('proceedings_doc')) {
           $file = $request->file('proceedings_doc')->store('unitHead_allot_proceedings_doc', 'public');
        }

        Occupant::where('allottee_id', $request->allottee_id)->update( ['proceedings_no' => $request->proceedings_no,
                  'proceedings_doc' => $file]);

         return redirect()->route('unitHead.allotment_complete',[$request->allottee_id]);         
    }       
    



    public function allotQuarters($allottee_id)
    {
        $allottee = Allottee::find($allottee_id);
        
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

        $occupantSeniorityNo = $allottee->seniority_no;
        $allottee['status']  = 'occupied';
        $allottee['seniority_no']  =  null ; // UPDATE allottee status as occupied in allottees table and remove seniority No
        $allottee->save();

        User::where('unitHead_id',auth()->user()->unitHead_id)
        ->where('role','1')->update(['remember_token' => 1]);       // remember_token = 1 for mark user as allotted


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

        // Send alert to user  : Allotted 
        $user_id = $allottee->where('id', $allottee_id)->pluck('user_id')->first();
        $user = User::find($user_id);
        $path = "/view_my_proceedings/$allottee_id";
        $message =  'Quarters allocated. Click to view proceedings..';
        Notification::send($user, new UserNotification($user['name'], $message,  $path));
        
        // Send alert to RI  : Allotted 
        $user = User::where('unitHead_id', auth()->user()->unitHead_id)
                        ->where('role','3')
                        ->first();
        $path = "/ri_view_allottee/$allottee_id";
        $message =  'Quarters allocated. Click to view more details..';
        Notification::send($user, new RiNotification($user['name'], $message, $path));


        return redirect('/unit_head')->with('message', ' Quarters has been allocated Successfully.');
    }
}

// $data = Allottee::select('allottees.quarters_id')
// ->join('quarters', 'quarters.id', '=', 'allottees.quarters_id')
// ->select('quarters.quarters_name','quarters.quarters_no','quarters.unit_name','quarters.created_at','allottees.application_no','allottees.id')
// ->first();
