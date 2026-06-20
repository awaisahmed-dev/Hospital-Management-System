<?php

namespace Backend\Modules\Finance\Models;

use Illuminate\Database\Eloquent\Model;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = [

        'invoice_no',
        'patient_id',
        'doctor_id',
        'total_amount',
        'paid_amount',
        'balance_amount',
        'invoice_date',
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