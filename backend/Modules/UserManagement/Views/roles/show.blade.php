@extends('layouts.backend')

@section('content')

<h2>Role Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $role->id }}</td>
</tr>

<tr>
<th>Role Name</th>
<td>{{ $role->role_name }}</td>
</tr>

<tr>
<th>Description</th>
<td>{{ $role->description }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $role->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $role->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $role->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $role->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $role->updated_at }}</td>
</tr>

</table>

<a href="{{ route('roles.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection