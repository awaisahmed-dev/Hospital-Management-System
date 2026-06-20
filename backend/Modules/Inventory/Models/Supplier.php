<?php

namespace Backend\Modules\Inventory\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $fillable = [

        'supplier_code',
        'supplier_name',
        'contact_person',
        'phone',
        'email',
        'address',
        'status',
        'created_by',
        'updated_by'
    ];
}