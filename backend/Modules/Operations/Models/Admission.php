<?php

namespace Backend\Modules\Operations\Models;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $table = 'admissions';

    protected $fillable = [

        'admission_no',
        'patient_id',
        'doctor_id',
        'room_id',
        'bed_id',
        'admission_date',
        'admission_type',
        'reason',
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
