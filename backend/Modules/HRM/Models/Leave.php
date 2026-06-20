<?php

namespace Backend\Modules\HRM\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'leaves';

    protected $fillable = [

        'leave_no',
        'employee_id',
        'from_date',
        'to_date',
        'reason',
        'status',
        'created_by',
        'updated_by'
    ];

    public function employee()
    {
        return $this->belongsTo(
            Employee::class,
            'employee_id'
        );
    }
}