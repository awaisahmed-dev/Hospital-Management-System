<?php

namespace Backend\Modules\Operations\Models;

use Illuminate\Database\Eloquent\Model;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;
use Backend\Modules\CoreAdministration\Staff\Models\Staff;

class Nursing extends Model
{
    protected $table = 'nursings';

    protected $fillable = [

        'nursing_no',
        'patient_id',
        'doctor_id',
        'staff_id',
        'nursing_date',
        'care_notes',
        'medication_notes',
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

    public function staff()
    {
        return $this->belongsTo(
            Staff::class,
            'staff_id'
        );
    }
}