@extends('layouts.backend')

@section('content')

<h2>Create Employee</h2>

<form method="POST"
action="{{ route('employees.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Employee Code</label>
<input type="text"
name="employee_code"
class="form-control">
</div>

<div class="col-md-4">
<label>First Name</label>
<input type="text"
name="first_name"
class="form-control">
</div>

<div class="col-md-4">
<label>Last Name</label>
<input type="text"
name="last_name"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Email</label>
<input type="email"
name="email"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Phone</label>
<input type="text"
name="phone"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Department</label>

<select name="department_id"
class="form-control">

<option value="">Select</option>

@foreach($departments as $id=>$name)
<option value="{{ $id }}">
{{ $name }}
</option>
@endforeach

</select>

</div>

<div class="col-md-4 mt-3">
<label>Designation</label>

<select name="designation_id"
class="form-control">

<option value="">Select</option>

@foreach($designations as $id=>$name)
<option value="{{ $id }}">
{{ $name }}
</option>
@endforeach

</select>

</div>

<div class="col-md-4 mt-3">
<label>Salary</label>
<input type="number"
step="0.01"
name="salary"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Joining Date</label>
<input type="date"
name="joining_date"
class="form-control">
</div>

<div class="col-md-4 mt-3">
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

</div>

<br>

<button class="btn btn-success">
Save Employee
</button>

<a href="{{ route('employees.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection