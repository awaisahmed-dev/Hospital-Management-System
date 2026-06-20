<?php

namespace Backend\Modules\Inventory\Models;

use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    protected $table = 'stock_outs';

    protected $fillable = [

        'stockout_no',
        'product_id',
        'quantity',
        'stockout_date',
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