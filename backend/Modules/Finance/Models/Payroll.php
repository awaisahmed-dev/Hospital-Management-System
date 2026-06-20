<?php

namespace Backend\Modules\Finance\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $table = 'payrolls';

    protected $fillable = [

        'payroll_no',
        'employee_name',
        'salary',
        'payroll_date',
        'remarks',
        'status',
        'created_by',
        'updated_by'
    ];
}