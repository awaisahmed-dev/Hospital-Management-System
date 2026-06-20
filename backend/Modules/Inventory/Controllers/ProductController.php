<?php

namespace Backend\Modules\Inventory\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Inventory\Models\Product;
use Backend\Modules\Inventory\Models\Category;
use Backend\Modules\Inventory\Models\Supplier;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with([
            'category',
            'supplier'
        ]);

        if($request->search)
        {
            $query->where(
                'product_name',
                'like',
                '%'.$request->search.'%'
            );
        }

        $products = $query
            ->latest()
            ->paginate(10);

        return view(
            'products.index',
            compact('products')
        );
    }

    public function create()
    {
        $categories = Category::pluck(
            'category_name',
            'id'
        );

        $suppliers = Supplier::pluck(
            'supplier_name',
            'id'
        );

        return view(
            'products.create',
            compact(
                'categories',
                'suppliers'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'product_code'=>'required|unique:products',
            'category_id'=>'required',
            'supplier_id'=>'required',
            'product_name'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        Product::create($data);

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Product Created Successfully'
            );
    }

    public function show($id)
    {
        $product = Product::with([
            'category',
            'supplier'
        ])->findOrFail($id);

        return view(
            'products.show',
            compact('product')
        );
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $categories = Category::pluck(
            'category_name',
            'id'
        );

        $suppliers = Supplier::pluck(
            'supplier_name',
            'id'
        );

        return view(
            'products.edit',
            compact(
                'product',
                'categories',
                'suppliers'
            )
        );
    }

    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id() ?? 1;

        $product->update($data);

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Product Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Product Deleted Successfully'
            );
    }
}