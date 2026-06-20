<?php

namespace Backend\Modules\Finance\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Finance\Models\Insurance;

use Backend\Modules\CoreAdministration\Patients\Models\Patient;

class InsuranceController extends Controller
{
    public function index(Request $request)
    {
        $query = Insurance::with('patient');

        if($request->search)
        {
            $query->where(
                'insurance_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $insurances = $query
            ->latest()
            ->paginate(10);

        return view(
            'insurance.index',
            compact('insurances')
        );
    }

    public function create()
    {
        $patients = Patient::pluck(
            'first_name',
            'id'
        );

        return view(
            'insurance.create',
            compact('patients')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'insurance_no'=>'required|unique:insurances',
            'patient_id'=>'required',
            'provider_name'=>'required',
            'policy_no'=>'required'
        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        Insurance::create($data);

        return redirect()
            ->route('insurances.index');
    }

    public function show($id)
    {
        $insurance = Insurance::with(
            'patient'
        )->findOrFail($id);

        return view(
            'insurance.show',
            compact('insurance')
        );
    }

    public function edit($id)
    {
        $insurance = Insurance::findOrFail($id);

        $patients = Patient::pluck(
            'first_name',
            'id'
        );

        return view(
            'insurance.edit',
            compact(
                'insurance',
                'patients'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $insurance = Insurance::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] =
            auth()->id() ?? 1;

        $insurance->update($data);

        return redirect()
            ->route('insurances.index');
    }

    public function destroy($id)
    {
        Insurance::destroy($id);

        return redirect()
            ->route('insurances.index');
    }
}