@extends('layouts.backend')

@section('content')

<h2>Create Staff</h2>

<form method="POST" action="{{ route('staff.store') }}">
@csrf

<div class="row">

<div class="col-md-4">
<label>Employee No</label>
<input type="text" name="employee_no" class="form-control">
</div>

<div class="col-md-4">
<label>First Name</label>
<input type="text" name="first_name" class="form-control">
</div>

<div class="col-md-4">
<label>Last Name</label>
<input type="text" name="last_name" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Gender</label>
<select name="gender" class="form-control">
<option value="male">Male</option>
<option value="female">Female</option>
<option value="other">Other</option>
</select>
</div>

<div class="col-md-4 mt-3">
<label>DOB</label>
<input type="date" name="dob" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>CNIC</label>
<input type="text" name="cnic" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Designation</label>
<input type="text" name="designation" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Department ID</label>
<input type="number" name="department_id" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Salary</label>
<input type="number" step="0.01" name="salary" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Joining Date</label>
<input type="date" name="joining_date" class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Address</label>
<textarea name="address" class="form-control"></textarea>
</div>

<div class="col-md-4 mt-3">
<label>City</label>
<input type="text" name="city" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Emergency Contact</label>
<input type="text" name="emergency_contact" class="form-control">
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
Save Staff
</button>

</form>

@endsection