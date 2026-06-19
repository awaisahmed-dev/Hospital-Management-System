<?php

namespace Backend\Modules\Clinical\Prescriptions\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Clinical\Prescriptions\Models\Prescription;
use Backend\Modules\Clinical\Consultations\Models\Consultation;
use Backend\Modules\Clinical\Diagnoses\Models\Diagnosis;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class PrescriptionController extends Controller
{
    public function index(Request $request)
    {
        $query = Prescription::query();

        if($request->search)
        {
            $query->where(
                'prescription_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $prescriptions = $query
            ->latest()
            ->paginate(10);

        return view(
            'prescriptions.index',
            compact('prescriptions')
        );
    }

    public function create()
    {
        $consultations = Consultation::pluck('id','id');

        $diagnoses = Diagnosis::pluck(
            'disease_name',
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
            'prescriptions.create',
            compact(
                'consultations',
                'diagnoses',
                'patients',
                'doctors'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'prescription_no'=>'required|unique:prescriptions',
            'consultation_id'=>'required',
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'medicine_details'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Prescription::create($data);

        return redirect()
            ->route('prescriptions.index')
            ->with(
                'success',
                'Prescription Created Successfully'
            );
    }

    public function show($id)
    {
        $prescription = Prescription::findOrFail($id);

        return view(
            'prescriptions.show',
            compact('prescription')
        );
    }

    public function edit($id)
    {
        $prescription = Prescription::findOrFail($id);

        $consultations = Consultation::pluck('id','id');

        $diagnoses = Diagnosis::pluck(
            'disease_name',
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
            'prescriptions.edit',
            compact(
                'prescription',
                'consultations',
                'diagnoses',
                'patients',
                'doctors'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $prescription = Prescription::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id();

        $prescription->update($data);

        return redirect()
            ->route('prescriptions.index')
            ->with(
                'success',
                'Prescription Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Prescription::destroy($id);

        return redirect()
            ->route('prescriptions.index')
            ->with(
                'success',
                'Prescription Deleted Successfully'
            );
    }
}