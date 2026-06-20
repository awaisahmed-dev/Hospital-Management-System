<?php

namespace Backend\Modules\Finance\Models;

use Illuminate\Database\Eloquent\Model;

use Backend\Modules\Finance\Models\Invoice;
use Backend\Modules\CoreAdministration\Patients\Models\Patient;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [

        'payment_no',
        'invoice_id',
        'patient_id',
        'amount',
        'payment_date',
        'payment_method',
        'remarks',
        'status',
        'created_by',
        'updated_by'
    ];

    public function invoice()
    {
        return $this->belongsTo(
            Invoice::class,
            'invoice_id'
        );
    }

    public function patient()
    {
        return $this->belongsTo(
            Patient::class,
            'patient_id'
        );
    }
}