<?php

namespace Backend\Modules\CoreAdministration\Doctors\Models;

use Common\Models\BaseModel;

class Doctor extends BaseModel
{
    protected $table = 'doctors';

    protected $fillable = [
        'employee_no',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'cnic',
        'phone',
        'alternate_phone',
        'email',
        'department_id',
        'specialization_id',
        'medical_license_no',
        'qualification',
        'experience_years',
        'joining_date',
        'consultation_fee',
        'salary',
        'blood_group',
        'address',
        'city',
        'country',
        'emergency_contact',
        'profile_image',
        'notes',
        'status',
        'created_by',
        'updated_by'
    ];
}