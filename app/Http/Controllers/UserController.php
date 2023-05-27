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
use Illuminate\Support\Facades\Auth;
use App\Notifications\RiNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\DataTables;


class UserController extends Controller
{
    // View User Dashboard
    public function index()
    {
        $applicantStatus = auth()->user()->remember_token;
        return view('user.home', compact('applicantStatus'));
    }



    // user preview application 
    public function myApplication()
    {
        $applicant = Applicant::where('user_id', auth()->user()->id)
            ->where('remark', '!=', 'rejected')
            ->orderBy('id', 'desc')
            ->first();
        return view('user.myApplication', compact('applicant'));
    }



    // Preview Quarters allocation when user allocated. 
    public function previewQuarters()
    {
        $allottee = Allottee::where('user_id', auth()->user()->id)
            ->whereIn('status', array( 'active', 'occupied', 'rejectee'))
            ->first();
        $quarters = Quarters::find($allottee->quarters_id);
        $priorities = $allottee->join('applicants', 'allottees.applicant_id', 'applicants.id')
            ->where('applicant_id', $allottee->applicant_id)
            ->select('p1', 'p2', 'p3')
            ->first();
        if (($priorities->p1 == $quarters->quarters_name) || ($priorities->p2 == $quarters->quarters_name) || ($priorities->p3 == $quarters->quarters_name)) {
            $priorityStatus = 1;
        } else {
            $priorityStatus = 0;
        }
        $assets = AssetRegister::where('quarters_id', $allottee->quarters_id)->get();
        return view('user.previewOnQuartersConfirmation', compact('quarters', 'allottee', 'assets', 'priorityStatus'));
    }



    //  User view williness - quarters table
    public function  decideWillingness()
    {
        $data = Allottee::where('allottees.user_id', auth()->user()->id)
            ->join('applicants', 'applicants.id', 'allottees.applicant_id')
            ->join('quarters', 'quarters.id', 'allottees.quarters_id')
            ->select(
                'quarters.id',
                'quarters.quarters_name',
                'quarters.quarters_no',
                'quarters.class',
                'quarters.type',
                'quarters.updated_at',
                'allottees.application_no',
                'allottees.id',
                'applicants.photo',
                'applicants.applicant_name',
                'applicants.pen',
                'applicants.present_unit',
                'applicants.rank',
                'applicants.gl_no',
                'applicants.p1',
                'applicants.p2',
                'applicants.p3'
            )
            ->where('allottees.willingness', null)
            ->where('applicants.remark', 'active')
            ->whereIn('allottees.status', array( 'active','rejectee' ) )
            ->first();
        if (($data->p1 == $data->quarters_name) || ($data->p2 == $data->quarters_name) || ($data->p3 == $data->quarters_name)) {
            $priorityStatus = 1;
        } else {
            $priorityStatus = 0;
        }
        if ($data) {
            return view('user.userWillingness', compact('data', 'priorityStatus'));
        } else {
            return redirect()->route('user-home')->with('message', "You don't have Permission");
        }
    }



    // User Confirms Willingness before being  Allotted to Quarters
    public function confirmWilling($id)
    {
        $allottee =  Allottee::find($id);
        if ($allottee) {
            Applicant::find($allottee['applicant_id'])->update(['remark' => 'active']);
            User::find(auth()->user()->id)->update(['remember_token' => 5]);
        
            $occupantData['user_id'] = $allottee['user_id'];
            $occupantData['applicant_name'] = $allottee['applicant_name'];
            $occupantData['applicant_id'] = $allottee['applicant_id'];
            $occupantData['allottee_id'] = $allottee['id'];
            $occupantData['application_no'] = $allottee['application_no'];
            $occupantData['unitHead_id'] = $allottee['unitHead_id'];
            $occupantData['quarters_id'] = $allottee['quarters_id'];
            $occupantData['occupant_status'] = $allottee['occupant_status'];
            Occupant::create($occupantData);
            $allottee->update(['willingness' => 1]);
            return redirect()->route('user-home')->with('message', ' Your Confirmation has been Recorded. Quarters will be allocated soon.  Kindly wait...');
        } else {
            return redirect()->route('user-home')->with('message', "You don't have Permission");
        }
    }




    // View  My Seniority  list
    public function mySeniorityList()
    {
        $allottee = Allottee::where('user_id', auth()->user()->id)
            ->whereIn('status', array('active', 'rejectee'))
            ->first();
        if ($allottee) {
            $applicants = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                ->whereIn('status', array('active', 'rejectee'))
                ->where('applicant_type', $allottee->applicant_type)
                ->where('class', $allottee->class)
                ->select(
                    'seniority_no',
                    'application_no',
                    'applicant_name',
                    'applicant_type',
                    'class',
                    'user_id',
                    'status',
                    'updated_at'
                )
                ->get();
            return view('user.mySeniorityList', compact('applicants'));
        } else {
            return redirect()->route('user-home')->with('message', 'You are not yet included in seniority List ');
        }
    }



    // User reject Willingness before being  Allotted to Quarters
    public function decideRejectQuarters($id)
    {
        $data =  Allottee::join('applicants', 'applicants.id', 'allottees.applicant_id')
            ->join('quarters', 'quarters.id', '=', 'allottees.quarters_id')
            ->where('allottees.willingness', null)
            ->whereIn('allottees.status', array( 'active','rejectee' ) )
            ->where('applicants.remark', 'active')
            ->where('allottees.id', $id)
            ->select(
                'quarters.quarters_name',
                'quarters.quarters_no',
                'quarters.unit_name',
                'quarters.class',
                'quarters.type',
                'quarters.updated_at',
                'allottees.application_no',
                'allottees.id',
                'allottees.quarters_id',
                'applicants.photo',
                'applicants.applicant_name',
                'applicants.pen',
                'applicants.rank',
                'applicants.gl_no',
                'applicants.present_unit',
                'applicants.p1',
                'applicants.p2',
                'applicants.p3'
            )
            ->first();
        if (($data->p1 == $data->quarters_name) ||
            ($data->p2 == $data->quarters_name) ||
            ($data->p3 == $data->quarters_name)
        ) {
            $priorityStatus = 1;
        } else {
            $priorityStatus = 0;
        }

        if ($data) {
            return view('user.rejectQuarters', compact('data', 'priorityStatus'));
        } else {
            return redirect()->route('user-home')->with('message', "You don't have Permission");
        }
    }



    // User first reject Willingness  Quarters
    public function finalRejectWilling($allottee_id)
    {
        $quarters = Quarters::where('allottee_id', $allottee_id)->first();
        $quarters->status = null;
        $quarters->allottee_id = null;
        $quarters->save();

        $rejectee = Allottee::find($allottee_id);
        $rejectee['status']  = 'expelled';
        $rejectee['seniority_no']  =  null;
        $rejectee->quarters_id = null;
        $rejectee->save();

        User::find($rejectee['user_id'])->update(['remember_token' => 7, 'applied' => 0]);
        Applicant::where('id', $rejectee->applicant_id)->update(['approval' => 0, 'remark' => 'expelled']);

        if ($rejectee['applicant_type'] == 'MINISTERIAL') {
            if ($rejectee['class'] == 'LSQ') {
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
            if ($rejectee['class'] == 'LSQ') {
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
        $allottee =  AllotmentController::findPriorittee($quarters->id);
        if ($allottee) {
            Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                ->where('status', 'active')
                ->where('applicant_type', $allottee->applicant_type)
                ->where('class', $allottee->class)
                ->where('seniority_no', '>', $allottee->seniority_no)
                ->select('seniority_no')
                ->decrement('seniority_no');
            User::find($allottee->user_id)->update(['remember_token' => 2]);
            $quarters['allottee_id'] =  $allottee->id;
            $quarters['status'] = 1;
            $quarters->save();
        }
        return redirect()->route('user-home')->with('message', 'അനുവദിക്കപ്പെട്ടത് നിങ്ങൾ മുൻഗണന കൊടുത്തിരിക്കുന്ന ക്വാർട്ടേഴ്‌സ്
                  ആയതിനാൽ  നിങ്ങളുടെ അപേക്ഷ അസാധു ആകുന്നതും സീനിയോറിറ്റി ലിസ്റ്റിൽ നിന്നും നിങ്ങളെ പൂർണമായി
                  ഒഴിവാക്കിയതുമാകുന്നു. പുതിയ അപേക്ഷ നൽകുന്നതിനായി +New Application  Tab തിരഞ്ഞെടുക്കുക. 
                  Your rejection request has been Recorded. Your application has been invalidated and you are expelled from seniority list.
                  click +New Application  Tab for submit new application. Thank You! ');
    }




    // User first reject Willingness  Quarters
    public function firstRejectWilling($allotteeId)
    {
        $quarters = Quarters::where('allottee_id', $allotteeId)->first();
        $quarters->allottee_id = null;
        $quarters->status = null;
        $quarters->save();

        $rejectee = Allottee::find($allotteeId);
        $rejectee->quarters_id = null;
        $rejectee->status = 'rejectee';
        $rejectee->save();
     
        User::find($rejectee->user_id)->update(['remember_token' => 6]);

        //update mother unit table
        if ($rejectee['applicant_type'] == 'MINISTERIAL') {
            if ($rejectee['class'] == 'LSQ') {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->decrement('ministerial_ls_allotted_count');
            } else {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->decrement('ministerial_us_allotted_count');
            }
        } else {
            if ($rejectee['class'] == 'LSQ') {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->decrement('executive_ls_allotted_count');
            } else {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->decrement('executive_us_allotted_count');
            }
        }
        // find new allottee for the rejected quarters
        $allottee =  AllotmentController::findPriorittee($quarters->id);
        if ($allottee) {
            User::find($allottee->user_id)->update(['remember_token' => 2]);
        }
        // find any quarters same as rejected applicant class available
        $applicant = Applicant::find($rejectee->applicant_id);
        $newQuarters = Quarters::where('unitHead_id', auth()->user()->unitHead_id)
            ->whereNull('status')
            ->where('class', $rejectee->class)
            ->get();
        if (count($newQuarters)) {
            foreach ($newQuarters as $quarter) {      // Check for avilable quarters for the applicant class and same priority
                if (
                    $quarter->quarters_name == $applicant['p1'] ||
                    $quarter->quarters_name == $applicant['p2'] ||
                    $quarter->quarters_name == $applicant['p3']
                ) {
                    AllotmentController::findQuarters($quarter, $rejectee);
                    User::find($rejectee->user_id)->update(['remember_token' => 2]);
             
                    return redirect()->route('user-home')->with('message', 'new quarters found');
                }
            }
        }
        return  redirect()->route('user-home')->with('message', 'ഒഴിവുവന്ന ക്വാർട്ടേഴ്‌സിലേക്കുള്ള വില്ലിങ് നിരസിച്ചതിനാൽ നിങ്ങളുടെ 
        പ്രിയോറിറ്റി ലിസ്റ്റിൽ ഉൾപ്പെട്ട ക്വാർട്ടേഴ്സിലേക്ക് മാത്രമായി നിങ്ങളുടെ അപേക്ഷ പരിഗണിക്കുന്നതാണ്. 
        Your rejection request has been Recorded. You are allotted the quarters in your priority when the same is vacant.  
        Kindly wait...');
    }




    public function viewDownloads()
    {
        $allottee = Allottee::join('users', 'users.id', 'allottees.user_id')
            ->where('users.id', auth()->user()->id)
            ->where('allottees.status', 'occupied')
            ->first();

        $applicant = Applicant::join('users', 'users.id', 'applicants.user_id')
            ->where('users.id', auth()->user()->id)
            ->where('applicants.remark', 'active')
            ->first();

        $proceedings = Occupant::join('users', 'users.id', 'occupants.user_id')
            ->where('users.id', auth()->user()->id)
            ->where('occupants.occupant_status', 1)
            ->first();

        return view('user.user_downloads', compact('proceedings', 'allottee', 'applicant'));
    }




    // User download proceedings
    public function downloadProceedings()
    {
        $proceedingsName = Occupant::join('users', 'users.id', 'occupants.user_id')
            ->where('users.id', auth()->user()->id)
            ->select('occupants.proceedings_doc')
            ->where('occupants.occupant_status', 1)->first();
        if ($proceedingsName) {
            $filePath = Storage::url($proceedingsName->proceedings_doc);
            return response()->download(public_path($filePath));
        } else {
            return redirect()->route('user-home')->with('message', "You don't have Permission");
        }
    }



    //Preview Allotted Quarters
    public function PreviewMyQuarters()
    {
        $allottee = Allottee::where('allottees.user_id', auth()->user()->id)
            ->join('applicants', 'applicants.id', 'allottees.applicant_id')
            ->join('quarters', 'quarters.id', 'allottees.quarters_id')
            ->join('occupants', 'allottees.id', 'occupants.allottee_id')
            ->where('occupants.occupant_status', 1)
            ->where('applicants.remark', 'active')
            ->where('allottees.status', 'occupied')
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
                'quarters.id',
                'quarters.quarters_name',
                'quarters.quarters_no',
                'quarters.type',
                'quarters.class',
                'occupants.proceedings_no',
                'occupants.proceedings_doc'
            )
            ->first();
        if ($allottee) {
            $assets = AssetRegister::where('quarters_id', $allottee->quarters_id)->get();
            return view('user.myQuarters', compact('allottee', 'assets'));
        } else {
            return redirect()->route('user-home')->with('message', "You don't have Permission");
        }
    }



    // Select Seniority List
    public function selectUnit()
    {
        $motherUnits = MotherUnit::select('mother_unit')->get();
        return view('user.select_unit', compact('motherUnits'));
    }



    //View All  Quarters
    public function viewAllQuarters(Request $request)
    {
        $unit = $request->unit;
        $unitHeadId = UnitHead::where('mother_unit', $unit)->pluck('id')->first();

        if ($request->ajax()) {
            $quarters = Quarters::select('id', 'quarters_no', 'quarters_name', 'type', 'class', 'status')
                ->where('unitHead_id', $unitHeadId)->get();
            return Datatables::of($quarters)->make(true);
        }
        return view('user.viewAllQuarters', compact('unit'));
    }



    // Select Seniority List by specifying class and type
    public function selectSeniorityList()
    {
        return view('user.SelectSeniorityList');
    }



    // View Seniority List
    public function viewAllSeniorityList(Request $request)
    {
        $unitHeadId = auth()->user()->unitHead_id;
        $applicants = Allottee::where('unitHead_id', $unitHeadId)
            ->whereNotNull('seniority_no')
            ->where('applicant_type', $request->typeOfApplicant)
            ->where('class', $request->typeOfQuarters)
            ->get();
        return view('user.generalSeniorityList', compact('applicants'));
    }



    // View vacate form
    public function ViewVacateForm()
    {
        return view('user.userVacate');
    }



    // store user Vacate data
    public function selfVacate(Request $request)
    {
        $quarters = Quarters::join('allottees', 'allottees.id', 'quarters.allottee_id')
            ->select('quarters.id')
            ->where('allottees.user_id', auth()->user()->id)
            ->where('allottees.status', 'occupied')
            ->first();

        $occupant = Occupant::join('allottees', 'allottees.id', 'occupants.allottee_id')
            ->where('occupants.user_id', auth()->user()->id)
            ->where('occupants.occupant_status', 1)
            ->select('allottees.status', 'occupied')
            ->select('occupants.id', 'occupants.applicant_id', 'occupants.allottee_id')
            ->first();

        $vacatee = $request->validate([
            'reason' => '',
            'other_reason' => '',
            'kseb_noDues' => 'required',
            'kwa_noDues' => 'required',
            'occupant_declaration' => 'accepted',
        ]);

        if ($request->hasFile('kseb_noDues')) {
            $vacatee['kseb_noDues'] = $request->file('kseb_noDues')->store('Nodues_kseb', 'public');
        }
        if ($request->hasFile('kwa_noDues')) {
            $vacatee['kwa_noDues'] = $request->file('kwa_noDues')->store('Nodues_kwa', 'public');
        }
        $vacatee['user_id'] = auth()->user()->id;
        $vacatee['unitHead_id'] = auth()->user()->unitHead_id;
        $vacatee['applicant_id'] = $occupant->applicant_id;
        $vacatee['allottee_id'] = $occupant->allottee_id;
        $vacatee['occupant_id'] = $occupant->id;
        $vacatee['quarters_id'] = $quarters->id;
        $vacattee = Vacattee::create($vacatee);

        User::find(auth()->user()->id)->update(['remember_token' => 10]);

        // Send vacate request alert to UnitHead  vacate request
        $ri = User::find(auth()->user()->unitHead_id)
            ->where('role', '3')->first();
        $path = "/view_vacate_request/$vacattee->id";
        $message =  'New Vacate Request initiated. Click to view';
        Notification::send($ri, new RiNotification($ri['name'], $message,  $path));
        return redirect()->route('user-home')->with('message', 'Vacate Request has been generated. Request will be Processed shortly');
    }




























    // User download quarters details
    public function quartersDetailsDownload()
    {
        $quartersdata = AssetRegister::where('unitHead_id', auth()->user()->unitHead_id);
        return Response::download($quartersdata);
    }




    // User Manage Profile 
    public function manageProfile()
    {
        $applicant = Applicant::where('user_id', Auth::user()->id)
                              ->select(
                                'rank',     
                                'gl_no',     
                                'rank',     
                                'rank',     
                                'mob',     
                                'house_name',     
                                'street_name',     
                                'post_office',     
                                'pin_code',     
                                'tempAddress',     
                              )->first();
        // dd($applicant);
        return view('user.user_manageProfile', compact('applicant'));
    }
}
