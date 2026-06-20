<?php

namespace Backend\Modules\Reports\Controllers;

use App\Http\Controllers\Controller;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class AnalyticsController extends Controller
{
    public function index()
    {
        return view(
            'analytics.index',
            [
                'patients' => Patient::count(),
                'doctors' => Doctor::count(),
            ]
        );
    }
}