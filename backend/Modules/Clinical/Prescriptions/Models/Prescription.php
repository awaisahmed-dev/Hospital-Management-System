<?php

namespace Backend\Modules\Clinical\Prescriptions\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescriptions';

    protected $fillable = [

        'consultation_id',
        'patient_id',
        'doctor_id',
        'diagnosis_id',
        'prescription_no',
        'medicine_details',
        'instructions',
        'duration_days',
        'prescription_date',
        'status',
        'created_by',
        'updated_by'
    ];
}