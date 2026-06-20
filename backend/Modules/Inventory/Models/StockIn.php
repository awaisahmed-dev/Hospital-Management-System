<?php

namespace Backend\Modules\Inventory\Models;

use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    protected $table = 'stock_ins';

    protected $fillable = [

        'stockin_no',
        'product_id',
        'quantity',
        'unit_price',
        'total_amount',
        'stockin_date',
        'remarks',
        'status',
        'created_by',
        'updated_by'
    ];

    public function product()
    {
        return $this->belongsTo(
            Product::class,
            'product_id'
        );
    }
}