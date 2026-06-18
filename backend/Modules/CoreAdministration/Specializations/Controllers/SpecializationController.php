<?php

namespace Backend\Modules\CoreAdministration\Specializations\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\CoreAdministration\Specializations\Models\Specialization;

class SpecializationController extends Controller
{
    public function index(Request $request)
    {
        $query = Specialization::query();

        if($request->search)
        {
            $query->where(
                'specialization_code',
                'like',
                '%'.$request->search.'%'
            )
            ->orWhere(
                'name',
                'like',
                '%'.$request->search.'%'
            );
        }

        $specializations = $query
            ->latest()
            ->paginate(10);

        return view(
            'specializations.index',
            compact('specializations')
        );
    }

    public function create()
    {
        return view('specializations.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'specialization_code'=>'required|unique:specializations',
            'name'=>'required',

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Specialization::create($data);

        return redirect()
            ->route('specializations.index')
            ->with(
                'success',
                'Specialization Created Successfully'
            );
    }

    public function show($id)
    {
        $specialization = Specialization::findOrFail($id);

        return view(
            'specializations.show',
            compact('specialization')
        );
    }

    public function edit($id)
    {
        $specialization = Specialization::findOrFail($id);

        return view(
            'specializations.edit',
            compact('specialization')
        );
    }

    public function update(Request $request,$id)
    {
        $specialization = Specialization::findOrFail($id);

        $request->validate([

            'specialization_code'=>'required',
            'name'=>'required',

        ]);

        $data = $request->all();

        $data['updated_by'] = auth()->id();

        $specialization->update($data);

        return redirect()
            ->route('specializations.index')
            ->with(
                'success',
                'Specialization Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Specialization::destroy($id);

        return redirect()
            ->route('specializations.index')
            ->with(
                'success',
                'Specialization Deleted Successfully'
            );
    }
}