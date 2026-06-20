<?php

namespace Backend\Modules\Finance\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Finance\Models\Expense;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $query = Expense::query();

        if($request->search)
        {
            $query->where(
                'expense_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $expenses = $query
            ->latest()
            ->paginate(10);

        return view(
            'expenses.index',
            compact('expenses')
        );
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'expense_no'=>'required|unique:expenses',
            'expense_title'=>'required',
            'amount'=>'required',
            'expense_date'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] =
            auth()->id() ?? 1;

        $data['updated_by'] =
            auth()->id() ?? 1;

        Expense::create($data);

        return redirect()
            ->route('expenses.index');
    }

    public function show($id)
    {
        $expense = Expense::findOrFail($id);

        return view(
            'expenses.show',
            compact('expense')
        );
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);

        return view(
            'expenses.edit',
            compact('expense')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $expense = Expense::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] =
            auth()->id() ?? 1;

        $expense->update($data);

        return redirect()
            ->route('expenses.index');
    }

    public function destroy($id)
    {
        Expense::destroy($id);

        return redirect()
            ->route('expenses.index');
    }
}