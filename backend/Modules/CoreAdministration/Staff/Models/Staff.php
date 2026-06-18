<?php

namespace Backend\Modules\CoreAdministration\Staff\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';

    protected $fillable = [

        'employee_no',
        'first_name',
        'last_name',
        'gender',
        'dob',
        'cnic',
        'phone',
        'email',
        'designation',
        'department_id',
        'salary',
        'joining_date',
        'address',
        'city',
        'emergency_contact',
        'status',
        'created_by',
        'updated_by'
    ];
}