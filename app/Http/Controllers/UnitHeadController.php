<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Allottee;
use App\Models\Quarters;
use App\Models\UnitHead;
use App\Models\Applicant;
use App\Models\MotherUnit;
use Illuminate\Http\Request;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitHeadController extends Controller
{



    //  View Unit Head Dashboard
    public function index()
    {
        $motherUnitStatus = MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)->first();
        // dd( $motherUnitStatus); 
 
        return view('unitHead.home',compact('motherUnitStatus'));
      
    }

 // Add Unit Head Data
   public function manageProfile()
    {
        return view('unithead.completeProfile');
    }    



    // Add Unit Head Data
    public function addUnitHead()
    {
        $unit = User::select('mother_unit', 'applied')
            ->where('mother_unit', auth()->user()->mother_unit)
            ->where('role', 2)
            ->first();

        if ($unit['applied'] == '0') {
            return view('unitHead.manageProfile', compact('unit'));
        } else {
            return redirect('/edit_unitHead_profile');
        }
    }

    //  Add Ri 
    public function addRi()
    {
        $unit = User::select('mother_unit', 'applied')
            ->where('mother_unit', auth()->user()->mother_unit)
            ->where('role', 3)
            ->first();

        if ($unit == null) {
            return view('unitHead.addRi');
        } else {
            return redirect('/view_ri_profile');
        }
    }

    // Store RI 
    public function storeRi(Request $request)
    {

        $formdata = $request->validate([
            'name' => ['required', 'min:3'],
            'pen' => 'required|unique:users',
            'mother_unit' => 'required',
            'password' => 'required|min:8',
            'role' => '',
            'applied' => ''
        ]);
        //Hash Password
        $formdata['password'] = bcrypt($formdata['password']);
        $formdata['unitHead_id'] = auth()->user()->unitHead_id;
        $formdata['applied'] = 1;
        User::create($formdata);
        return redirect('/unit_head');
    }


    // Register Unit Head
    public function registerUnit(Request $request)
    {
        $formdata = request()->validate([
            'user_id' => '',
            'mother_unit' => 'required',
            'unitHead_pen' => 'required',
            'unit_address' => 'required',
            'tel_no' => 'required',
            'unitHead_name' => 'required',
            'unitHead_mob' => 'required',
            'unit_email' => 'required',
        ]);

        $formdata['user_id'] = auth()->user()->id;

        // FETCH UnitHead_id FROM UnitHead Table
        UnitHead::create($formdata);
        $unitHeadId = UnitHead::where('unitHead_pen', $request->unitHead_pen)->pluck('id')->first();

        // UPDATE UnitHead record IN User Table
        $unitHeadUser = User::find(auth()->user()->id);
        $unitHeadUser['unitHead_id'] =  $unitHeadId;
        $unitHeadUser['present_unit'] =  $request->mother_unit;
        $unitHeadUser['applied'] =  1;
        $unitHeadUser->save();

        // SET active status IN MotherUnit Table for Registered UnitHeads
        MotherUnit::where('mother_unit', auth()->user()->mother_unit)
            ->update(['unitHead_id' => $unitHeadId]);

        return Redirect('/unit_head');
    }




    // Unit Head Applications Inbox
    public function viewUnitHeadInbox()
    {
        $unitHeadPresentUnit = auth()->user()->mother_unit;
        $allAllottees = Applicant::select('id', 'application_no', 'applicant_name', 'pen', 'rank', 'present_unit', 'mother_unit', 'created_at')
            ->where('present_unit', $unitHeadPresentUnit)
            ->where('approval', 0)
            ->get();

        return view('unithead.applicationInbox', [
            'applicants' => $allAllottees
        ]);
    }



    // Preview Application to approve 
    public function previewApplication($id)
    {
        $applicant = Applicant::find($id);
        return view('unithead.approveApplication', [
            'applicant' => $applicant,
        ]);
    }



    // Approve Application
    public function approveApplication($id)
    {
        $applicant = Applicant::find($id);
        $applicant['approval'] = '1';       // Application Approved!
        $applicant->save();

        // Send alert to USER : Application Approval Alert
        $user = User::find($applicant->user_id);
        $path = "/view_my_application/$applicant->id";
        $message = 'Your Application Has Been Approved';
        Notification::send($user, new UserNotification($user['name'], $message, $user['mother_unit'], $path));

        // Set Quarters Type
        $rank = array('CPO/PC', 'SCPO/HDR', 'JUNIOR CLERK', 'TYPIST', 'SENIOR CLERK');
        if (in_array($applicant->rank, $rank)) {
            $allottee['type'] = "LSQ";
        } else {
            $allottee['type'] = "USQ";
        }

        // Set Values For Allottee Table
        $allottee['user_id'] =  $applicant->user_id;
        $allottee['unitHead_id'] = auth()->user()->unitHead_id;
        $allottee['applicant_name'] =  $applicant->applicant_name;
        $allottee['applicant_type'] =  $applicant->applicant_type;
        $allottee['application_no'] = $applicant->application_no;
        $allottee['applicant_id'] = $applicant->id;

        if ($allottee['applicant_type'] == 'EXECUTIVE') {
            if ($allottee['type'] == 'LSQ') {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('executive_ls_count');
            } else {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('executive_us_count');
            }
        } else {

            if ($allottee['type'] == 'LSQ') {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                            ->increment('ministerial_ls_count');
            } else {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('ministerial_us_count');
            }
        }


        $allottee = Allottee::create($allottee);

        // Seniority Number Generation
        $unitHeadId = auth()->user()->unitHead_id;

        if ($allottee['applicant_type'] == 'MINISTERIAL') {
            if ($allottee['type'] == 'LSQ') {
                $lastSeniority =  Allottee::where('unitHead_id', $unitHeadId)
                    ->where('applicant_type', 'MINISTERIAL')
                    ->where('type', 'LSQ')
                    ->where('seniority_no', '!=', null)
                    ->count();
            } else {
                $lastSeniority =  Allottee::where('unitHead_id', $unitHeadId)
                    ->where('applicant_type', 'MINISTERIAL')
                    ->where('type', 'USQ')
                    ->where('seniority_no', '!=', null)
                    ->count();
            }
        } else {
            if ($allottee['type'] == 'LSQ') {
                $lastSeniority =  Allottee::where('unitHead_id', $unitHeadId)
                    ->where('applicant_type', 'EXECUTIVE')
                    ->where('type', 'LSQ')
                    ->where('seniority_no', '!=', null)
                    ->count();
            } else {
                $lastSeniority =  Allottee::where('unitHead_id', $unitHeadId)
                    ->where('applicant_type', 'EXECUTIVE')
                    ->where('type', 'USQ')
                    ->where('seniority_no', '!=', null)
                    ->count();
            }
        }

        $allottee['seniority_no'] = $lastSeniority;
        $allottee->save();

        $quarters = Quarters::where('unitHead_id', auth()->user()->unitHead_id)
            ->where('status', '0')->first();
     
        if ($quarters) {

            $allottee = AllotmentController::findAllottee($quarters);  // Find new Allottee
            if (!empty($allottee)) {       // CHECK return any eligible applicants 

                $quarters->update(['allottee_id' => $allottee->id]);
                $quarters->update(['status' => '1']);
                $allottee->update(['quarters_id' => $quarters->id]);  // UPDATE quarters_id value IN Allottee table tempararly

                AllotmentController::askWilling($allottee);
            } else {
                dd('Eligible Applicants not found');
            }
        } else {
            dd('wait for any quarters to be vacated');
        }
        return redirect()->route('unitHead-selectSeniorityListType');
    }




    // Select Seniority List
    public function selectSeniorityList()
    {
        return view('unitHead.SelectSeniorityList');
    }




    // View Seniority List
    public function viewSeniorityList()
    {

        $unitHeadId = auth()->user()->unitHead_id;

        if (request('typeOfApplicant') == 'MINISTERIAL') {
            if (request('typeOfQuarters') == 'LSQ') {

                $allAllottees = Allottee::where('unitHead_id', $unitHeadId)
                    ->where('seniority_no', '!=', null)
                    ->where('applicant_type', 'MINISTERIAL')
                    ->where('type', 'LSQ')
                    ->get();
                return view('unitHead.seniorityList', [
                    'applicants' => $allAllottees,
                ]);
            } else {

                $allAllottees = Allottee::where('unitHead_id', $unitHeadId)
                    ->where('seniority_no', '!=', null)
                    ->where('applicant_type', 'MINISTERIAL')
                    ->where('type', 'USQ')
                    ->get();
                return view('unitHead.seniorityList', [
                    'applicants' => $allAllottees,
                ]);
            }
        } else {
            if (request('typeOfQuarters') == 'LSQ') {

                $allAllottees = Allottee::where('unitHead_id', $unitHeadId)
                    ->where('seniority_no', '!=', null)
                    ->where('applicant_type', 'EXECUTIVE')
                    ->where('type', 'LSQ')
                    ->get();
                return view('unitHead.seniorityList', [
                    'applicants' => $allAllottees,
                ]);
            } else {

                $allAllottees = Allottee::where('unitHead_id', $unitHeadId)
                    ->where('seniority_no', '!=', null)
                    ->where('applicant_type', 'EXECUTIVE')
                    ->where('type', 'USQ')
                    ->get();
                return view('unitHead.seniorityList', [
                    'applicants' => $allAllottees,
                ]);
            }
        }
    }


    public function viewQuarters()
    {
        $quarters = Quarters::all();
        return view('unitHead.viewQuarters', [
            'quarters' => $quarters
        ]);
    }



    // View Quarters List
    // public function quartersStatus()
    // {
    //     return view('unitHead.selectQuartersType');
    // }


    // View Allottees
    // public function viewAllottees()
    // {
    //     $allottees = Allottee::select('allottees.id')
    //         ->join('applicants', 'applicants.id', '=', 'allottees.applicant_Id')
    //         ->select('applicants.*')
    //         ->get();
    //     return view('allottees',  [
    //         'allottees' => $allottees
    //     ]);
    // }
}
