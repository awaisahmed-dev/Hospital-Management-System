<?php

namespace Backend\Modules\HRM\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\HRM\Models\Attendance;
use Backend\Modules\HRM\Models\Employee;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $query = Attendance::with('employee');

        if($request->search)
        {
            $query->whereHas('employee',function($q) use ($request){

                $q->where(
                    'first_name',
                    'like',
                    '%'.$request->search.'%'
                );

            });
        }

        $attendances = $query
            ->latest()
            ->paginate(10);

        return view(
            'attendances.index',
            compact('attendances')
        );
    }

    public function create()
    {
        $employees = Employee::pluck(
            'first_name',
            'id'
        );

        return view(
            'attendances.create',
            compact('employees')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'employee_id'=>'required',
            'attendance_date'=>'required'
        ]);

        $data = $request->all();

        $data['created_by'] =
            auth()->id() ?? 1;

        $data['updated_by'] =
            auth()->id() ?? 1;

        Attendance::create($data);

        return redirect()
            ->route('attendances.index')
            ->with(
                'success',
                'Attendance Created Successfully'
            );
    }

    public function show($id)
    {
        $attendance = Attendance::with(
            'employee'
        )->findOrFail($id);

        return view(
            'attendances.show',
            compact('attendance')
        );
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);

        $employees = Employee::pluck(
            'first_name',
            'id'
        );

        return view(
            'attendances.edit',
            compact(
                'attendance',
                'employees'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $attendance = Attendance::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] =
            auth()->id() ?? 1;

        $attendance->update($data);

        return redirect()
            ->route('attendances.index')
            ->with(
                'success',
                'Attendance Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Attendance::destroy($id);

        return redirect()
            ->route('attendances.index')
            ->with(
                'success',
                'Attendance Deleted Successfully'
            );
    }
}