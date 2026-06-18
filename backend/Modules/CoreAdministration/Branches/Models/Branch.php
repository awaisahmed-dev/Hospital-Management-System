<?php

namespace Backend\Modules\CoreAdministration\Branches\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';

    protected $fillable = [

        'branch_code',
        'name',
        'phone',
        'email',
        'address',
        'city',
        'country',
        'total_rooms',
        'total_beds',
        'manager_name',
        'manager_phone',
        'status',
        'created_by',
        'updated_by'

    ];
}