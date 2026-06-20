<?php

namespace Backend\Modules\Finance\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Finance\Models\Payroll;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $query = Payroll::query();

        if($request->search)
        {
            $query->where(
                'payroll_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $payrolls = $query
            ->latest()
            ->paginate(10);

        return view(
            'payroll.index',
            compact('payrolls')
        );
    }

    public function create()
    {
        return view('payroll.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'payroll_no'=>'required|unique:payrolls',
            'employee_name'=>'required',
            'salary'=>'required',
            'payroll_date'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        Payroll::create($data);

        return redirect()
            ->route('payrolls.index');
    }

    public function show($id)
    {
        $payroll = Payroll::findOrFail($id);

        return view(
            'payroll.show',
            compact('payroll')
        );
    }

    public function edit($id)
    {
        $payroll = Payroll::findOrFail($id);

        return view(
            'payroll.edit',
            compact('payroll')
        );
    }

    public function update(Request $request,$id)
    {
        $payroll = Payroll::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id() ?? 1;

        $payroll->update($data);

        return redirect()
            ->route('payrolls.index');
    }

    public function destroy($id)
    {
        Payroll::destroy($id);

        return redirect()
            ->route('payrolls.index');
    }
}