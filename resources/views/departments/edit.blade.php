@extends('layouts.backend')

@section('content')

<h2>Create Department</h2>

<form method="POST" action="{{ route('departments.update',$department->id) }}">
@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Department Code</label>
<input type="number" name="department_code" class="form-control" value="{{ $department->department_code }}">
</div>

<div class="col-md-4">
<label>Name</label>
<input type="text" name="name" class="form-control" value="{{ $department->name }}">
</div>

<div class="col-md-4 mt-3">
<label>Head Of Department</label>
<input type="text" name="head_of_department" class="form-control" value="{{ $department->head_of_department }}">
</div>

<div class="col-md-4 mt-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control" value="{{ $department->phone }}">
</div>

<div class="col-md-4 mt-3">
<label>Email</label>
<input type="email" name="email" class="form-control" value="{{ $department->email }}">
</div>

<div class="col-md-2 mt-3">
<label>location</label>
<input type="text" name="location" class="form-control" value="{{ $department->location }}">
</div>

<div class="col-md-2 mt-3">
<label>Capacity</label>
<input type="number" name="capacity" class="form-control" value="{{ $department->capacity }}">
</div>

<div class="col-md-6 mt-3">
<label>Description</label>
<textarea name="description" class="form-control">{{ $department->description }}</textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>
<select name="status" class="form-control">

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

</div>

<br>

<button class="btn btn-success">
Save Department
</button>

<a href="{{ route('departments.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection