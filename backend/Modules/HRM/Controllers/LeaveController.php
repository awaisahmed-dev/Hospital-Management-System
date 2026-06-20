<?php

namespace Backend\Modules\HRM\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\HRM\Models\Leave;
use Backend\Modules\HRM\Models\Employee;

class LeaveController extends Controller
{
    public function index(Request $request)
    {
        $query = Leave::with('employee');

        if($request->search)
        {
            $query->where(
                'leave_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $leaves = $query
            ->latest()
            ->paginate(10);

        return view(
            'leaves.index',
            compact('leaves')
        );
    }

    public function create()
    {
        $employees = Employee::pluck(
            'first_name',
            'id'
        );

        return view(
            'leaves.create',
            compact('employees')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_no'=>'required|unique:leaves',
            'employee_id'=>'required'
        ]);

        $data = $request->all();

        $data['created_by'] =
            auth()->id() ?? 1;

        $data['updated_by'] =
            auth()->id() ?? 1;

        Leave::create($data);

        return redirect()
            ->route('leaves.index')
            ->with(
                'success',
                'Leave Created Successfully'
            );
    }

    public function show($id)
    {
        $leave = Leave::with(
            'employee'
        )->findOrFail($id);

        return view(
            'leaves.show',
            compact('leave')
        );
    }

    public function edit($id)
    {
        $leave = Leave::findOrFail($id);

        $employees = Employee::pluck(
            'first_name',
            'id'
        );

        return view(
            'leaves.edit',
            compact(
                'leave',
                'employees'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $leave = Leave::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] =
            auth()->id() ?? 1;

        $leave->update($data);

        return redirect()
            ->route('leaves.index')
            ->with(
                'success',
                'Leave Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Leave::destroy($id);

        return redirect()
            ->route('leaves.index')
            ->with(
                'success',
                'Leave Deleted Successfully'
            );
    }
}