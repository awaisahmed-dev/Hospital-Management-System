<?php

namespace Backend\Modules\HRM\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\HRM\Models\HrmDepartment;

class HrmDepartmentController extends Controller
{
    public function index(Request $request)
    {
        $query = HrmDepartment::query();

        if($request->search)
        {
            $query->where(
                'department_name',
                'like',
                '%'.$request->search.'%'
            );
        }

        $departments = $query
            ->latest()
            ->paginate(10);

        return view(
            'hrmdepartments.index',
            compact('departments')
        );
    }

    public function create()
    {
        return view(
            'hrmdepartments.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'department_name'=>'required'
        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        HrmDepartment::create($data);

        return redirect()
            ->route('hrmdepartments.index')
            ->with(
                'success',
                'Department Created Successfully'
            );
    }

    public function show($id)
    {
        $department = HrmDepartment::findOrFail($id);

        return view(
            'hrmdepartments.show',
            compact('department')
        );
    }

    public function edit($id)
    {
        $department = HrmDepartment::findOrFail($id);

        return view(
            'hrmdepartments.edit',
            compact('department')
        );
    }

    public function update(Request $request,$id)
    {
        $department = HrmDepartment::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id() ?? 1;

        $department->update($data);

        return redirect()
            ->route('hrmdepartments.index')
            ->with(
                'success',
                'Department Updated Successfully'
            );
    }

    public function destroy($id)
    {
        HrmDepartment::destroy($id);

        return redirect()
            ->route('hrmdepartments.index')
            ->with(
                'success',
                'Department Deleted Successfully'
            );
    }
}