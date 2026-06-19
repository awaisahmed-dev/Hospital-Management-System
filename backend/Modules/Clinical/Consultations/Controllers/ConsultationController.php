<?php

namespace Backend\Modules\Clinical\Consultations\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Clinical\Consultations\Models\Consultation;
use Backend\Modules\Clinical\Appointments\Models\Appointment;
use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class ConsultationController extends Controller
{
    public function index(Request $request)
    {
        $query = Consultation::query();

        $consultations = $query
            ->latest()
            ->paginate(10);

        return view(
            'consultations.index',
            compact('consultations')
        );
    }

    public function create()
    {
        $appointments = Appointment::pluck('appointment_no','id');
        $patients = Patient::pluck('first_name','id');
        $doctors = Doctor::pluck('first_name','id');

        return view(
            'consultations.create',
            compact(
                'appointments',
                'patients',
                'doctors'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'appointment_id'=>'required',
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'consultation_date'=>'required',

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Consultation::create($data);

        return redirect()
            ->route('consultations.index')
            ->with('success','Consultation Created Successfully');
    }

    public function show($id)
    {
        $consultation = Consultation::findOrFail($id);

        return view(
            'consultations.show',
            compact('consultation')
        );
    }

    public function edit($id)
    {
        $consultation = Consultation::findOrFail($id);

        $appointments = Appointment::pluck('appointment_no','id');
        $patients = Patient::pluck('first_name','id');
        $doctors = Doctor::pluck('first_name','id');

        return view(
            'consultations.edit',
            compact(
                'consultation',
                'appointments',
                'patients',
                'doctors'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $consultation = Consultation::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id();

        $consultation->update($data);

        return redirect()
            ->route('consultations.index')
            ->with('success','Consultation Updated Successfully');
    }

    public function destroy($id)
    {
        Consultation::destroy($id);

        return redirect()
            ->route('consultations.index')
            ->with('success','Consultation Deleted Successfully');
    }
}