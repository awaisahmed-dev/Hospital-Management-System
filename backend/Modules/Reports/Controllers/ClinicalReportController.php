<?php

namespace Backend\Modules\Reports\Controllers;

use App\Http\Controllers\Controller;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

use Backend\Modules\Operations\Models\Admission;
use Backend\Modules\Operations\Models\Discharge;
use Backend\Modules\Operations\Models\WardManagement;
use Backend\Modules\Operations\Models\Scheduling;

class ClinicalReportController extends Controller
{
    public function index()
    {
        $totalPatients = Patient::count();

        $totalDoctors = Doctor::count();

        $totalAdmissions = Admission::count();

        $totalDischarges = Discharge::count();

        $totalWardManagement = WardManagement::count();

        $totalScheduling = Scheduling::count();

        return view(
            'clinicalreports.index',
            compact(
                'totalPatients',
                'totalDoctors',
                'totalAdmissions',
                'totalDischarges',
                'totalWardManagement',
                'totalScheduling'
            )
        );
    }
}