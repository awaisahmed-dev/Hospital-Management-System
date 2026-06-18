<?php

namespace Backend\Modules\CoreAdministration\Specializations\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $table = 'specializations';

    protected $fillable = [

        'specialization_code',
        'name',
        'description',
        'default_consultation_fee',
        'status',
        'created_by',
        'updated_by'

    ];
}