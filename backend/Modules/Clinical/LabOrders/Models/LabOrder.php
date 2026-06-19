<?php

namespace Backend\Modules\Clinical\LabOrders\Models;

use Illuminate\Database\Eloquent\Model;

class LabOrder extends Model
{
    protected $table = 'lab_orders';

    protected $fillable = [

        'lab_order_no',
        'consultation_id',
        'patient_id',
        'doctor_id',
        'test_name',
        'test_category',
        'test_fee',
        'order_date',
        'result_date',
        'remarks',
        'status',
        'created_by',
        'updated_by'
    ];
}