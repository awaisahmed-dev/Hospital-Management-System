@extends('layouts.backend')

@section('content')

<h2>Permission Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $permission->id }}</td>
</tr>

<tr>
<th>Permission Name</th>
<td>{{ $permission->permission_name }}</td>
</tr>

<tr>
<th>Module Name</th>
<td>{{ $permission->module_name }}</td>
</tr>

<tr>
<th>Description</th>
<td>{{ $permission->description }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $permission->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $permission->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $permission->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $permission->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $permission->updated_at }}</td>
</tr>

</table>

<a href="{{ route('permissions.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection