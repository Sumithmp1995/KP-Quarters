<?php

namespace App\Imports;

use App\Models\Quarters;
use App\Models\MotherUnit;
use Maatwebsite\Excel\Concerns\ToModel;


class ImportQuarter implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if( ($row[1]) == 'LSQ') {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('lsq_quarters_count');
            } else {
                MotherUnit::where('unitHead_id', auth()->user()->unitHead_id)
                    ->increment('usq_quarters_count');
            }
            
        return new Quarters([
            'unitHead_id' => auth()->user()->unitHead_id,
            'unit_name' => auth()->user()->mother_unit,
            'quarters_name' => $row[0],
            'class' => $row[1],
            'quarters_no' => $row[2],
            'type' => $row[3], 
            'tc_no' => $row[4], 
            'kwa_no' => $row[5],
            'kseb_no' => $row[6],  
            'allottee_id' => null, 
            'status' => null, 
            'action' => null, 
        ]);
    }
}
