<?php

namespace Backend\Modules\Operations\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Operations\Models\Admission;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;
use Backend\Modules\CoreAdministration\Rooms\Models\Room;
use Backend\Modules\CoreAdministration\Beds\Models\Bed;

class AdmissionController extends Controller
{
    public function index(Request $request)
{
    $query = Admission::with([
        'patient',
        'doctor'
    ]);

    if($request->search)
    {
        $query->where(
            'admission_no',
            'like',
            '%'.$request->search.'%'
        );
    }

    $admissions = $query
        ->latest()
        ->paginate(10);

    return view(
        'admissions.index',
        compact('admissions')
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

        $rooms = Room::pluck(
            'room_no',
            'id'
        );

        $beds = Bed::pluck(
            'bed_no',
            'id'
        );

        return view(
            'admissions.create',
            compact(
                'patients',
                'doctors',
                'rooms',
                'beds'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'admission_no'=>'required|unique:admissions',
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'admission_date'=>'required'

        ]);

        $data = $request->all();

        $data['created_by']=auth()->id();
        $data['updated_by']=auth()->id();

        Admission::create($data);

        return redirect()
            ->route('admissions.index');
    }

    public function show($id)
    {
        $admission = Admission::findOrFail($id);

        return view(
            'admissions.show',
            compact('admission')
        );
    }

    public function edit($id)
    {
        $admission = Admission::findOrFail($id);

        $patients = Patient::pluck('first_name','id');
        $doctors = Doctor::pluck('first_name','id');
        $rooms = Room::pluck('room_no','id');
        $beds = Bed::pluck('bed_no','id');

        return view(
            'admissions.edit',
            compact(
                'admission',
                'patients',
                'doctors',
                'rooms',
                'beds'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $admission = Admission::findOrFail($id);

        $data = $request->all();

        $data['updated_by']=auth()->id();

        $admission->update($data);

        return redirect()
            ->route('admissions.index');
    }

    public function destroy($id)
    {
        Admission::destroy($id);

        return redirect()
            ->route('admissions.index');
    }
}
