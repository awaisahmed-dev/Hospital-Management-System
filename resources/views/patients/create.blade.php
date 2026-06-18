@extends('layouts.backend')

@section('content')

<h2>Create Patient</h2>

<form method="POST" action="{{ route('patients.store') }}">
@csrf

<div class="row">

<div class="col-md-4">
<label>MR No</label>
<input type="text" name="mr_no" class="form-control">
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
<label>Passport No</label>
<input type="text" name="passport_no" class="form-control">
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
<label>Blood Group</label>
<input type="text" name="blood_group" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Marital Status</label>
<select name="marital_status" class="form-control">
<option value="">Select</option>
<option value="single">Single</option>
<option value="married">Married</option>
<option value="divorced">Divorced</option>
<option value="widowed">Widowed</option>
</select>
</div>

<div class="col-md-4 mt-3">
<label>Occupation</label>
<input type="text" name="occupation" class="form-control">
</div>

<div class="col-md-6 mt-3">
<label>Address</label>
<textarea name="address" class="form-control"></textarea>
</div>

<div class="col-md-2 mt-3">
<label>City</label>
<input type="text" name="city" class="form-control">
</div>

<div class="col-md-2 mt-3">
<label>Province</label>
<input type="text" name="province" class="form-control">
</div>

<div class="col-md-2 mt-3">
<label>Country</label>
<input type="text" name="country" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Guardian Name</label>
<input type="text" name="guardian_name" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Guardian Phone</label>
<input type="text" name="guardian_phone" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Emergency Contact</label>
<input type="text" name="emergency_contact" class="form-control">
</div>

<div class="col-md-6 mt-3">
<label>Insurance Company</label>
<input type="text" name="insurance_company" class="form-control">
</div>

<div class="col-md-6 mt-3">
<label>Insurance Number</label>
<input type="text" name="insurance_number" class="form-control">
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
Save Patient
</button>

<a href="{{ route('patients.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection