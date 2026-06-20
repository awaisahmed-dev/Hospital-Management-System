@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Permissions</h2>

<a href="{{ route('permissions.create') }}"
class="btn btn-success">

Add Permission

</a>

</div>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>Permission Name</th>
<th>Module</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($permissions as $permission)

<tr>

<td>{{ $permission->id }}</td>

<td>{{ $permission->permission_name }}</td>

<td>{{ $permission->module_name }}</td>

<td>{{ $permission->status }}</td>

<td>

<a href="{{ route('permissions.show',$permission->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('permissions.edit',$permission->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('permissions.destroy',$permission->id) }}"
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

{{ $permissions->links() }}

@endsection