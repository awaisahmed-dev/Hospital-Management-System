<?php

namespace Backend\Modules\Inventory\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = 'purchase_orders';

    protected $fillable = [

        'po_no',
        'supplier_id',
        'po_date',
        'total_amount',
        'remarks',
        'status',
        'created_by',
        'updated_by'
    ];

    public function supplier()
    {
        return $this->belongsTo(
            Supplier::class,
            'supplier_id'
        );
    }
}