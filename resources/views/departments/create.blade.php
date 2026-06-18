@extends('layouts.backend')

@section('content')

<h2>Create Department</h2>

<form method="POST" action="{{ route('departments.store') }}">
@csrf

<div class="row">

<div class="col-md-4">
<label>Department Code</label>
<input type="number" name="department_code" class="form-control">
</div>

<div class="col-md-4">
<label>Name</label>
<input type="text" name="name" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Head Of Department</label>
<input type="text" name="head_of_department" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="col-md-2 mt-3">
<label>location</label>
<input type="text" name="location" class="form-control">
</div>

<div class="col-md-2 mt-3">
<label>Capacity</label>
<input type="number" name="capacity" class="form-control">
</div>

<div class="col-md-6 mt-3">
<label>Description</label>
<textarea name="description" class="form-control"></textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>
<select name="status" class="form-control">
<option value="active">Active</option>
<option value="inactive">Inactive</option>
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