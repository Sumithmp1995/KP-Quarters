<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetRegister extends Model
{
    use HasFactory;
    protected $fillable = [
        'unitHead_id' ,
        'quarters_id' ,
        'asset_name',
        'asset_type',
        'count',
        'remark'
    ];
}
