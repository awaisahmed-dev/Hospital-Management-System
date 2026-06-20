@extends('layouts.backend')

@section('content')

<h2>Create HRM Department</h2>

<form method="POST"
action="{{ route('hrmdepartments.store') }}">

@csrf

<div class="mb-3">

<label>Department Name</label>

<input type="text"
name="department_name"
class="form-control">

</div>

<div class="mb-3">

<label>Description</label>

<textarea name="description"
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
Save Department
</button>

<a href="{{ route('hrmdepartments.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection