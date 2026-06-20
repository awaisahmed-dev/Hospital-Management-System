@extends('layouts.backend')

@section('content')

<h2>Edit HRM Department</h2>

<form method="POST"
action="{{ route('hrmdepartments.update',$department->id) }}">

@csrf
@method('PUT')

<div class="mb-3">

<label>Department Name</label>

<input type="text"
name="department_name"
class="form-control"
value="{{ $department->department_name }}">

</div>

<div class="mb-3">

<label>Description</label>

<textarea name="description"
class="form-control">{{ $department->description }}</textarea>

</div>

<div class="mb-3">

<label>Status</label>

<select name="status"
class="form-control">

<option value="active"
{{ $department->status=='active'?'selected':'' }}>
Active
</option>

<option value="inactive"
{{ $department->status=='inactive'?'selected':'' }}>
Inactive
</option>

</select>

</div>

<button class="btn btn-success">
Update Department
</button>

<a href="{{ route('hrmdepartments.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection