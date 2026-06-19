<?php

namespace Backend\Modules\Clinical\Diagnoses\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Clinical\Diagnoses\Models\Diagnosis;
use Backend\Modules\Clinical\Consultations\Models\Consultation;
use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class DiagnosisController extends Controller
{
    public function index(Request $request)
    {
        $query = Diagnosis::query();

        $diagnoses = $query
            ->latest()
            ->paginate(10);

        return view(
            'diagnoses.index',
            compact('diagnoses')
        );
    }

    public function create()
    {
        $consultations = Consultation::pluck('id','id');
        $patients = Patient::pluck('first_name','id');
        $doctors = Doctor::pluck('first_name','id');

        return view(
            'diagnoses.create',
            compact(
                'consultations',
                'patients',
                'doctors'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'consultation_id' => 'required',
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'diagnosis_date' => 'required',
            'disease_name' => 'required',

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Diagnosis::create($data);

        return redirect()
            ->route('diagnoses.index')
            ->with('success','Diagnosis Created Successfully');
    }

    public function show($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);

        return view(
            'diagnoses.show',
            compact('diagnosis')
        );
    }

    public function edit($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);

        $consultations = Consultation::pluck('id','id');
        $patients = Patient::pluck('first_name','id');
        $doctors = Doctor::pluck('first_name','id');

        return view(
            'diagnoses.edit',
            compact(
                'diagnosis',
                'consultations',
                'patients',
                'doctors'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $diagnosis = Diagnosis::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id();

        $diagnosis->update($data);

        return redirect()
            ->route('diagnoses.index')
            ->with('success','Diagnosis Updated Successfully');
    }

    public function destroy($id)
    {
        Diagnosis::destroy($id);

        return redirect()
            ->route('diagnoses.index')
            ->with('success','Diagnosis Deleted Successfully');
    }
}