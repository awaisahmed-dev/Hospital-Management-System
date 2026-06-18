@extends('layouts.backend')

@section('content')

<h2>Create Doctor</h2>

<form method="POST"
action="{{ route('doctors.store') }}">

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
<label>Middle Name</label>
<input type="text" name="middle_name" class="form-control">
</div>

<div class="col-md-4 mt-3">
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
<label>Alternate Phone</label>
<input type="text" name="alternate_phone" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Medical License</label>
<input type="text" name="medical_license_no" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Qualification</label>
<input type="text" name="qualification" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Experience Years</label>
<input type="number" name="experience_years" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Joining Date</label>
<input type="date" name="joining_date" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Consultation Fee</label>
<input type="number" name="consultation_fee" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Salary</label>
<input type="number" name="salary" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Blood Group</label>
<input type="text" name="blood_group" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>City</label>
<input type="text" name="city" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Country</label>
<input type="text" name="country" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Emergency Contact</label>
<input type="text" name="emergency_contact" class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Address</label>
<textarea name="address" class="form-control"></textarea>
</div>

<div class="col-md-12 mt-3">
<label>Notes</label>
<textarea name="notes" class="form-control"></textarea>
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

Save Doctor

</button>

</form>

@endsection