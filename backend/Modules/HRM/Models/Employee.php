<?php

namespace Backend\Modules\HRM\Models;

use Illuminate\Database\Eloquent\Model;

use Backend\Modules\CoreAdministration\Departments\Models\Department;
use Backend\Modules\HRM\Models\Designation;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [

        'employee_code',
        'first_name',
        'last_name',
        'email',
        'phone',
        'department_id',
        'designation_id',
        'salary',
        'joining_date',
        'status',
        'created_by',
        'updated_by'
    ];

    public function department()
    {
        return $this->belongsTo(
            Department::class,
            'department_id'
        );
    }

    public function designation()
    {
        return $this->belongsTo(
            Designation::class,
            'designation_id'
        );
    }
}