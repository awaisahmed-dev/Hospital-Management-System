<?php

namespace Backend\Modules\CoreAdministration\Patients\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Backend\Modules\CoreAdministration\Patients\Models\Patient;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $query = Patient::query();

        if ($request->search) {

            $query->where('mr_no', 'like', '%' . $request->search . '%')
                  ->orWhere('first_name', 'like', '%' . $request->search . '%')
                  ->orWhere('last_name', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');
        }

        $patients = $query
            ->latest()
            ->paginate(10);

        return view(
            'patients.index',
            compact('patients')
        );
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'mr_no'      => 'required|unique:patients',
        'first_name' => 'required',
        'last_name'  => 'required',
        'phone'      => 'required',
        'gender'     => 'required',
    ]);

    $data = $request->all();

    $data['created_by'] = auth()->id() ?? 1;
    $data['updated_by'] = auth()->id() ?? 1;

    Patient::create($data);

    return redirect()
        ->route('patients.index')
        ->with(
            'success',
            'Patient Created Successfully'
        );
}

    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return view(
            'patients.show',
            compact('patient')
        );
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);

        return view(
            'patients.edit',
            compact('patient')
        );
    }

    public function update(Request $request, $id)
{
    $patient = Patient::findOrFail($id);

    $request->validate([
        'first_name' => 'required',
        'last_name'  => 'required',
        'phone'      => 'required',
    ]);

    $data = $request->all();

    $data['updated_by'] = auth()->id() ?? 1;

    $patient->update($data);

    return redirect()
        ->route('patients.index')
        ->with(
            'success',
            'Patient Updated Successfully'
        );
}

    public function destroy($id)
    {
        Patient::destroy($id);

        return redirect()
            ->route('patients.index')
            ->with('success','Patient Deleted Successfully');
    }
}