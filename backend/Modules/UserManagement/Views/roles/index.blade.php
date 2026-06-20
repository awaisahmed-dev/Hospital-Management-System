@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Roles</h2>

<a href="{{ route('roles.create') }}"
class="btn btn-success">

Add Role

</a>

</div>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>Role Name</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($roles as $role)

<tr>

<td>{{ $role->id }}</td>

<td>{{ $role->role_name }}</td>

<td>{{ $role->status }}</td>

<td>

<a href="{{ route('roles.show',$role->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('roles.edit',$role->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('roles.destroy',$role->id) }}"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $roles->links() }}

@endsection