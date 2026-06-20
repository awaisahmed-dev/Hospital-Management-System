<?php

namespace Backend\Modules\Inventory\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\Inventory\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();

        if($request->search)
        {
            $query->where(
                'category_name',
                'like',
                '%'.$request->search.'%'
            );
        }

        $categories = $query
            ->latest()
            ->paginate(10);

        return view(
            'categories.index',
            compact('categories')
        );
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'category_name'=>'required'

        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id() ?? 1;
        $data['updated_by'] = auth()->id() ?? 1;

        Category::create($data);

        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Category Created Successfully'
            );
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view(
            'categories.show',
            compact('category')
        );
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view(
            'categories.edit',
            compact('category')
        );
    }

    public function update(Request $request,$id)
    {
        $category = Category::findOrFail($id);

        $data = $request->all();

        $data['updated_by'] = auth()->id() ?? 1;

        $category->update($data);

        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Category Updated Successfully'
            );
    }

    public function destroy($id)
    {
        Category::destroy($id);

        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Category Deleted Successfully'
            );
    }
}