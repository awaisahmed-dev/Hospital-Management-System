<?php

namespace Backend\Modules\Operations\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Operations\Models\Discharge;
use Backend\Modules\Operations\Models\Admission;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class DischargeController extends Controller
{
    public function index(Request $request)
    {
        $query = Discharge::with([
            'patient',
            'doctor'
        ]);

        if($request->search)
        {
            $query->where(
                'discharge_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $discharges = $query
            ->latest()
            ->paginate(10);

        return view(
            'discharges.index',
            compact('discharges')
        );
    }

    public function create()
    {
        $admissions = Admission::pluck(
            'admission_no',
            'id'
        );

        $patients = Patient::pluck(
            'first_name',
            'id'
        );

        $doctors = Doctor::pluck(
            'first_name',
            'id'
        );

        return view(
            'discharges.create',
            compact(
                'admissions',
                'patients',
                'doctors'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'discharge_no'=>'required|unique:discharges',
            'admission_id'=>'required',
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'discharge_date'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Discharge::create($data);

        return redirect()
            ->route('discharges.index');
    }

    public function show($id)
{
    $discharge = Discharge::with([
        'patient',
        'doctor',
        'admission'
    ])->findOrFail($id);

    return view(
        'discharges.show',
        compact('discharge')
    );
}

public function edit($id)
{
    $discharge = Discharge::findOrFail($id);

    $admissions = Admission::pluck(
        'admission_no',
        'id'
    );

    $patients = Patient::pluck(
        'first_name',
        'id'
    );

    $doctors = Doctor::pluck(
        'first_name',
        'id'
    );

    return view(
        'discharges.edit',
        compact(
            'discharge',
            'admissions',
            'patients',
            'doctors'
        )
    );
}

public function update(Request $request,$id)
{
    $discharge = Discharge::findOrFail($id);

    $data = $request->all();

    $data['updated_by'] = auth()->id();

    $discharge->update($data);

    return redirect()
        ->route('discharges.index')
        ->with(
            'success',
            'Discharge Updated Successfully'
        );
}

public function destroy($id)
{
    Discharge::destroy($id);

    return redirect()
        ->route('discharges.index')
        ->with(
            'success',
            'Discharge Deleted Successfully'
        );
}
}
