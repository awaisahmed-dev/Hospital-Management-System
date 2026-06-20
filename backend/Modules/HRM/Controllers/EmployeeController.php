<?php

namespace Backend\Modules\HRM\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\HRM\Models\Employee;
use Backend\Modules\HRM\Models\Designation;

use Backend\Modules\CoreAdministration\Departments\Models\Department;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::with([
            'department',
            'designation'
        ]);

        if($request->search)
        {
            $query->where(
                'employee_code',
                'like',
                '%'.$request->search.'%'
            )
            ->orWhere(
                'first_name',
                'like',
                '%'.$request->search.'%'
            );
        }

        $employees = $query
            ->latest()
            ->paginate(10);

        return view(
            'employees.index',
            compact('employees')
        );
    }

    public function create()
    {
        $departments = Department::pluck(
            'name',
            'id'
        );

        $designations = Designation::pluck(
            'designation_name',
            'id'
        );

        return view(
            'employees.create',
            compact(
                'departments',
                'designations'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'employee_code'=>'required|unique:employees',
            'first_name'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        Employee::create($data);

        return redirect()
            ->route('employees.index')
            ->with(
                'success',
                'Employee Created Successfully'
            );
    }

    public function show($id)
    {
        $employee = Employee::with([
            'department',
            'designation'
        ])->findOrFail($id);

        return view(
            'employees.show',
            compact('employee')
        );
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        $departments = Department::pluck(
            'department_name',
            'id'
        );

        $designations = Designation::pluck(
            'designation_name',
            'id'
        );

        return view(
            'employees.edit',
            compact(
                'employee',
                'departments',
                'designations'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $employee = Employee::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id() ?? 1;

        $employee->update($data);

        return redirect()
            ->route('employees.index')
            ->with(
                'success',
                'Employee Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Employee::destroy($id);

        return redirect()
            ->route('employees.index')
            ->with(
                'success',
                'Employee Deleted Successfully'
            );
    }
}