<?php

namespace Backend\Modules\Finance\Models;

use Illuminate\Database\Eloquent\Model;

use Backend\Modules\Finance\Models\Invoice;
use Backend\Modules\CoreAdministration\Patients\Models\Patient;

class Billing extends Model
{
    protected $table = 'billings';

    protected $fillable = [

        'billing_no',
        'invoice_id',
        'patient_id',
        'billing_date',
        'subtotal',
        'discount',
        'tax',
        'total_amount',
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