<?php

namespace Backend\Modules\UserManagement\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\UserManagement\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()
            ->paginate(10);

        return view(
            'permissions.index',
            compact('permissions')
        );
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        Permission::create([

            'permission_name'=>$request->permission_name,
            'description'=>$request->description,
            'module_name'=>$request->module_name,
            'status'=>$request->status,

            'created_by'=>auth()->id() ?? 1,
            'updated_by'=>auth()->id() ?? 1
        ]);

        return redirect()
            ->route('permissions.index');
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return view(
            'permissions.show',
            compact('permission')
        );
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view(
            'permissions.edit',
            compact('permission')
        );
    }

    public function update(Request $request,$id)
    {
        $permission = Permission::findOrFail($id);

        $permission->update([

            'permission_name'=>$request->permission_name,
            'description'=>$request->description,
            'module_name'=>$request->module_name,
            'status'=>$request->status,

            'updated_by'=>auth()->id() ?? 1
        ]);

        return redirect()
            ->route('permissions.index');
    }

    public function destroy($id)
    {
        Permission::destroy($id);

        return redirect()
            ->route('permissions.index');
    }
}