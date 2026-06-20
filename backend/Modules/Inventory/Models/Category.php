<?php

namespace Backend\Modules\Inventory\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [

        'category_name',
        'description',
        'status',
        'created_by',
        'updated_by'
    ];
}