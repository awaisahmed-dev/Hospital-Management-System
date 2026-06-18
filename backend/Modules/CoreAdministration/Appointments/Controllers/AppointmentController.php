<?php

namespace Backend\Modules\CoreAdministration\Appointments\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\CoreAdministration\Appointments\Models\Appointment;
use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::query();

        if($request->search)
        {
            $query->where('appointment_no','like','%'.$request->search.'%');
        }

        $appointments = $query
            ->latest()
            ->paginate(10);

        return view(
            'appointments.index',
            compact('appointments')
        );
    }

    public function create()
    {
        $patients = Patient::orderBy('first_name')
            ->pluck('first_name','id');

        $doctors = Doctor::orderBy('first_name')
            ->pluck('first_name','id');

        return view(
            'appointments.create',
            compact(
                'patients',
                'doctors'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'appointment_no' => 'required|unique:appointments',
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required',

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Appointment::create($data);

        return redirect()
            ->route('appointments.index')
            ->with(
                'success',
                'Appointment Created Successfully'
            );
    }

    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);

        return view(
            'appointments.show',
            compact('appointment')
        );
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);

        $patients = Patient::orderBy('first_name')
            ->pluck('first_name','id');

        $doctors = Doctor::orderBy('first_name')
            ->pluck('first_name','id');

        return view(
            'appointments.edit',
            compact(
                'appointment',
                'patients',
                'doctors'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $appointment = Appointment::findOrFail($id);

        $request->validate([

            'appointment_no'=>'required',
            'patient_id'=>'required',
            'doctor_id'=>'required',

        ]);

        $data = $request->all();

        $data['updated_by'] = auth()->id();

        $appointment->update($data);

        return redirect()
            ->route('appointments.index')
            ->with(
                'success',
                'Appointment Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Appointment::destroy($id);

        return redirect()
            ->route('appointments.index')
            ->with(
                'success',
                'Appointment Deleted Successfully'
            );
    }
}