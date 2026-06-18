<?php

namespace Backend\Modules\CoreAdministration\Beds\Models;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    protected $table = 'beds';

    protected $fillable = [

        'room_id',
        'bed_no',
        'bed_type',
        'daily_charges',
        'availability',
        'status',
        'created_by',
        'updated_by'
    ];
}