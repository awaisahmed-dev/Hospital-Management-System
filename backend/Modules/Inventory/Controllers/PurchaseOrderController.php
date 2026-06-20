<?php

namespace Backend\Modules\Inventory\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Inventory\Models\PurchaseOrder;
use Backend\Modules\Inventory\Models\Supplier;

class PurchaseOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = PurchaseOrder::with('supplier');

        if($request->search)
        {
            $query->where(
                'po_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $purchaseorders = $query
            ->latest()
            ->paginate(10);

        return view(
            'purchaseorders.index',
            compact('purchaseorders')
        );
    }

    public function create()
    {
        $suppliers = Supplier::pluck(
            'supplier_name',
            'id'
        );

        return view(
            'purchaseorders.create',
            compact('suppliers')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'po_no'=>'required|unique:purchase_orders',
            'supplier_id'=>'required',
            'po_date'=>'required',
            'total_amount'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        PurchaseOrder::create($data);

        return redirect()
            ->route('purchaseorders.index')
            ->with(
                'success',
                'Purchase Order Created Successfully'
            );
    }

    public function show($id)
    {
        $purchaseorder = PurchaseOrder::with(
            'supplier'
        )->findOrFail($id);

        return view(
            'purchaseorders.show',
            compact('purchaseorder')
        );
    }

    public function edit($id)
    {
        $purchaseorder = PurchaseOrder::findOrFail($id);

        $suppliers = Supplier::pluck(
            'supplier_name',
            'id'
        );

        return view(
            'purchaseorders.edit',
            compact(
                'purchaseorder',
                'suppliers'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $purchaseorder =
            PurchaseOrder::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] =
            auth()->id() ?? 1;

        $purchaseorder->update($data);

        return redirect()
            ->route('purchaseorders.index')
            ->with(
                'success',
                'Purchase Order Updated Successfully'
            );
    }

    public function destroy($id)
    {
        PurchaseOrder::destroy($id);

        return redirect()
            ->route('purchaseorders.index')
            ->with(
                'success',
                'Purchase Order Deleted Successfully'
            );
    }
}