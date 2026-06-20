<?php

namespace Backend\Modules\UserManagement\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = [

        'permission_name',
        'description',
        'module_name',
        'status',
        'created_by',
        'updated_by'
    ];
}