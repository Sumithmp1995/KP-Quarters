<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Allottee;
use App\Models\Occupant;
use App\Models\Quarters;
use App\Models\UnitHead;
use App\Models\Vacattee;
use App\Models\Applicant;
use App\Models\MotherUnit;
use Illuminate\Http\Request;
use App\Models\AssetRegister;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Notifications\RiNotification;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitHeadController extends Controller
{

    /* initial setup for unit head profile registration and Ri credentials generated and will be redirected to home page */
    // Decide landing page
    public function initialSetup()
    {
        if (auth()->user()->applied == 1) {
            return redirect()->route('unitHead-home');
        } else {
            return redirect()->route('unitHead-addUnitHead');
        }
    }




    // Add Unit Head profile
    public function createUnitHead()
    {
        $unit = User::find(auth()->user()->id);
        return view('unitHead.addUnitHead', compact('unit'));
    }



    // Register Unit Head profile
    public function storeUnitHead(Request $request)
    {
        $formdata = request()->validate([
            'user_id' => '',
            'mother_unit' => 'required',
            'unitHead_pen' => 'required',
            'unit_address' => 'required',
            'tel_no' => 'required',
            'unitHead_name' => 'required',
            'desig' => 'required',
            'unitHead_mob' => 'required',
            'unit_email' => 'required',
        ]);
        $formdata['unit_address'] = $request->mother_unit . '  ' . $request->unit_address;
        $formdata['user_id'] = auth()->user()->id;
        UnitHead::create($formdata);
        $unitHeadId = UnitHead::where('unitHead_pen', $request->unitHead_pen)->pluck('id')->first();  // FETCH UnitHead_id FROM UnitHead Table
        $unitHeadUser = User::find(auth()->user()->id);    // UPDATE UnitHead_id IN User:UnitHead  Table
        $unitHeadUser['unitHead_id'] =  $unitHeadId;
        $unitHeadUser['present_unit'] =  $request->mother_unit;
        $unitHeadUser['applied'] =  1;
        $unitHeadUser->save();
        MotherUnit::where('mother_unit', auth()->user()->mother_unit)
            ->update(['unitHead_id' => $unitHeadId]);   //   UnitHead registered in MotherUnit Table 
        return redirect()->route('unitHead-addRi')->with('message', 'Unit Head Registered Successfully!');
    }


    /* 
     Initially add ri profile.
     In Users table, if there is a user with role 3 and which has same mother unit as Unit head, 
     then system recognize that user as RI of the saamee Unit.
    */

    // Add Ri     
    public function createRi()
    {
        $unit = User::select('mother_unit')
            ->where('mother_unit', auth()->user()->mother_unit)
            ->where('role', 3)
            ->first();
        if ($unit == null) {
            return view('unitHead.addRi');
        } else {
            return view('unitHead.home');
        }
    }




    // Store RI credentials to USer table 
    public function storeRi(Request $request)
    {
        $formdata = $request->validate([
            'name' => ['required', 'min:3'],
            'pen' => 'required|unique:users',
            'mother_unit' => 'required',
            'password' => 'required|confirmed|min:8',
            'role' => '',
        ]);
        //Hash Password
        $formdata['password'] = bcrypt($formdata['password']);
        $formdata['unitHead_id'] = auth()->user()->unitHead_id;
        $formdata['role'] = '3';
        User::create($formdata);
        return redirect()->route('unitHead-home')->with('message', 'Unit Head & RI Registered Successfully!');
    }

    /*  initial set up ends  
       unit head profile registration and Ri credentials generated and will be redirected to home page,
      before every login attempt,  if any of the stages in initial setup is not been completed, the page will be redirected to initial setup pages  
    */

    //  View Unit Home
    public function index()
    {
        $ri = User::where('unitHead_id', auth()->user()->unitHead_id)
            ->where('role', 3)
            ->first();
        // From applicants table, collect applications for approval
        $applicants = Applicant::where('unitHead_id', auth()->user()->unitHead_id)
            ->Where('remark', 'active')
            ->Where('approval', 0)
            ->get();
        // From allottee table, collect applicants who are included in seniority list               
        $seniorityCount =  Allottee::where('unitHead_id', auth()->user()->unitHead_id)
            ->whereIn('status', array('active', 'rejectee'))
            ->whereNotNull('seniority_no')
            ->whereNull('willingness')
            ->get();
        // From allottee table, collect applicants to whome are confirmed quarters willingness      
        $allottees =  Allottee::where('unitHead_id', auth()->user()->unitHead_id)
            ->whereIn('status', array( 'active', 'rejectee'))
            ->whereNotNull('seniority_no')
            ->whereNotNull('willingness')
            ->get();
        // From vacattee table, collect occupants who initiated vacate requests                    
        $vacattees =  Vacattee::where('unitHead_id', auth()->user()->unitHead_id)
            ->where('unitHead_confirmation', 0)
            ->where('ri_confirmation', 1)
            ->get();
        // From allottee table, collect applicants to whome the quarters confirmations are send. 
        $unconfirmedAllottees =  Allottee::join('users', 'users.id', 'allottees.user_id')
            ->where('allottees.unitHead_id', auth()->user()->unitHead_id)
            ->whereIn('allottees.status', array('active', 'rejectee'))
            ->where('users.remember_token', 2)
            ->get();
        $motherUnit = MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)->first();
        // Count quarters
        $totalQuarters = $motherUnit->lsq_quarters_count + $motherUnit->usq_quarters_count;
        $quartersCount = [
            'totalq' => $totalQuarters,
            'lsq' => $motherUnit->lsq_quarters_count,
            'usq' => $motherUnit->usq_quarters_count,
        ];
        //Count allottees
        $lsAllottees =  $motherUnit->executive_ls_allotted_count +  $motherUnit->ministerial_ls_allotted_count;
        $usAllottees =  $motherUnit->executive_us_allotted_count +  $motherUnit->ministerial_us_allotted_count;
        $totalAllottees =  $usAllottees +  $lsAllottees;
        $allotteesCount = [
            'totalAllottees' => $totalAllottees,
            'lsAllottees' => $lsAllottees,
            'usAllottees' => $usAllottees
        ];

        $LsqAllottees =  Allottee::where('unitHead_id', auth()->user()->unitHead_id)
            ->whereIn('allottees.status', array('active', 'rejectee'))
            ->where('allottees.class', 'LSQ')
            ->whereNotNull('seniority_no')
            ->whereNull('willingness')
            ->get();
        $UsqAllottees =  Allottee::where('unitHead_id', auth()->user()->unitHead_id)
            ->whereIn('allottees.status', array('active', 'rejectee'))
            ->where('allottees.class', 'USQ')
            ->whereNotNull('seniority_no')
            ->whereNull('willingness')
            ->get();
        /* if ri is not added yet, It will be added when ever the unithead logging in */
        if ($ri) {
            return view('unitHead.home', compact(
                'allottees',
                'applicants',
                'vacattees',
                'unconfirmedAllottees',
                'quartersCount',
                'allotteesCount',
                'LsqAllottees',
                'UsqAllottees',
                'seniorityCount'
            ));
        } else {
            return redirect()->route('unitHead-addRi');
        }
    }



    /*   Edit profiles  */
    // EDIT Unit Head profile
    public function manageProfile()
    {
        $ri = User::where('unitHead_id', auth()->user()->unitHead_id)->where('role', '3')->first();
        if ($ri) {
            $unitHead = UnitHead::find(auth()->user()->unitHead_id);
            return view('unitHead.manageProfiles', compact('ri', 'unitHead'));
        } else {
            return redirect()->route('unitHead-addRi');
        }
    }



    // EDIT Unit Head LOGIN DATA
    public function editUnitHeadLoginData()
    {
        $unit = User::find(auth()->user()->id);
        return view('unitHead.editUnitHeadLoginData', compact('unit'));
    }



    // Update Unit Head LOGIN DATA
    public function updateUnitHeadLoginData(Request $request)
    {

        $user = User::findOrFail(auth()->user()->id);
        $value = $request->validate([
            'name' => 'required',
            'pen' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        $value['role'] = 2;
        $value['password'] = bcrypt($value['password']);

        if (Hash::check($request->oldPassword, $user->password)) {
            User::find(auth()->user()->id)->update($value);
            return redirect()->route('unitHead-editProfile')->with('message', 'Unit Head Login Credentials has updated Successfully');
        } else {
            return redirect()->route('unitHead-handoverUnitHead')->with('errorMessage', 'Caution. Old password does not match. Changes not been reflected.');
        }
    }



    // EDIT Unit Head profile
    public function editUnitHeadProfile()
    {
        $unitHead = UnitHead::find(auth()->user()->unitHead_id);
        return view('unitHead.editUnitHeadProfile', compact('unitHead'));
    }



    // Update Unit Head Data
    public function updateUnitHeadProfile(Request $request)
    {
        $value = $request->validate([
            'user_id' => '',
            'mother_unit' => 'required',
            'unitHead_pen' => 'required',
            'unit_address' => 'required',
            'tel_no' => 'required',
            'desig' => 'required',
            'unitHead_name' => 'required',
            'unitHead_mob' => 'required',
            'unit_email' => 'required',
        ]);
        UnitHead::find(auth()->user()->unitHead_id)->update($value);
        return redirect()->route('unitHead-manageProfile')->with('message', 'Unit head profile updated Successfully!');
    }



    // Unit Head edits Ri login data 
    public function editRiLoginData()
    {
        $ri = User::where('unitHead_id', auth()->user()->unitHead_id)
            ->where('role', '3')
            ->first();
        return view('unitHead.editRiLoginData', compact('ri'));
    }



    // Update Unit Head LOGIN DATA
    public function updateRiLoginData(Request $request)
    {
        $value = $request->validate([
            'name' => 'required',
            'pen' => 'required',
        ]);
        $value['role'] = '3';
        User::where('unitHead_id', auth()->user()->unitHead_id)
            ->where('role', '3')
            ->first()
            ->update($value);
        return redirect()->route('unitHead-home')->with('message', 'QM incharge Login credentials has changed Successfully.!');
    }




    // Unit_Head Applications Inbox
    public function viewUnitHeadInbox(Request $request)
    {
        //Server side Data Table 
        if ($request->ajax()) {
            $allAllottees = Applicant::select('id', 'application_no', 'applicant_name', 'pen', 'rank', 'present_unit', 'mother_unit', 'created_at')
                ->where('unitHead_id', auth()->user()->unitHead_id)
                ->Where('remark', 'active')
                ->Where('approval', 0)
                ->get();
            return Datatables::of($allAllottees)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('unitHead-previewApplication', $row->id) . '" class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])->editColumn('created_at', function ($request) {
                    return $request->created_at->toDayDateTimeString();
                })->make(true);
        }
        return view('unitHead.applicationInbox');
    }



    // Preview Application to approve 
    public function previewAllotment($id)
    {
        $applicant = Applicant::find($id);
        $firstAllottee = Applicant::select('id', 'application_no', 'applicant_name', 'pen', 'rank', 'present_unit', 'mother_unit', 'created_at')
        ->where('unitHead_id', auth()->user()->unitHead_id)
        ->Where('remark', 'active')
        ->Where('approval', 0)
        ->pluck('id')
        ->first();
        return view('unitHead.previewApplication', compact('applicant', 'firstAllottee'));
    }



    // Approve Application
    public function approveApplication($id)
    {
        $applicant = Applicant::find($id);
        $applicant['approval'] = 1;       // Application Approved!
        $applicant->save();
        User::find($applicant->user_id)->update(['remember_token' => 2]);
        // Set Type of Applicant : LSQ or USQ
        $rank = array('CPO/PC', 'SCPO/HDR', 'JUNIOR CLERK', 'TYPIST', 'SENIOR CLERK');
        if (in_array($applicant->rank, $rank)) {
            $allottee['class'] = "LSQ";
        } else {
            $allottee['class'] = "USQ";
        }
        // Set Values For Allottee Table
        $allottee['user_id'] =  $applicant->user_id;
        $allottee['unitHead_id'] = auth()->user()->unitHead_id;
        $allottee['applicant_name'] =  $applicant->applicant_name;
        $allottee['applicant_type'] =  $applicant->applicant_type;
        $allottee['application_no'] = $applicant->application_no;
        $allottee['applicant_id'] = $applicant->id;
        if ($applicant->reservation) {
            $allottee['reservation'] =  '1';
        }
        $allottee = Allottee::create($allottee);        // applicant become allottee
        // update Allottee count in mother_unit table
        if ($allottee['applicant_type'] == 'EXECUTIVE') {
            if ($allottee['class'] == 'LSQ') {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('executive_ls_count');
            } else {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('executive_us_count');
            }
        } else {
            if ($allottee['class'] == 'LSQ') {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('ministerial_ls_count');
            } else {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('ministerial_us_count');
            }
        }
        // Seniority Number Generation
        $unitHeadId = auth()->user()->unitHead_id;
        $lastSeniority =  Allottee::where('unitHead_id', $unitHeadId)
            ->where('applicant_type', $allottee['applicant_type'])
            ->where('class', $allottee['class'])
            ->whereIn('status', array('active', 'rejectee'))
            ->whereNotNull('seniority_no')
            ->count();
        $allottee['seniority_no'] = $lastSeniority;
        $allottee->save();

        $quarters = Quarters::where('unitHead_id', auth()->user()->unitHead_id)
            ->whereNull('status')
            ->where('class', $allottee->class)
            ->get();
        // checking priority  and class
        if (count($quarters)) {
            foreach ($quarters as $quarter) {      // Check for avilable quarters for the applicant class and same priority

                if (
                    $quarter->quarters_name == $applicant['p1'] ||
                    $quarter->quarters_name == $applicant['p2'] ||
                    $quarter->quarters_name == $applicant['p3']
                ) {
                    AllotmentController::findQuarters($quarter, $allottee);
                    return redirect()->route('unitHead-previewOnQuartersConfirmation', [$quarter->id])->with('message', 'Eligible Applicant allocated with following Quarters.Applicant Confirmation required!');
                }
            }
        }
        // Not checking priority,  class only  
        $quarters = Quarters::where('unitHead_id', auth()->user()->unitHead_id)
            ->whereNull('status')
            ->where('class', $allottee->class)
            ->first();
        if ($quarters) {
            AllotmentController::findQuarters($quarters, $allottee);
            return redirect()->route('unitHead-previewOnQuartersConfirmation', [$quarters->id])->with('message', 'Eligible Applicant allocated with following Quarters.Applicant Confirmation required!');
        }
        $quarters = Quarters::where('unitHead_id', auth()->user()->unitHead_id)
            ->whereNull('status')
            ->first();
        if ($quarters) {
            AllotmentController::findQuarters($quarters, $allottee);
            return redirect()->route('unitHead-previewOnQuartersConfirmation', [$quarters->id])->with('message', 'Eligible Applicant allocated with following Quarters.Applicant Confirmation required!');
        }
        User::find($allottee->user_id)->update(['remember_token' => 4]);
        return redirect()->route('unitHead-home')->with('message', 'Application has been Approved. 
                          No Quarters available right now, Applicant has been included in Seniority List !');
    }



    // Preview Quarters allocation when an applicant eligible to be allocated. 
    public function previewOnQuartersConfirmation($quartersId)
    {
        $quarters = Quarters::find($quartersId);
        if (($quarters->status == 0)) {
            $newAllottee = Allottee::find($quarters->allottee_id);
            $allottee = $newAllottee->join('applicants', 'allottees.applicant_id', 'applicants.id')
                ->where('allottees.status', 'active')
                ->where('applicants.id', $newAllottee->applicant_id)
                ->first();
            $priorities = $newAllottee->join('applicants', 'allottees.applicant_id', '=', 'applicants.id')
                ->where('applicant_id', $allottee->applicant_id)
                ->select('p1', 'p2', 'p3')
                ->first();
            if (($priorities->p1 == $quarters->quarters_name) || ($priorities->p2 == $quarters->quarters_name) || ($priorities->p3 == $quarters->quarters_name)) {
                $priorityStatus = 1;
            } else {
                $priorityStatus = 0;
            }
            return view('unitHead.previewOnQuartersConfirmation', compact('quarters', 'allottee', 'priorityStatus'));
        }
        return redirect()->route('unitHead-home');
    }



    // UnitHead list all Allottees to whome confirmation has been send
    public function listPendingConfirmations()
    {
        $allottees = Allottee::join('users', 'users.id', 'allottees.user_id')
            ->join('quarters', 'quarters.id', 'allottees.quarters_id')
            ->where('allottees.unitHead_id', auth()->user()->unitHead_id)
            ->where('users.remember_token', 2)
            ->whereIn('allottees.status', array('active', 'rejectee'))
            ->get();

        return view('unitHead.confirmedAllottees', compact('allottees'));
    }




    // preview Allottees
    public function previewAllottee(Allottee $allottee)
    {
        $allottee =  Allottee::join('applicants', 'applicants.id', 'allottees.applicant_id')
            ->join('quarters', 'quarters.id', 'allottees.quarters_id')
            ->join('users', 'users.id', 'allottees.user_id')
            ->where('allottees.applicant_id', $allottee->applicant_id)
            ->where('applicants.id', $allottee->applicant_id)
            ->whereIn('allottees.status', array('active', 'rejectee'))
            ->select(
                'quarters.quarters_name',
                'quarters.quarters_no',
                'quarters.class',
                'quarters.type',
                'users.remember_token',
                'applicants.applicant_name',
                'applicants.photo',
                'applicants.pen',
                'applicants.application_no',
                'applicants.gl_no',
                'applicants.rank',
                'applicants.present_unit',
                'applicants.partner_employee',
                'applicants.radius_five_miles',
                'allottee_id'
            )
            ->first();
        return view('unitHead.previewAllottee', compact('allottee'));
    }



    // Reject Application
    public function rejectApplication(Request $request, $id)
    {
        $applicant = Applicant::find($id);
        $applicant->update(['approval' => 0, 'remark' => $request->remarks]);   // approval = null for rejected applications. by default 0,  1 for approved 
        $user = User::find($applicant->user_id);
        // Send alert to USER : Application Reject Alert
        $user->update(['remember_token' => 3]);
        $path = "/edit_my_application/$applicant->id";
        $message = 'Your Application has been Rejected';
        Notification::send($user, new UserNotification($user['name'], $message, $path));
        return redirect()->route('unitHead-home')->with('message', 'Application has been Rejected. Remark Send to  to concerned User');
    }



    // UnitHead  list all Confirmed Allottees
    public function listConfirmedAllottees()
    {
        $allottees = Allottee::join('users', 'users.id', 'allottees.user_id')
            ->join('quarters', 'quarters.id', 'allottees.quarters_id')
            ->whereIn('allottees.status', array( 'active', 'rejectee'))
            ->where('users.remember_token', 5)
            ->where('allottees.unitHead_id', auth()->user()->unitHead_id)
            ->select(
                'allottees.application_no',
                'allottee_id',
                'allottees.applicant_name',
                'allottees.applicant_type',
                'allottees.class'
            )
            ->get();
        return view('unitHead.confirmedAllottees', compact('allottees'));
    }



    // UnitHead  upload proceedings
    public function uploadProceedings(Request $request, $allottee_id)
    {
        request()->validate([
            'proceedings_no' => 'required',
            'proceedings_doc' => 'required'
        ]);
        //   has image inserted 
        if ($request->hasFile('proceedings_doc')) {
            $file = $request->file('proceedings_doc')->store('unitHead_allot_proceedings_doc', 'public');
        }
        Occupant::where('allottee_id', $allottee_id)->update([
            'proceedings_no' => $request->proceedings_no,
            'proceedings_doc' => $file
        ]);
        return redirect()->route('unitHead-allotmentComplete', [$allottee_id]);
    }




    // UnitHead  complete allotment process
    public function allotQuarters($allottee_id)
    {
        $allottee = Allottee::find($allottee_id);
        $occupantSeniorityNo = $allottee->seniority_no;
        $allottee['status']  = 'occupied';
        $allottee['seniority_no']  =  null;
        $allottee->save();

        User::find($allottee['user_id'])->update(['remember_token' => 8]);
        Quarters::find($allottee['quarters_id'])->update(['status' => 1]);
        Occupant::where('allottee_id', $allottee_id)->update(['occupant_status' => 1]);
        // UPDATE Seniority list                          
        Allottee::where('unitHead_id', auth()->user()->unitHead_id)
            ->where('status', 'active')
            ->where('applicant_type', $allottee->applicant_type)
            ->where('class', $allottee->class)
            ->where('seniority_no', '>', $occupantSeniorityNo)
            ->select('seniority_no')
            ->decrement('seniority_no');
        // Send alert to user  : Allotted 
        $user_id = $allottee->where('id', $allottee_id)->pluck('user_id')->first();
        $user = User::find($user_id);
        $path = "/view_my_proceedings/$allottee_id";
        $message =  'Quarters allocated. Click to view proceedings..';
        Notification::send($user, new UserNotification($user['name'], $message,  $path));
        // Send alert to RI  : Allotted 
        $user = User::where('unitHead_id', auth()->user()->unitHead_id)
            ->where('role', '3')
            ->first();
        $path = "/ri_view_allottee/$allottee_id";
        $message =  'Quarters allocated. Click to view more details..';
        Notification::send($user, new RiNotification($user['name'], $message, $path));
        return redirect()->route('unitHead-home')->with('message', ' Quarters has been allocated Successfully.');
    }



    // unitHead view all occupants
    public function ViewAllOccupants(Request $request)
    {
        //Server side Data Table 
        if ($request->ajax()) {
            $occupants =  Occupant::join('allottees', 'occupants.allottee_id', 'allottees.id')
                ->join('quarters', 'occupants.quarters_id', 'quarters.id')
                ->join('applicants', 'allottees.applicant_id', 'applicants.id')
                ->where('occupants.unitHead_id', auth()->user()->unitHead_id)
                ->where('occupants.occupant_status', 1)
                ->where('applicants.remark', 'active')
                ->where('allottees.status', 'occupied')
                ->get();
            return Datatables::of($occupants) ->editColumn('created_at', function ($request) {
                return $request->created_at->toDayDateTimeString();
            })->make(true);
        }
        return view('unitHead.viewAllOccupants');
    }



    // From vacattee table, collect data    
    public function viewAllVacateRequests()
    {
        $vacattees =  Allottee::join('applicants', 'applicants.id', 'allottees.applicant_id')
            ->join('occupants', 'occupants.allottee_id', 'allottees.id')
            ->join('vacattees', 'vacattees.occupant_id', 'occupants.id')
            ->where('vacattees.unitHead_confirmation', 0)
            ->where('allottees.unitHead_id', auth()->user()->unitHead_id)
            ->where('applicants.unitHead_id', auth()->user()->unitHead_id)
            ->where('occupants.unitHead_id', auth()->user()->unitHead_id)
            ->where('vacattees.unitHead_id', auth()->user()->unitHead_id)
            ->where('allottees.status', array('occupied', 'rejectee'))
            ->where('applicants.remark', 'active')
            ->select(
                'applicants.application_no',
                'applicants.applicant_name',
                'applicants.pen',
                'applicants.rank',
                'applicants.applicant_type',
                'allottees.created_at',
                'vacattees.id',
            )
            ->get();
        return view('unitHead.listVacateRequests', compact('vacattees'));
    }





    // unitHead view Application from seniority list 
    public function previewVacatee(Vacattee $vacattee)
    {
        $vacatteeId = $vacattee->id;
        $previewData =  Vacattee::find($vacattee->id)
            ->join('occupants', 'occupants.id', 'vacattees.occupant_id')
            ->join('allottees', 'occupants.allottee_id', 'allottees.id')
            ->join('quarters', 'occupants.quarters_id', 'quarters.id')
            ->join('applicants', 'allottees.applicant_id', 'applicants.id')
            ->where('applicants.remark', 'active')
            ->where('vacattees.id', $vacatteeId)
            ->where('allottees.id', $vacattee->allottee_id)
            ->where('occupants.id', $vacattee->occupant_id)
            ->where('quarters.id', $vacattee->quarters_id)
            ->select(
                'applicants.applicant_name',
                'applicants.application_no',
                'applicants.pen',
                'applicants.rank',
                'applicants.gl_no',
                'applicants.present_unit',
                'applicants.photo',
                'applicants.mob',
                'applicants.date_of_superannuation',
                'quarters.quarters_name',
                'quarters.quarters_no',
                'quarters.type',
                'quarters.class',
                'occupants.proceedings_no',
                'occupants.proceedings_doc',
                'vacattees.kseb_noDues',
                'vacattees.kwa_noDues',
                'vacattees.id'
            )
            ->first();
        $assets = AssetRegister::where('quarters_id', $vacattee->quarters_id)->get();
        return view('unitHead.previewVacattee', compact('previewData', 'assets', 'vacatteeId'));
    }




    // Approve Application
    public function approveVacate(Vacattee $vacattee)
    {
        User::find($vacattee->user_id)->update(['remember_token' => 12, 'applied' => 0]);
        $quarters =  Quarters::join('allottees', 'quarters.allottee_id', 'allottees.id')
            ->where('allottees.status', 'occupied')
            ->where('allottees.user_id', $vacattee->user_id)
            ->select('quarters.class', 'quarters.status', 'quarters.allottee_id', 'quarters.id', 'allottees.applicant_type')
            ->first();
        Occupant::join('vacattees', 'occupants.id', 'vacattees.occupant_id')
            ->where('vacattees.occupant_id', $vacattee->occupant_id)
            ->select('occupants.occupant_status')
            ->update(['occupant_status' => 0]);
        $allottee = Vacattee::join('allottees', 'allottees.id', 'vacattees.allottee_id')
            ->where('allottees.status', 'occupied')
            ->where('vacattees.id', $vacattee->id)
            ->where('allottees.id', $vacattee->allottee_id)
            ->where('allottees.unitHead_id', auth()->user()->unitHead_id)
            ->select('vacattees.applicant_id', 'vacattees.allottee_id', 'allottees.applicant_type', 'allottees.class')
            ->first();
        Applicant::find($allottee->applicant_id)->update(['approval' => 0, 'remark' => 'vacated']);
        Allottee::find($allottee->allottee_id)->update(['status' => 'vacated']);

        if ($allottee['applicant_type'] == 'MINISTERIAL') {
            if ($allottee['class'] == 'LSQ') {
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
            if ($allottee['class'] == 'LSQ') {
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
        $quarters->status = null;
        $quarters->allottee_id = null;
        $quarters->save();

        $vacattee->update(['unitHead_confirmation' => 1]);

        $allottee =  AllotmentController::findPriorittee($quarters->id);
        if ($allottee) {
            User::find($allottee->user_id)->update(['remember_token' => 2]);
            // $quarters['allottee_id'] =  $allottee->id;
            // $quarters['status'] = 0;
            // $quarters->save();
            return redirect()->route('unitHead-home')->with('message', 'Vacate Process Completed Successfully. Appllicant from seniority list will be allocated the same !');
        }
        return redirect()->route('unitHead-home')->with('message', 'Vacate Process Completed Successfully!. No new applicants remains to be allocated the same quarters!');
    }



    // Select Seniority List
    public function selectSeniorityList()
    {
        return view('unitHead.SelectSeniorityList');
    }



    // View Seniority List
    public function viewSeniorityList(Request $request)
    {
        $typeOfApplicant = $request->typeOfApplicant;
        $class = $request->typeOfQuarters;
        $unitHeadId = auth()->user()->unitHead_id;
        // Server side Data Table 
        if ($request->category == 'ajax') {
            $applicant = Allottee::select('id', 'seniority_no', 'application_no', 'applicant_name', 'applicant_type', 'class', 'updated_at')
                ->where('unitHead_id', $unitHeadId)
                ->whereNotNull('seniority_no')
                ->whereIn('status', array('active', 'rejectee'))
                ->whereNull('willingness')
                ->where('applicant_type',  $request->applicant_type)
                ->where('class', $request->class)
                ->get();

            return Datatables::of($applicant)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('unitHead-previewApplication', $row->id) . '" class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('unitHead.seniorityList', compact('typeOfApplicant', 'class'));
    }



    public function viewAllQuarters(Request $request)
    {
        //Server side Data Table 
        if ($request->ajax()) {
            $quarters = Quarters::select('id', 'quarters_no', 'quarters_name', 'type', 'class', 'status')
                ->where('unitHead_id', auth()->user()->unitHead_id)->get();
            return Datatables::of($quarters)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('unitHead-previewQuarter', $row->id) . '" class="btn btn-primary btn-lg"><b class="bi bi-card-checklist"></b> view</a>';
                    return $btn;
                })->rawColumns(['action'])->make(true);
        }
        return view('unitHead.viewAllQuarters');
    }



    // Preview Application to approve 
    public function previewQuarter($id)
    {
        $quarters = Quarters::find($id);
        $allottee = Allottee::join('applicants', 'applicants.id', 'allottees.applicant_id')
            ->where('applicants.remark', 'active')
            ->join('occupants', 'occupants.allottee_id', 'allottees.id')
            ->where('allottees.id', $quarters->allottee_id)
            ->where('occupants.allottee_id', $quarters->allottee_id)
            ->whereIn('allottees.status', array('active', 'occupied',  'rejectee'))
            ->select(
                'applicants.applicant_name',
                'applicants.photo',
                'applicants.pen',
                'applicants.application_no',
                'applicants.gl_no',
                'applicants.rank',
                'applicants.present_unit',
                'applicants.mob',
                'allottees.willingness',
                'occupants.proceedings_no',
                'occupants.proceedings_doc',
            )
            ->first();

        if (!$allottee) {
            $allottee = Allottee::join('applicants', 'applicants.id', 'allottees.applicant_id')
                ->where('applicants.remark', 'active')
                ->where('allottees.quarters_id', $id)
                ->whereIn('allottees.status', array('active', 'occupied', 'rejectee'))
                ->select(
                    'applicants.applicant_name',
                    'applicants.photo',
                    'applicants.pen',
                    'applicants.application_no',
                    'applicants.gl_no',
                    'applicants.rank',
                    'applicants.present_unit',
                    'applicants.mob',
                    'allottees.willingness',
                )
                ->first();
        }

        $assets = AssetRegister::where('quarters_id', $id)
            ->get();
        return view('unitHead.previewQuarters', compact('quarters', 'allottee', 'assets'));
    }


    // Reports 
    public function reports()
    {
        return view('unitHead.allReports');
    }
}
