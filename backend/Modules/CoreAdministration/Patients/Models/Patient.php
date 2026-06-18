<?php

namespace Backend\Modules\CoreAdministration\Patients\Models;

use Common\Models\BaseModel;

class Patient extends BaseModel
{
    protected $table = 'patients';

    protected $fillable = [
        'mr_no',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'cnic',
        'passport_no',
        'phone',
        'alternate_phone',
        'email',
        'blood_group',
        'marital_status',
        'address',
        'city',
        'province',
        'country',
        'guardian_name',
        'guardian_phone',
        'emergency_contact',
        'occupation',
        'insurance_company',
        'insurance_number',
        'status',
        'created_at',
        'created_at',
        'updated_by',
        'updated_by',
    ];
}