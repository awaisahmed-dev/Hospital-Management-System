<?php

namespace Backend\Modules\Clinical\Appointments\Models;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    protected $fillable = [

        'appointment_no',
        'patient_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        'token_no',
        'visit_type',
        'appointment_source',
        'consultation_fee',
        'symptoms',
        'doctor_notes',
        'status',
        'created_by',
        'updated_by'
    ];

    public function patient()
{
    return $this->belongsTo(
        Patient::class,
        'patient_id'
    );
}

public function doctor()
{
    return $this->belongsTo(
        Doctor::class,
        'doctor_id'
    );
}
}