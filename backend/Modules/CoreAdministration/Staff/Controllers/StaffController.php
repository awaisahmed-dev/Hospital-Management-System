<?php

namespace Backend\Modules\CoreAdministration\Staff\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Backend\Modules\CoreAdministration\Staff\Models\Staff;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $query = Staff::query();

        if($request->search)
        {
            $query->where('employee_no','like','%'.$request->search.'%')
                  ->orWhere('first_name','like','%'.$request->search.'%')
                  ->orWhere('last_name','like','%'.$request->search.'%')
                  ->orWhere('phone','like','%'.$request->search.'%');
        }

        $staff = $query->latest()->paginate(10);

        return view('staff.index',compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_no'=>'required|unique:staff',
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'designation'=>'required',
        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Staff::create($data);

        return redirect()
            ->route('staff.index')
            ->with('success','Staff Created Successfully');
    }

    public function show($id)
    {
        $staff = Staff::findOrFail($id);

        return view('staff.show',compact('staff'));
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);

        return view('staff.edit',compact('staff'));
    }

    public function update(Request $request,$id)
    {
        $staff = Staff::findOrFail($id);

        $request->validate([
            'employee_no'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
        ]);

        $data = $request->all();
        $data['updated_by'] = auth()->id();

        $staff->update($data);

        return redirect()
            ->route('staff.index')
            ->with('success','Staff Updated Successfully');
    }

    public function destroy($id)
    {
        Staff::destroy($id);

        return redirect()
            ->route('staff.index')
            ->with('success','Staff Deleted Successfully');
    }
}