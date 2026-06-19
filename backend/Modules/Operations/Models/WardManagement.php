<?php

namespace Backend\Modules\Operations\Models;

use Illuminate\Database\Eloquent\Model;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;
use Backend\Modules\CoreAdministration\Rooms\Models\Room;
use Backend\Modules\CoreAdministration\Beds\Models\Bed;

class WardManagement extends Model
{
    protected $table = 'ward_managements';

    protected $fillable = [

        'ward_no',
        'patient_id',
        'doctor_id',
        'room_id',
        'bed_id',
        'shift_date',
        'ward_type',
        'notes',
        'status',
        'created_by',
        'updated_by'
    ];

    public function patient()
    {
        return $this->belongsTo(
            Patient::class,
            'patient_id'
        );
    }

    public function doctor()
    {
        return $this->belongsTo(
            Doctor::class,
            'doctor_id'
        );
    }

    public function room()
    {
        return $this->belongsTo(
            Room::class,
            'room_id'
        );
    }

    public function bed()
    {
        return $this->belongsTo(
            Bed::class,
            'bed_id'
        );
    }
}