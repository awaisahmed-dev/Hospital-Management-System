<?php

namespace Backend\Modules\Operations\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Operations\Models\Nursing;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;
use Backend\Modules\CoreAdministration\Staff\Models\Staff;

class NursingController extends Controller
{
    public function index(Request $request)
    {
        $query = Nursing::with([
            'patient',
            'doctor',
            'staff'
        ]);

        if($request->search)
        {
            $query->where(
                'nursing_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $nursings = $query
            ->latest()
            ->paginate(10);

        return view(
            'nursing.index',
            compact('nursings')
        );
    }

    public function create()
    {
        $patients = Patient::pluck(
            'first_name',
            'id'
        );

        $doctors = Doctor::pluck(
            'first_name',
            'id'
        );

        $staffs = Staff::pluck(
            'first_name',
            'id'
        );

        return view(
            'nursing.create',
            compact(
                'patients',
                'doctors',
                'staffs'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'nursing_no'=>'required|unique:nursings',
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'staff_id'=>'required',
            'nursing_date'=>'required'

        ]);

        $data = $request->all();

        $data['created_by']=auth()->id();
        $data['updated_by']=auth()->id();

        Nursing::create($data);

        return redirect()
            ->route('nursing.index');
    }

    public function show($id)
    {
        $nursing = Nursing::with([
            'patient',
            'doctor',
            'staff'
        ])->findOrFail($id);

        return view(
            'nursing.show',
            compact('nursing')
        );
    }

    public function edit($id)
    {
        $nursing = Nursing::findOrFail($id);

        $patients = Patient::pluck(
            'first_name',
            'id'
        );

        $doctors = Doctor::pluck(
            'first_name',
            'id'
        );

        $staffs = Staff::pluck(
            'first_name',
            'id'
        );

        return view(
            'nursing.edit',
            compact(
                'nursing',
                'patients',
                'doctors',
                'staffs'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $nursing = Nursing::findOrFail($id);

        $data = $request->all();

        $data['updated_by']=auth()->id();

        $nursing->update($data);

        return redirect()
            ->route('nursing.index');
    }

    public function destroy($id)
    {
        Nursing::destroy($id);

        return redirect()
            ->route('nursing.index');
    }
}