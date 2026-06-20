<?php

namespace Backend\Modules\Inventory\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Inventory\Models\StockOut;
use Backend\Modules\Inventory\Models\Product;

class StockOutController extends Controller
{
    public function index(Request $request)
    {
        $query = StockOut::with('product');

        if($request->search)
        {
            $query->where(
                'stockout_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $stockouts = $query
            ->latest()
            ->paginate(10);

        return view(
            'stockouts.index',
            compact('stockouts')
        );
    }

    public function create()
    {
        $products = Product::pluck(
            'product_name',
            'id'
        );

        return view(
            'stockouts.create',
            compact('products')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'stockout_no'=>'required|unique:stock_outs',
            'product_id'=>'required',
            'quantity'=>'required',
            'stockout_date'=>'required'

        ]);

        $product = Product::findOrFail(
            $request->product_id
        );

        if($product->stock_qty < $request->quantity)
        {
            return back()->with(
                'error',
                'Insufficient Stock'
            );
        }

        $data = $request->all();

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        StockOut::create($data);

        $product->decrement(
            'stock_qty',
            $request->quantity
        );

        return redirect()
            ->route('stockouts.index')
            ->with(
                'success',
                'Stock Out Created Successfully'
            );
    }

    public function show($id)
    {
        $stockout = StockOut::with(
            'product'
        )->findOrFail($id);

        return view(
            'stockouts.show',
            compact('stockout')
        );
    }

    public function edit($id)
    {
        $stockout = StockOut::findOrFail($id);

        $products = Product::pluck(
            'product_name',
            'id'
        );

        return view(
            'stockouts.edit',
            compact(
                'stockout',
                'products'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $stockout = StockOut::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] =
            auth()->id() ?? 1;

        $stockout->update($data);

        return redirect()
            ->route('stockouts.index')
            ->with(
                'success',
                'Stock Out Updated Successfully'
            );
    }

    public function destroy($id)
    {
        StockOut::destroy($id);

        return redirect()
            ->route('stockouts.index')
            ->with(
                'success',
                'Stock Out Deleted Successfully'
            );
    }
}