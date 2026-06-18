@extends('layouts.backend')

@section('content')

<h2>Edit Staff</h2>

<form method="POST"
action="{{ route('staff.update',$staff->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Employee No</label>
<input type="text"
name="employee_no"
class="form-control"
value="{{ $staff->employee_no }}">
</div>

<div class="col-md-4">
<label>First Name</label>
<input type="text"
name="first_name"
class="form-control"
value="{{ $staff->first_name }}">
</div>

<div class="col-md-4">
<label>Last Name</label>
<input type="text"
name="last_name"
class="form-control"
value="{{ $staff->last_name }}">
</div>

<div class="col-md-4 mt-3">
<label>Gender</label>

<select name="gender" class="form-control">

<option value="male"
{{ $staff->gender=='male'?'selected':'' }}>
Male
</option>

<option value="female"
{{ $staff->gender=='female'?'selected':'' }}>
Female
</option>

<option value="other"
{{ $staff->gender=='other'?'selected':'' }}>
Other
</option>

</select>

</div>

<div class="col-md-4 mt-3">
<label>Phone</label>
<input type="text"
name="phone"
class="form-control"
value="{{ $staff->phone }}">
</div>

<div class="col-md-4 mt-3">
<label>Email</label>
<input type="email"
name="email"
class="form-control"
value="{{ $staff->email }}">
</div>

<div class="col-md-4 mt-3">
<label>Designation</label>
<input type="text"
name="designation"
class="form-control"
value="{{ $staff->designation }}">
</div>

<div class="col-md-4 mt-3">
<label>Department ID</label>
<input type="number"
name="department_id"
class="form-control"
value="{{ $staff->department_id }}">
</div>

<div class="col-md-4 mt-3">
<label>Salary</label>
<input type="number"
name="salary"
class="form-control"
value="{{ $staff->salary }}">
</div>

<div class="col-md-12 mt-3">
<label>Address</label>
<textarea
name="address"
class="form-control">{{ $staff->address }}</textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status" class="form-control">

<option value="active"
{{ $staff->status=='active'?'selected':'' }}>
Active
</option>

<option value="inactive"
{{ $staff->status=='inactive'?'selected':'' }}>
Inactive
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Update Staff
</button>

<a href="{{ route('staff.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection