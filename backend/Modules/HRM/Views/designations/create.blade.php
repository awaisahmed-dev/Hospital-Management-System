@extends('layouts.backend')

@section('content')

<h2>Create Designation</h2>

<form method="POST"
action="{{ route('designations.store') }}">

@csrf

<div class="mb-3">

<label>Department</label>

<select name="department_id"
class="form-control">

<option value="">
Select Department
</option>

@foreach($departments as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Designation Name</label>

<input type="text"
name="designation_name"
class="form-control">

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
Save Designation
</button>

</form>

@endsection