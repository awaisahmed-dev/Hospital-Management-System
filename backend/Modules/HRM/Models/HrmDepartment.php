<?php

namespace Backend\Modules\HRM\Models;

use Illuminate\Database\Eloquent\Model;

class HrmDepartment extends Model
{
    protected $table = 'hrm_departments';

    protected $fillable = [

        'department_name',
        'description',
        'status',
        'created_by',
        'updated_by'
    ];
}