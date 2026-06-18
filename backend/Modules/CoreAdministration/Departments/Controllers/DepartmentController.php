<?php

namespace Backend\Modules\CoreAdministration\Departments\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\CoreAdministration\Departments\Models\Department;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Department::query();

        if($request->search)
        {
            $query->where('department_code','like','%'.$request->search.'%')
                ->orWhere('name','like','%'.$request->search.'%')
                ->orWhere('phone','like','%'.$request->search.'%');
        }

        $departments = $query
            ->latest()
            ->paginate(10);

        return view(
            'departments.index',
            compact('departments')
        );
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'department_code'=>'required|unique:departments',
            'name'=>'required',

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Department::create($data);

        return redirect()
            ->route('departments.index')
            ->with('success','Department Created Successfully');
    }

    public function show($id)
    {
        $department = Department::findOrFail($id);

        return view(
            'departments.show',
            compact('department')
        );
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view(
            'departments.edit',
            compact('department')
        );
    }

    public function update(Request $request,$id)
    {
        $department = Department::findOrFail($id);

        $request->validate([

            'department_code'=>'required',
            'name'=>'required',

        ]);

        $data = $request->all();

        $data['updated_by'] = auth()->id();

        $department->update($data);

        return redirect()
            ->route('departments.index')
            ->with('success','Department Updated Successfully');
    }

    public function destroy($id)
    {
        Department::destroy($id);

        return redirect()
            ->route('departments.index')
            ->with('success','Department Deleted Successfully');
    }
}