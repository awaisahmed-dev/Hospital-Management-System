<?php

namespace Backend\Modules\Inventory\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Inventory\Models\StockIn;
use Backend\Modules\Inventory\Models\Product;

class StockInController extends Controller
{
    public function index(Request $request)
    {
        $query = StockIn::with('product');

        if($request->search)
        {
            $query->where(
                'stockin_no',
                'like',
                '%'.$request->search.'%'
            );
        }

        $stockins = $query
            ->latest()
            ->paginate(10);

        return view(
            'stockins.index',
            compact('stockins')
        );
    }

    public function create()
    {
        $products = Product::pluck(
            'product_name',
            'id'
        );

        return view(
            'stockins.create',
            compact('products')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'stockin_no'=>'required|unique:stock_ins',
            'product_id'=>'required',
            'quantity'=>'required',
            'unit_price'=>'required',
            'stockin_date'=>'required'

        ]);

        $data = $request->all();

        $data['total_amount'] =
            $request->quantity *
            $request->unit_price;

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        StockIn::create($data);

        Product::where(
            'id',
            $request->product_id
        )->increment(
            'stock_qty',
            $request->quantity
        );

        return redirect()
            ->route('stockins.index')
            ->with(
                'success',
                'Stock In Created Successfully'
            );
    }

    public function show($id)
    {
        $stockin = StockIn::with(
            'product'
        )->findOrFail($id);

        return view(
            'stockins.show',
            compact('stockin')
        );
    }

    public function edit($id)
    {
        $stockin = StockIn::findOrFail($id);

        $products = Product::pluck(
            'product_name',
            'id'
        );

        return view(
            'stockins.edit',
            compact(
                'stockin',
                'products'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $stockin = StockIn::findOrFail($id);

        $data = $request->all();

        $data['total_amount'] =
            $request->quantity *
            $request->unit_price;

        $data['updated_by'] =
            auth()->id() ?? 1;

        $stockin->update($data);

        return redirect()
            ->route('stockins.index')
            ->with(
                'success',
                'Stock In Updated Successfully'
            );
    }

    public function destroy($id)
    {
        StockIn::destroy($id);

        return redirect()
            ->route('stockins.index')
            ->with(
                'success',
                'Stock In Deleted Successfully'
            );
    }
}