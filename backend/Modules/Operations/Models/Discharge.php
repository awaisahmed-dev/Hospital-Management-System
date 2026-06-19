<?php

namespace Backend\Modules\Operations\Models;

use Illuminate\Database\Eloquent\Model;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class Discharge extends Model
{
    protected $table = 'discharges';

    protected $fillable = [

        'discharge_no',
        'admission_id',
        'patient_id',
        'doctor_id',
        'discharge_date',
        'discharge_summary',
        'final_diagnosis',
        'instructions',
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

    public function admission()
    {
        return $this->belongsTo(
            Admission::class,
            'admission_id'
        );
    }
}
