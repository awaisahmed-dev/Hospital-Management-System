<?php

namespace Backend\Modules\Inventory\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Inventory\Models\Supplier;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $query = Supplier::query();

        if($request->search)
        {
            $query->where(
                'supplier_name',
                'like',
                '%'.$request->search.'%'
            );
        }

        $suppliers = $query
            ->latest()
            ->paginate(10);

        return view(
            'suppliers.index',
            compact('suppliers')
        );
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_code'=>'required|unique:suppliers',
            'supplier_name'=>'required'
        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        Supplier::create($data);

        return redirect()
            ->route('suppliers.index')
            ->with('success','Supplier Created Successfully');
    }

    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view(
            'suppliers.show',
            compact('supplier')
        );
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view(
            'suppliers.edit',
            compact('supplier')
        );
    }

    public function update(Request $request,$id)
    {
        $supplier = Supplier::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id() ?? 1;

        $supplier->update($data);

        return redirect()
            ->route('suppliers.index')
            ->with('success','Supplier Updated Successfully');
    }

    public function destroy($id)
    {
        Supplier::destroy($id);

        return redirect()
            ->route('suppliers.index')
            ->with('success','Supplier Deleted Successfully');
    }
}