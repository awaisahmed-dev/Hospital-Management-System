<?php

namespace Backend\Modules\CoreAdministration\Doctors\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Backend\Modules\CoreAdministration\Doctors\Models\Doctor;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $query = Doctor::query();

        if ($request->search) {

            $query->where('employee_no','like','%'.$request->search.'%')
                ->orWhere('first_name','like','%'.$request->search.'%')
                ->orWhere('last_name','like','%'.$request->search.'%')
                ->orWhere('phone','like','%'.$request->search.'%');
        }

        $doctors = $query
            ->latest()
            ->paginate(10);

        return view(
            'doctors.index',
            compact('doctors')
        );
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_no'=>'required|unique:doctors',
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        Doctor::create($data);

        return redirect()
            ->route('doctors.index')
            ->with('success','Doctor Created Successfully');
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);

        return view(
            'doctors.show',
            compact('doctor')
        );
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);

        return view(
            'doctors.edit',
            compact('doctor')
        );
    }

    public function update(Request $request,$id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
        ]);

        $data = $request->all();

        $data['updated_by'] = auth()->id() ?? 1;

        $doctor->update($data);

        return redirect()
            ->route('doctors.index')
            ->with('success','Doctor Updated Successfully');
    }

    public function destroy($id)
    {
        Doctor::destroy($id);

        return redirect()
            ->route('doctors.index')
            ->with('success','Doctor Deleted Successfully');
    }
}