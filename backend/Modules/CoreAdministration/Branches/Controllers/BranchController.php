<?php

namespace Backend\Modules\CoreAdministration\Branches\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\CoreAdministration\Branches\Models\Branch;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        $query = Branch::query();

        if($request->search)
        {
            $query->where('branch_code','like','%'.$request->search.'%')
                  ->orWhere('name','like','%'.$request->search.'%')
                  ->orWhere('phone','like','%'.$request->search.'%');
        }

        $branches = $query->latest()->paginate(10);

        return view('branches.index',compact('branches'));
    }

    public function create()
    {
        return view('branches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_code'=>'required|unique:branches',
            'name'=>'required',
        ]);

        $data = $request->all();

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        Branch::create($data);

        return redirect()
            ->route('branches.index')
            ->with('success','Branch Created Successfully');
    }

    public function show($id)
    {
        $branch = Branch::findOrFail($id);

        return view('branches.show',compact('branch'));
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);

        return view('branches.edit',compact('branch'));
    }

    public function update(Request $request,$id)
    {
        $branch = Branch::findOrFail($id);

        $request->validate([
            'branch_code'=>'required',
            'name'=>'required',
        ]);

        $data = $request->all();

        $data['updated_by'] = auth()->id();

        $branch->update($data);

        return redirect()
            ->route('branches.index')
            ->with('success','Branch Updated Successfully');
    }

    public function destroy($id)
    {
        Branch::destroy($id);

        return redirect()
            ->route('branches.index')
            ->with('success','Branch Deleted Successfully');
    }
}