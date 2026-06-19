<?php

namespace Backend\Modules\Clinical\Diagnoses\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $table = 'diagnoses';

    protected $fillable = [

        'consultation_id',
        'patient_id',
        'doctor_id',
        'diagnosis_date',
        'disease_name',
        'icd_code',
        'symptoms',
        'findings',
        'remarks',
        'status',
        'created_by',
        'updated_by'
    ];
}
