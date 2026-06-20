@extends('layouts.backend')

@section('content')

<h2>Edit Permission</h2>

<form method="POST"
action="{{ route('permissions.update',$permission->id) }}">

@csrf
@method('PUT')

<div class="mb-3">

<label>Permission Name</label>

<input type="text"
name="permission_name"
value="{{ $permission->permission_name }}"
class="form-control">

</div>

<div class="mb-3">

<label>Module Name</label>

<input type="text"
name="module_name"
value="{{ $permission->module_name }}"
class="form-control">

</div>

<div class="mb-3">

<label>Description</label>

<textarea
name="description"
class="form-control">{{ $permission->description }}</textarea>

</div>

<div class="mb-3">

<label>Status</label>

<select name="status"
class="form-control">

<option value="active"
{{ $permission->status=='active' ? 'selected' : '' }}>
Active
</option>

<option value="inactive"
{{ $permission->status=='inactive' ? 'selected' : '' }}>
Inactive
</option>

</select>

</div>

<button class="btn btn-success">
Update Permission
</button>

<a href="{{ route('permissions.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection