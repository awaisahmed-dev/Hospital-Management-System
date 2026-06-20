<?php

namespace Backend\Modules\HRM\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table = 'designations';

    protected $fillable = [

        'department_id',
        'designation_name',
        'status',
        'created_by',
        'updated_by'
    ];

    public function department()
    {
        return $this->belongsTo(
            HrmDepartment::class,
            'department_id'
        );
    }
}