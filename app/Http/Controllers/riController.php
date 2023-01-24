<?php

namespace App\Http\Controllers;

use App\Models\Quarters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AllotmentController;
use App\Models\MotherUnit;

class riController extends Controller
{
    // RI Home
    public function index()
    {
        return view('ri.home');
    }



    //     Add Quarters - Form
    public function addQuarters()
    {
        return view('ri.addQuarters');
    }



    // Store Quarters Details
    public function store(Request $request)
    {
        $formdata = $request->validate([
            'class' => '',
            'type' => '',
            'unitHead_id' => '',
            'quarters_name' => 'required',
            'quarters_no' => 'required'
        ]);
        $formdata['unitHead_id'] = auth()->user()->unitHead_id;
        $formdata['unit_name'] = auth()->user()->mother_unit;
        $quarters = Quarters::create($formdata);

        if ($request->class == 'LSQ') {
            MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                ->increment('lsq_quarters_count');
        } else {
            MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                ->increment('usq_quarters_count');
        }



        // FIND allottee and RETURN allottee
        $allottee = AllotmentController::findAllottee($quarters);
        // CHECK any allottees currently in seniority list
        if (!empty($allottee)) {

            $quarters->update(['allottee_id' => $allottee->id]);
            $quarters->update(['status' => '1']);
            // UPDATE quarters_d value IN Allottee table tempararly
            $allottee->update(['quarters_id' => $quarters->id]);
            AllotmentController::askWilling($allottee);
        } else {
            dd('Eligible Applicants not found');
        }

        return redirect('/ri');
    }



    public function viewQuarters()
    {
        $user = Auth::user();
        $name = $user->name;
        $quarters = Quarters::all();
        return view('ri.viewQuarters', [
            'quarters' => $quarters,
            'name' => $name
        ]);
    }
}
