<?php

namespace Backend\Modules\UserManagement\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\UserManagement\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->paginate(10);

        return view(
            'roles.index',
            compact('roles')
        );
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name'=>'required'
        ]);

        Role::create([

            'role_name'=>$request->role_name,
            'description'=>$request->description,
            'status'=>$request->status,

            'created_by'=>auth()->id() ?? 1,
            'updated_by'=>auth()->id() ?? 1
        ]);

        return redirect()
            ->route('roles.index');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view(
            'roles.show',
            compact('role')
        );
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view(
            'roles.edit',
            compact('role')
        );
    }

    public function update(Request $request,$id)
    {
        $role = Role::findOrFail($id);

        $role->update([

            'role_name'=>$request->role_name,
            'description'=>$request->description,
            'status'=>$request->status,
            'updated_by'=>auth()->id() ?? 1
        ]);

        return redirect()
            ->route('roles.index');
    }

    public function destroy($id)
    {
        Role::destroy($id);

        return redirect()
            ->route('roles.index');
    }
}