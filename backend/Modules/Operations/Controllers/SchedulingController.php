<?php

namespace Backend\Modules\Operations\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Operations\Models\Scheduling;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class SchedulingController extends Controller
{
    public function index(Request $request)
    {
        $query = Scheduling::with([
            'patient',
            'doctor'
        ]);

        if($request->search)
        {
            $query->where(
                'schedule_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $schedulings = $query
            ->latest()
            ->paginate(10);

        return view(
            'scheduling.index',
            compact('schedulings')
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

        return view(
            'scheduling.create',
            compact(
                'patients',
                'doctors'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'schedule_no'=>'required|unique:schedulings',
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'appointment_date'=>'required',
            'appointment_time'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Scheduling::create($data);

        return redirect()
            ->route('scheduling.index');
    }

    public function show($id)
    {
        $scheduling = Scheduling::with([
            'patient',
            'doctor'
        ])->findOrFail($id);

        return view(
            'scheduling.show',
            compact('scheduling')
        );
    }

    public function edit($id)
    {
        $scheduling = Scheduling::findOrFail($id);

        $patients = Patient::pluck(
            'first_name',
            'id'
        );

        $doctors = Doctor::pluck(
            'first_name',
            'id'
        );

        return view(
            'scheduling.edit',
            compact(
                'scheduling',
                'patients',
                'doctors'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $scheduling = Scheduling::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id();

        $scheduling->update($data);

        return redirect()
            ->route('scheduling.index');
    }

    public function destroy($id)
    {
        Scheduling::destroy($id);

        return redirect()
            ->route('scheduling.index');
    }
}