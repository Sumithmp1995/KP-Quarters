<?php

namespace App\Http\Controllers;

use App\Models\ri;
use App\Models\User;
use App\Models\Allottee;
use App\Models\Occupant;
use App\Models\Quarters;
use App\Models\Vacattee;
use App\Models\Applicant;
use App\Models\MotherUnit;
use Illuminate\Http\Request;
use App\Models\AssetRegister;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\AllotmentController;
use App\Imports\ImportQuarter;

class riController extends Controller
{
    // RI Home
    public function index()
    {
        // From applicants table, collect data for applicant status
        $applicants = Applicant::where('unitHead_id', auth()->user()->unitHead_id)
            ->where('approval', 0)
            ->where('remark', 'active')
            ->get();
        // From allottee table, collect data for new occupants                 
        $allottees = Allottee::join('users', 'users.id', 'allottees.user_id')
            ->where('allottees.unitHead_id', auth()->user()->unitHead_id)
            ->where('users.remember_token', 8)
            ->where('allottees.status', 'occupied')
            ->get();
        // From vacattee table, vacattee requests                
        $vacattees = Vacattee::join('users', 'users.id', 'vacattees.user_id')
            ->join('applicants', 'users.id', 'applicants.user_id')
            ->where('vacattees.occupant_declaration', 1)
            ->where('vacattees.ri_confirmation', 0)
            ->where('vacattees.unitHead_id', auth()->user()->unitHead_id)
            ->Where('applicants.remark', 'active')
            ->get();
        // From applicants table, compassionate applicants
        $compassionate = Applicant::where('unitHead_id', auth()->user()->unitHead_id)
            ->where('approval', 0)
            ->where('remark', 'active')
            ->whereNotNull('reservation')
            ->get();
        // From allottee table, applicants enlisted in seniority list                   
        $seniorityCount = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
            ->whereIn('status', array('active', 'rejectee'))
            ->whereNotNull('seniority_no')
            ->whereNull('willingness')
            ->get();
        $vacatteeCount = Vacattee::where('unitHead_id', auth()->user()->unitHead_id)
            ->where('occupant_declaration', 1)
            ->where('vacattees.ri_confirmation', 0)
            ->count();
        $motherUnit = MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)->first();
        $totalQuarters = $motherUnit->lsq_quarters_count + $motherUnit->usq_quarters_count;
        $quartersCount = [
            'totalq' => $totalQuarters,
            'lsq' => $motherUnit->lsq_quarters_count,
            'usq' => $motherUnit->usq_quarters_count,
        ];
        $lsAllottees =  $motherUnit->executive_ls_allotted_count +  $motherUnit->ministerial_ls_allotted_count;
        $usAllottees =  $motherUnit->executive_us_allotted_count +  $motherUnit->ministerial_us_allotted_count;
        $totalAllottees =  $usAllottees +  $lsAllottees;
        $allotteesCount = [
            'totalAllottees' => $totalAllottees,
            'lsAllottees' => $lsAllottees,
            'usAllottees' => $usAllottees
        ];
        $LsqAllottees =  Allottee::whereNull('willingness')
            ->whereIn('allottees.status', array('active', 'rejectee'))
            ->where('allottees.class', 'LSQ')
            ->whereNotNull('seniority_no')
            ->where('unitHead_id', auth()->user()->unitHead_id)
            ->get();
        $UsqAllottees =  Allottee::whereNull('willingness')
            ->whereIn('allottees.status', array('active', 'rejectee'))
            ->where('allottees.class', 'USQ')
            ->whereNotNull('seniority_no')
            ->where('unitHead_id', auth()->user()->unitHead_id)
            ->get();
        return view('ri.home', compact(
            'allottees',
            'applicants',
            'vacattees',
            'quartersCount',
            'allotteesCount',
            'LsqAllottees',
            'UsqAllottees',
            'seniorityCount',
            'compassionate'
        ));
    }



    // ADD Unit Head profile
    public function addRiProfile()
    {
        if (auth()->user()->applied == '1') {
            $ri = ri::where('user_id', auth()->user()->id)->first();
            return view('ri.editRiProfile', compact('ri'));
        } else {
            $ri = User::find(auth()->user()->id);
            return view('ri.addRiProfile', compact('ri'));
        }
    }



    // STORE Ri Profile
    public function storeRiProfile(Request $request)
    {
        $formdata = request()->validate([
            'RiName' => 'required',
            'riPen' => 'required',
            'mother_unit' => 'required',
            'unit_address' => 'required',
            'ri_teleNo' => 'required',
            'desig'  =>  'required',
            'ri_mob' => 'required',
            'ri_email' => 'required',
        ]);
        $formdata['user_id'] = auth()->user()->id;
        $formdata['unitHead_id'] = auth()->user()->unitHead_id;
        ri::create($formdata);
        User::find(auth()->user()->id)->update(['applied' => 1]);    // UPDATE UnitHead_id IN User:UnitHead  Table
        return redirect()->route('ri-home')->with('message', 'Profile added Successfully!');
    }



    //  Unit Head Update ri profile Data
    public function updateRiProfile(Request $request)
    {
        $value = $request->validate([
            'RiName' => 'required',
            'riPen' => 'required',
            'mother_unit' => 'required',
            'unit_address' => 'required',
            'desig'  =>  'required',
            'ri_teleNo' => 'required',
            'ri_mob' => 'required',
            'ri_email' => 'required',
        ]);
        ri::where('user_id', auth()->user()->id)->update($value);
        return redirect()->route('ri-home')->with('message', 'QM profile updated Successfully!');
    }



    //     Add Quarters
    public function createQuarters()
    {
        return view('ri.addQuarters');
    }



    // Store Quarters Details
    public function storeQuarters(Request $request)
    {
        $formdata = $request->validate([
            'class' => '',
            'type' => '',
            'tc_no' => '',
            'kwa_no' => '',
            'kseb_no' => '',
            'unitHead_id' => '',
            'quarters_name' => 'required',
            'quarters_no' => 'required'
        ]);
        $formdata['unitHead_id'] = auth()->user()->unitHead_id;
        $formdata['unit_name'] = auth()->user()->mother_unit;
        $quarters = Quarters::create($formdata);
        // Update quarters count in mother_unit table
        if ($quarters->class == 'LSQ') {
            MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                ->increment('lsq_quarters_count');
        } else {
            MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                ->increment('usq_quarters_count');
        }
        return redirect()->route('ri-createAssets', [$quarters->id]);
    }



    // Create Assets
    public function createAssets($id)
    {
        $quarters = Quarters::find($id);
        return view('ri.addAssets', compact('quarters'));
    }



    // Store Assets
    public function storeAssets(Request $request)
    {
        request()->validate([
            'inputs.*.asset_name' => 'required',
            'inputs.*.asset_type' => 'required',
            'inputs.*.count' => 'required',
            'inputs.*.remark' => 'required'
        ]);
        $newQuarters = Quarters::find($request->quarters_id);
        foreach ($request->inputs as $key => $value) {
            $value['unitHead_id'] = $newQuarters->unitHead_id;
            $value['quarters_id'] = $newQuarters->id;
            AssetRegister::create($value);
        }
        $allottee = AllotmentController::findPriorittee($request->quarters_id);
        if (($allottee)) {
            User::find($allottee->user_id)->update(['remember_token' => 2]);
            $quarters = Quarters::where('quarters.id', $newQuarters->id)
                ->join('allottees', 'allottees.id',  'quarters.allottee_id')
                ->first();
            return view('ri.previewOnQuartersAllotteeFound', compact('quarters'));
        } else {
            return redirect()->route('ri-home')->with('message', ' Quarters has been added.  No Eligible Applicant Found !');
        }
    }




    // Skipp add assets by click later on add asset blade
    public function findAllottee($quartersId)
    {
        $newAllottee = AllotmentController::findPriorittee($quartersId);
        if (($newAllottee)) {
            User::find($newAllottee->user_id)->update(['remember_token' => 2]);
            $quarters = Quarters::where('quarters.id', $quartersId)
                ->join('allottees', 'allottees.id', 'quarters.allottee_id')
                ->where('allottees.status', 'active')
                ->first();
            $allottee =  $newAllottee->join('applicants', 'applicants.id', 'allottees.applicant_id')
                ->join('quarters', 'quarters.id', 'allottees.quarters_id')
                ->join('users', 'users.id', 'allottees.user_id')
                ->where('allottees.applicant_id', $newAllottee->applicant_id)
                ->where('applicants.id', $newAllottee->applicant_id)
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
            return view('ri.previewOnQuartersAllotteeFound', compact('quarters', 'allottee'));
        } else {
            return redirect()->route('ri-home')->with('message', ' Quarters has been added.  No Eligible Applicant Found !');
        }
    }



    //   View Quarters
    public function viewAllQuarters(Request $request)
    {
        //Server side Data Table 
        if ($request->ajax()) {
            $quarters = Quarters::select('id', 'quarters_no', 'quarters_name', 'type', 'class', 'status')
                ->where('unitHead_id', auth()->user()->unitHead_id)->get();
            return Datatables::of($quarters)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('ri-previewQuarter', $row->id) . '" class="btn btn-primary btn-lg"><b class="bi bi-card-checklist"></b> view</a>';
                    return $btn;
                })->rawColumns(['action'])->make(true);
        }
        return view('ri.viewAllQuarters');
    }



    // Preview Application to approve 
    public function previewQuarter($id)
    {
        $quarters = Quarters::find($id);
        $allottee = Allottee::join('applicants', 'applicants.id', 'allottees.applicant_id')
            ->join('occupants', 'occupants.allottee_id', 'allottees.id')
            ->where('applicants.remark', 'active')
            ->where('allottees.quarters_id', $id)
            ->whereIn('allottees.status', array('active', 'occupied'))
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
                ->whereIn('allottees.status', array('active', 'occupied'))
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
        return view('ri.previewQuarters', compact('quarters', 'allottee', 'assets'));
    }


    //     View Application Inbox
    public function viewApplicationInbox()
    {
        $applicants = Applicant::select('id', 'application_no', 'applicant_name', 'pen', 'rank', 'present_unit', 'mother_unit', 'created_at')
            ->where('unitHead_id', auth()->user()->unitHead_id)
            ->where('approval', 0)
            ->Where('remark', 'active')
            ->get();
        return view('ri.applicationInbox', compact('applicants'));
    }



    // Preview Application 
    public function previewApplication($id)
    {
        $applicant = Applicant::find($id);
        return view('ri.previewApplication', compact('applicant'));
    }




    //     List allottees to Hand over key
    public function listNewAllottees()
    {
        $allottees = Allottee::join('quarters', 'quarters.id', 'allottees.quarters_id')
            ->join('users', 'users.id', 'allottees.user_id')
            ->where('allottees.status', 'occupied')
            ->where('users.remember_token', 8)
            ->where('allottees.unitHead_id', auth()->user()->unitHead_id)
            ->where('allottees.status', 'occupied')
            ->select(
                'allottees.application_no',
                'allottees.id',
                'allottees.class',
                'allottees.applicant_type',
                'allottees.applicant_name',
                'quarters.quarters_name',
                'quarters.quarters_no',
            )
            ->get();
        return view('ri.newAllottees', compact('allottees'));
    }




    // preview Allottees
    public function previewAllottee(Allottee $allottee)
    {
        $allottee =  Allottee::join('applicants', 'applicants.id', 'allottees.applicant_id')
            ->join('quarters', 'quarters.id', 'allottees.quarters_id')
            ->join('users', 'users.id', 'allottees.user_id')
            ->join('occupants', 'allottees.id', 'occupants.allottee_id')
            ->whereIn('applicants.remark', array('active', 'rejectee'))
            ->where('users.id', $allottee->user_id)
            ->whereIn('allottees.status', array('occupied', 'active'))
            ->where('occupants.allottee_id', $allottee->id)
            ->where('quarters.allottee_id', $allottee->id)
            ->select(
                'quarters.quarters_no',
                'quarters.quarters_name',
                'quarters.type',
                'quarters.class',
                'users.remember_token',
                'applicants.applicant_name',
                'applicants.application_no',
                'applicants.pen',
                'applicants.rank',
                'applicants.gl_no',
                'applicants.present_unit',
                'applicants.photo',
                'applicants.mob',
                'allottees.id',
                'occupants.proceedings_no',
                'occupants.proceedings_doc'
            )
            ->first();
        return view('ri.previewAllottee', compact('allottee'));
    }



    // preview Allottees
    public function handoverKey(Allottee $allottee)
    {
        User::find($allottee->user_id)->update(['remember_token' => 9]);
        return redirect()->route('ri-home')->with('message', 'Quarters has been hanover to new allottee. Allotment process completed! ');
    }



    // ri view all occupants
    public function ViewAllOccupants()
    {
        $occupants =  Occupant::join('allottees', 'occupants.allottee_id', 'allottees.id')
            ->join('quarters', 'occupants.quarters_id', 'quarters.id')
            ->join('applicants', 'allottees.applicant_id', 'applicants.id')
            ->where('occupants.unitHead_id', auth()->user()->unitHead_id)
            ->where('occupants.occupants_confirmation', 1)
            ->where('applicants.remark', 'active')
            ->where('allottees.status', 'occupied')
            ->get();
        dd($occupants);
        return view('unitHead.viewAllOccupants', compact('occupants'));
    }



    // view all vacatte requests
    public function viewAllVacateRequests()
    {
        $vacattees =  Allottee::join('applicants', 'applicants.id', 'allottees.applicant_id')
            ->join('occupants', 'occupants.allottee_id', 'allottees.id')
            ->join('vacattees', 'vacattees.occupant_id', 'occupants.id')
            ->where('allottees.status', 'occupied')
            ->where('vacattees.occupant_declaration', '1')
            ->where('vacattees.unitHead_id', auth()->user()->unitHead_id)
            ->select(
                'applicants.application_no',
                'applicants.applicant_name',
                'applicants.pen',
                'applicants.rank',
                'applicants.applicant_type',
                'allottees.created_at',
                'vacattees.id',
            )->get();
        return view('ri.listVacateRequests', compact('vacattees'));
    }



    // ri view Application from seniority list 
    public function previewVacate(Vacattee $vacattee)
    {
        $vacatteeId = $vacattee->id;
        $previewData = $vacattee->join('occupants', 'occupants.id', 'vacattees.occupant_id')
            ->join('allottees', 'vacattees.allottee_id', 'allottees.id')
            ->join('quarters', 'vacattees.quarters_id', 'quarters.id')
            ->join('applicants', 'vacattees.applicant_id', 'applicants.id')
            ->where('vacattees.id', $vacattee->id)
            ->where('allottees.id', $vacattee->allottee_id)
            ->where('occupants.id', $vacattee->occupant_id)
            ->where('quarters.id', $vacattee->quarters_id)
            ->where('applicants.remark', 'active')
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
        return view('ri.previewVacattee', compact('previewData', 'assets', 'vacatteeId'));
    }



    // ri Approve Application
    public function approveVacate($vacatteeId)
    {
        $vacattee =  Vacattee::find($vacatteeId);
        $vacattee->ri_confirmation = 1;
        $vacattee->save();
        User::find($vacattee->user_id)->update(['remember_token' => 11]);
        return redirect()->route('ri-home')->with('message', 'Vacate Request has confirmed and send to Unit Head');
    }



    // Select Seniority List
    public function selectSeniorityList()
    {
        return view('ri.SelectSeniorityList');
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
                    $btn = '<a href="' . route('ri-previewApplication', $row->id) . '" class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('ri.seniorityList', compact('typeOfApplicant', 'class'));
    }



    // View all Assets
    public function viewAssets($quartersId)
    {
        $assets = AssetRegister::where('quarters_id', $quartersId)->get();
        return view('ri.listAssets', compact('assets', 'quartersId'));
    }


    //Edit my Application
    public function editAssets($assetId)
    {
        $assetRegister = AssetRegister::find($assetId);
        return view('ri.editAssets', compact('assetRegister'));
    }


    //Edit my Application
    public function updateAssets(Request $request, AssetRegister $assetRegister)
    {
        $value = $request->validate([
            'asset_name' => 'required',
            'asset_type' => 'required',
            'count' => 'required',
            'remark' => 'required',
            'quarters_id' => ''
        ]);
        $assetRegister->update($value);
        return redirect()->route('ri-viewAssets', [$request->quarters_id])->with('message', 'Asset register updated Successfully');
    }



    //Delete assets
    public function deleteAssets(AssetRegister $assetRegister)
    {
        $quartersId = $assetRegister->quarters_id;
        $assetRegister->delete();
        return redirect()->route('ri-viewAssets', [$quartersId])->with('message', 'Asset deleted  Successfully');
    }



    // Store Assets
    public function storeNewAssets(Request $request)
    {
        request()->validate([
            'inputs.*.asset_name' => 'required',
            'inputs.*.asset_type' => 'required',
            'inputs.*.count' => 'required',
            'inputs.*.remark' => 'required'
        ]);
        $unitHeadId = Quarters::find($request->quarters_id)->pluck('unitHead_id')->first();
        foreach ($request->inputs as $key => $value) {
            $value['unitHead_id'] = $unitHeadId;
            $value['quarters_id'] = $request->quarters_id;
            AssetRegister::create($value);
        }
        return redirect()->route('ri-viewAssets', [$request->quarters_id])->with('message', 'Assets Added Successfully');
    }


    //Import Quarters
    public function importQuarters(Request $request)
    {
        if ($request->file) {
            Excel::import(new ImportQuarter, $request->file('file')->store('files'));
            return redirect()->route('ri-addQuarters')->with('message', 'Import successfull');
        }
        return redirect()->route('ri-addQuarters')->with('errorMessage', 'Import not successfull');
    }












    // Preview Application to approve 
    public function holdQuarters($id)
    {
        $quarters = Quarters::find($id);
        $allottee = Allottee::where('allottees.quarters_id', $id)
            ->whereIn('allottees.status', array('active', 'occupied'))
            ->first();
        $assets = AssetRegister::where('quarters_id', $id)
            ->get();
        return view('ri.previewQuarters', compact('quarters', 'allottee', 'assets'));
    }
}
