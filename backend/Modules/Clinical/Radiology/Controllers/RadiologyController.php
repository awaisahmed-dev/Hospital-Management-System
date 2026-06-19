<?php

namespace Backend\Modules\Clinical\Radiology\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Clinical\Radiology\Models\Radiology;
use Backend\Modules\Clinical\Consultations\Models\Consultation;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class RadiologyController extends Controller
{
    public function index(Request $request)
    {
        $query = Radiology::query();

        if($request->search)
        {
            $query->where(
                'radiology_no',
                'like',
                '%'.$request->search.'%'
            )
            ->orWhere(
                'scan_name',
                'like',
                '%'.$request->search.'%'
            );
        }

        $radiologies = $query
            ->latest()
            ->paginate(10);

        return view(
            'radiology.index',
            compact('radiologies')
        );
    }

    public function create()
    {
        $consultations = Consultation::pluck(
            'id',
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
            'radiology.create',
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

            'radiology_no'=>'required|unique:radiologies',
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'scan_name'=>'required',
            'order_date'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Radiology::create($data);

        return redirect()
            ->route('radiology.index')
            ->with(
                'success',
                'Radiology Created Successfully'
            );
    }

    public function show($id)
    {
        $radiology = Radiology::findOrFail($id);

        return view(
            'radiology.show',
            compact('radiology')
        );
    }

    public function edit($id)
    {
        $radiology = Radiology::findOrFail($id);

        $consultations = Consultation::pluck(
            'id',
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
            'radiology.edit',
            compact(
                'radiology',
                'consultations',
                'patients',
                'doctors'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $radiology = Radiology::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id();

        $radiology->update($data);

        return redirect()
            ->route('radiology.index')
            ->with(
                'success',
                'Radiology Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Radiology::destroy($id);

        return redirect()
            ->route('radiology.index')
            ->with(
                'success',
                'Radiology Deleted Successfully'
            );
    }
}
