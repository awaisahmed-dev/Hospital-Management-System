<?php

namespace Backend\Modules\CoreAdministration\Departments\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [

        'department_code',
        'name',
        'head_of_department',
        'phone',
        'email',
        'location',
        'capacity',
        'description',
        'status',
        'created_by',
        'updated_by'

    ];
}