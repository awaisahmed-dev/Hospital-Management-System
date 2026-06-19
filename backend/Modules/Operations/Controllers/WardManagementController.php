<?php

namespace Backend\Modules\Operations\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Operations\Models\WardManagement;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;
use Backend\Modules\CoreAdministration\Rooms\Models\Room;
use Backend\Modules\CoreAdministration\Beds\Models\Bed;

class WardManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = WardManagement::with([
            'patient',
            'doctor',
            'room',
            'bed'
        ]);

        if($request->search)
        {
            $query->where(
                'ward_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $wardmanagements = $query
            ->latest()
            ->paginate(10);

        return view(
            'wardmanagement.index',
            compact('wardmanagements')
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
            'wardmanagement.create',
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

            'ward_no'=>'required|unique:ward_managements',
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'room_id'=>'required',
            'bed_id'=>'required',
            'shift_date'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        WardManagement::create($data);

        return redirect()
            ->route('wardmanagement.index');
    }

    public function show($id)
    {
        $wardmanagement = WardManagement::with([
            'patient',
            'doctor',
            'room',
            'bed'
        ])->findOrFail($id);

        return view(
            'wardmanagement.show',
            compact('wardmanagement')
        );
    }

    public function edit($id)
    {
        $wardmanagement = WardManagement::findOrFail($id);

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
            'wardmanagement.edit',
            compact(
                'wardmanagement',
                'patients',
                'doctors',
                'rooms',
                'beds'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $wardmanagement = WardManagement::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id();

        $wardmanagement->update($data);

        return redirect()
            ->route('wardmanagement.index');
    }

    public function destroy($id)
    {
        WardManagement::destroy($id);

        return redirect()
            ->route('wardmanagement.index');
    }
}