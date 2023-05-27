<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Allottee;
use App\Models\Quarters;
use App\Models\Applicant;
use App\Models\MotherUnit;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;

class AllotmentController extends Controller
{
    // Find Priority 
    public static function findPriorittee($quartersId)
    {
        $quarters = Quarters::find($quartersId);
        $priorityApplicants = Applicant::join('allottees', 'allottees.applicant_id', 'applicants.id')
            ->where('applicants.unitHead_id', auth()->user()->unitHead_id)
            ->where('allottees.status', 'rejectee')
            ->where('applicants.remark', 'active')
            ->where('allottees.class', $quarters->class)
            ->whereNull('allottees.willingness')
            ->whereNull('allottees.quarters_id')
            ->get();
        if (count($priorityApplicants)) {
            $applicants = MotherUnit::select(
                'lsq_quarters_count',
                'ministerial_ls_allotted_count',
                'usq_quarters_count',
                'usq_quarters_count'
            )->where('unitHead_id', auth()->user()->unitHead_id)->first();

            foreach ($priorityApplicants as $priorityApplicant) {
                // LSQ
                if ($quarters['class'] == 'LSQ') {
                    $ministerialLSQPercent = ($applicants->ministerial_ls_allotted_count /  $applicants->lsq_quarters_count) * 100;
                    if ($ministerialLSQPercent <= 5) {
                        if (
                            $priorityApplicant->applicant_type == 'MINISTERIAL' &&
                            $quarters->quarters_name == $priorityApplicant['p1'] ||
                            $quarters->quarters_name == $priorityApplicant['p2'] ||
                            $quarters->quarters_name == $priorityApplicant['p3']
                        ) {
                            Self::findQuarters($quarters, Allottee::find($priorityApplicant->id) );
                            return ($priorityApplicant);
                        }
                    }
                  
                    if (
                        $priorityApplicant->applicant_type == 'EXECUTIVE' &&
                        $quarters->quarters_name == $priorityApplicant['p1'] ||
                        $quarters->quarters_name == $priorityApplicant['p2'] ||
                        $quarters->quarters_name == $priorityApplicant['p3']
                    ) {
                     
                        Self::findQuarters($quarters, Allottee::find($priorityApplicant->id));
                        return ($priorityApplicant);
                    }
                }
                if ($quarters['class'] == 'USQ') {
                    $ministerialUsqPercent = ($applicants->ministerial_us_allotted_count /  $applicants->usq_quarters_count) * 100;
                    if ($ministerialUsqPercent <= 5) {
                        if (
                            $priorityApplicant->applicant_type == 'MINISTERIAL' &&
                            $quarters->quarters_name == $priorityApplicant['p1'] ||
                            $quarters->quarters_name == $priorityApplicant['p2'] ||
                            $quarters->quarters_name == $priorityApplicant['p3']
                        ) {
                            Self::findQuarters($quarters, Allottee::find($priorityApplicant->id ));
                            return ($priorityApplicant); 
                        }
                    }
                    if (
                        $priorityApplicant->applicant_type == 'EXECUTIVE' &&
                        $quarters->quarters_name == $priorityApplicant['p1'] ||
                        $quarters->quarters_name == $priorityApplicant['p2'] ||
                        $quarters->quarters_name == $priorityApplicant['p3']
                    ) {
                        Self::findQuarters($quarters, Allottee::find($priorityApplicant->id));
                        return ($priorityApplicant);
                    }
                }
            }
        }
        $newallottee = Self::findAllottee($quarters);
        if ($newallottee) {
            Self::findQuarters($quarters, $newallottee);
            return ($newallottee);
        }
        return null;
    }


    // Find Allottee 
    public static function findAllottee($data)
    {
        $reservedApplicants = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
            ->whereNotNull('reservation')
            ->whereNull('willingness')
            ->where('status', 'active')
            ->count();
        if ($reservedApplicants) {
            $allottee = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                ->whereNotNull('reservation')
                ->whereNull('willingness')
                ->where('status', 'active')
                ->first();
            if ($allottee) {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('special_reservations');
                return ($allottee);
            }
        }
        // LSQ
        if ($data['class'] == 'LSQ') {
            $lowerSubordinate = MotherUnit::select(
                'lsq_quarters_count',
                'ministerial_ls_allotted_count',
            )->where('unitHead_id', auth()->user()->unitHead_id)->first();

            $ministerialPercent = ($lowerSubordinate->ministerial_ls_allotted_count /  $lowerSubordinate->lsq_quarters_count) * 100;
            $minLsq = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                ->whereNull('willingness')
                ->whereNull('quarters_id')
                ->where('status', 'active')
                ->where('applicant_type', 'MINISTERIAL')
                ->where('class', 'LSQ')
                ->first();
            if ($minLsq) {
                if ($ministerialPercent <= 5) {
                    return ($minLsq);
                }
            }
            $exeLSQ = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                ->whereNull('willingness')
                ->whereNull('quarters_id')
                ->where('status', 'active')
                ->where('applicant_type', 'EXECUTIVE')
                ->where('class', 'LSQ')
                ->first();
            if ($exeLSQ) {
                return ($exeLSQ);
            }
            return ($minLsq);

            // $minUsq = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
            //     ->whereNull('willingness')
            //     ->where('status', 'active')
            //     ->whereNull('quarters_id')
            //     ->where('applicant_type', 'MINISTERIAL')
            //     ->where('class', 'USQ')
            //     ->first();
            // if ($minUsq) {
            //     return ($minUsq);
            // }
            // $exeUsq = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
            //     ->whereNull('willingness')
            //     ->where('status', 'active')
            //     ->whereNull('quarters_id')
            //     ->where('applicant_type', 'EXECUTIVE')
            //     ->where('class', 'USQ')
            //     ->first();
            // return ($exeUsq);
        } else {
            // if quarters is USQ class,  this code segment will work 
            $upperSubordinate = MotherUnit::select(
                'usq_quarters_count',
                'usq_quarters_count'
            )->where('unitHead_id', auth()->user()->unitHead_id)->first();

            $ministerialPercent = ($upperSubordinate->ministerial_us_allotted_count /  $upperSubordinate->usq_quarters_count) * 100;
            $minUsq = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                ->whereNull('willingness')
                ->whereNull('quarters_id')
                ->where('status', 'active')
                ->whereNull('quarters_id')
                ->where('applicant_type', 'MINISTERIAL')
                ->where('class', 'USQ')
                ->first();
            if ($minUsq) {
                if ($ministerialPercent <= 5) {
                    return ($minUsq);
                }
            }
            $exeUsq = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
                ->whereNull('willingness')
                ->where('status', 'active')
                ->whereNull('quarters_id')
                ->where('applicant_type', 'EXECUTIVE')
                ->where('class', 'USQ')
                ->first();
            if ($exeUsq) {
                return ($exeUsq);
            }
            return ($minUsq);
            // $minLsq = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
            //     ->whereNull('willingness')
            //     ->where('status', 'active')
            //     ->whereNull('quarters_id')
            //     ->where('applicant_type', 'MINISTERIAL')
            //     ->where('class', 'LSQ')
            //     ->first();
            // if ($minLsq) {
            //     return ($minLsq);
            // }
            // $exeLsq = Allottee::where('unitHead_id', auth()->user()->unitHead_id)
            //     ->whereNull('willingness')
            //     ->where('status', 'active')
            //     ->whereNull('quarters_id')
            //     ->where('applicant_type', 'EXECUTIVE')
            //     ->where('class', 'LSQ')
            //     ->first();
            // return ($exeLsq);
        }
    }


    // Unit Head Ask Willingness - send Notification
    public static function askWilling($allottee)
    {
        $user = User::find($allottee['user_id']);
        $path = "/user_view_willingness";
        $message = 'You are About to Allocated a Quarters';
        Notification::send($user, new UserNotification($allottee['applicant_name'], $message, $path));
    }


    public static function findQuarters($quarters, $allottee)
    {
        $quarters['allottee_id'] = $allottee->id;
        $quarters['status'] = 0;
        $quarters->save();
        $allottee['quarters_id'] = $quarters->id;
        $allottee->save();
        if ($quarters->class == 'LSQ') {
            if ($allottee->applicant_type == "MINISTERIAL") {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('ministerial_ls_allotted_count');
            } else {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('executive_ls_allotted_count');
            }
        } else {
            if ($allottee->applicant_type == "MINISTERIAL") {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('ministerial_us_allotted_count');
            } else {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('executive_us_allotted_count');
            }
        }
    }
}
