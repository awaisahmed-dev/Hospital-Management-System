@extends('layouts.backend')

@section('content')

<h2>Create Permission</h2>

<form method="POST"
action="{{ route('permissions.store') }}">

@csrf

<div class="mb-3">

<label>Permission Name</label>

<input type="text"
name="permission_name"
class="form-control">

</div>

<div class="mb-3">

<label>Module Name</label>

<input type="text"
name="module_name"
class="form-control">

</div>

<div class="mb-3">

<label>Description</label>

<textarea
name="description"
class="form-control"></textarea>

</div>

<div class="mb-3">

<label>Status</label>

<select name="status"
class="form-control">

<option value="active">
Active
</option>

<option value="inactive">
Inactive
</option>

</select>

</div>

<button class="btn btn-success">
Save Permission
</button>

<a href="{{ route('permissions.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection