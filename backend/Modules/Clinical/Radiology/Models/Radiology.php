<?php

namespace Backend\Modules\Clinical\Radiology\Models;

use Illuminate\Database\Eloquent\Model;

class Radiology extends Model
{
    protected $table = 'radiologies';

    protected $fillable = [

        'radiology_no',
        'consultation_id',
        'patient_id',
        'doctor_id',
        'scan_name',
        'scan_type',
        'scan_fee',
        'order_date',
        'report_date',
        'findings',
        'impression',
        'status',
        'created_by',
        'updated_by'
    ];
}