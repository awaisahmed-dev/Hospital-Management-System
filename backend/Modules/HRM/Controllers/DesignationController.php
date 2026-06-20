<?php

namespace Backend\Modules\HRM\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\HRM\Models\Designation;
use Backend\Modules\HRM\Models\HrmDepartment;

class DesignationController extends Controller
{
    public function index(Request $request)
    {
        $query = Designation::with('department');

        if($request->search)
        {
            $query->where(
                'designation_name',
                'like',
                '%'.$request->search.'%'
            );
        }

        $designations = $query
            ->latest()
            ->paginate(10);

        return view(
            'designations.index',
            compact('designations')
        );
    }

    public function create()
    {
        $departments = HrmDepartment::pluck(
            'department_name',
            'id'
        );

        return view(
            'designations.create',
            compact('departments')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'department_id'=>'required',
            'designation_name'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        Designation::create($data);

        return redirect()
            ->route('designations.index')
            ->with(
                'success',
                'Designation Created Successfully'
            );
    }

    public function show($id)
    {
        $designation = Designation::with(
            'department'
        )->findOrFail($id);

        return view(
            'designations.show',
            compact('designation')
        );
    }

    public function edit($id)
    {
        $designation = Designation::findOrFail($id);

        $departments = HrmDepartment::pluck(
            'department_name',
            'id'
        );

        return view(
            'designations.edit',
            compact(
                'designation',
                'departments'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $designation = Designation::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id() ?? 1;

        $designation->update($data);

        return redirect()
            ->route('designations.index')
            ->with(
                'success',
                'Designation Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Designation::destroy($id);

        return redirect()
            ->route('designations.index')
            ->with(
                'success',
                'Designation Deleted Successfully'
            );
    }
}