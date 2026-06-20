<?php

namespace Backend\Modules\UserManagement\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    protected $fillable = [

        'name',
        'email',
        'password',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $hidden = [
        'password'
    ];
}