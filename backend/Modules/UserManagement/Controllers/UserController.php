<?php

namespace Backend\Modules\UserManagement\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Backend\Modules\UserManagement\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if($request->search)
        {
            $query->where(
                'name',
                'like',
                '%'.$request->search.'%'
            )
            ->orWhere(
                'email',
                'like',
                '%'.$request->search.'%'
            );
        }

        $users = $query
            ->latest()
            ->paginate(10);

        return view(
            'users.index',
            compact('users')
        );
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',
            'email'=>'required|unique:user',
            'password'=>'required'

        ]);

        User::create([

            'name'=>$request->name,

            'email'=>$request->email,

            'password'=>bcrypt(
                $request->password
            ),

            'status'=>$request->status,

            'created_by'=>auth()->id() ?? 1,

            'updated_by'=>auth()->id() ?? 1
        ]);

        return redirect()
            ->route('user.index')
            ->with(
                'success',
                'User Created Successfully'
            );
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view(
            'users.show',
            compact('user')
        );
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view(
            'users.edit',
            compact('user')
        );
    }

    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);

        $data = [

            'name'=>$request->name,
            'email'=>$request->email,
            'status'=>$request->status,
            'updated_by'=>auth()->id() ?? 1
        ];

        if($request->password)
        {
            $data['password'] =
                bcrypt($request->password);
        }

        $user->update($data);

        return redirect()
            ->route('user.index')
            ->with(
                'success',
                'User Updated Successfully'
            );
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()
            ->route('user.index')
            ->with(
                'success',
                'User Deleted Successfully'
            );
    }
}