<?php

namespace Backend\Modules\Finance\Models;

use Illuminate\Database\Eloquent\Model;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;

class Insurance extends Model
{
    protected $table = 'insurances';

    protected $fillable = [

        'insurance_no',
        'patient_id',
        'provider_name',
        'policy_no',
        'coverage_amount',
        'start_date',
        'end_date',
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
}