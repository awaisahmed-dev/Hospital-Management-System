<?php

namespace Backend\Modules\Inventory\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [

        'product_code',
        'category_id',
        'supplier_id',
        'product_name',
        'purchase_price',
        'sale_price',
        'stock_qty',
        'status',
        'created_by',
        'updated_by'
    ];

    public function category()
    {
        return $this->belongsTo(
            Category::class,
            'category_id'
        );
    }

    public function supplier()
    {
        return $this->belongsTo(
            Supplier::class,
            'supplier_id'
        );
    }
}