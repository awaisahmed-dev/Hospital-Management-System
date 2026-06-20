@extends('layouts.backend')

@section('content')

<h2>Edit Role</h2>

<form method="POST"
action="{{ route('roles.update',$role->id) }}">

@csrf
@method('PUT')

<div class="mb-3">

<label>Role Name</label>

<input type="text"
name="role_name"
value="{{ $role->role_name }}"
class="form-control">

</div>

<div class="mb-3">

<label>Description</label>

<textarea
name="description"
class="form-control">{{ $role->description }}</textarea>

</div>

<div class="mb-3">

<label>Status</label>

<select name="status"
class="form-control">

<option value="active"
{{ $role->status=='active' ? 'selected' : '' }}>
Active
</option>

<option value="inactive"
{{ $role->status=='inactive' ? 'selected' : '' }}>
Inactive
</option>

</select>

</div>

<button class="btn btn-success">
Update Role
</button>

<a href="{{ route('roles.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection