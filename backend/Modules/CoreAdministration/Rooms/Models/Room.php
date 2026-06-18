<?php

namespace Backend\Modules\CoreAdministration\Rooms\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = [

        'branch_id',
        'room_no',
        'room_name',
        'room_type',
        'floor_no',
        'capacity',
        'room_charges',
        'description',
        'status',
        'created_by',
        'updated_by'

    ];
}
