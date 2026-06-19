<?php

namespace Backend\Modules\Operations\Models;

use Illuminate\Database\Eloquent\Model;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class Scheduling extends Model
{
    protected $table = 'schedulings';

    protected $fillable = [

        'schedule_no',
        'patient_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        'purpose',
        'remarks',
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