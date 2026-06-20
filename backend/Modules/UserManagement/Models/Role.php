<?php

namespace Backend\Modules\UserManagement\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [

        'role_name',
        'description',
        'status',
        'created_by',
        'updated_by'
    ];
}