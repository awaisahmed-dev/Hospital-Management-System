<?php

namespace Backend\Modules\Clinical\Consultations\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $table = 'consultations';

    protected $fillable = [

        'appointment_id',
        'patient_id',
        'doctor_id',
        'consultation_date',
        'chief_complaint',
        'history',
        'diagnosis',
        'treatment_plan',
        'doctor_notes',
        'status',
        'created_by',
        'updated_by'
    ];
}