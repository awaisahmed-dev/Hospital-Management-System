@extends('layouts.backend')

@section('content')

<h2>Edit Patient</h2>

<form method="POST" action="{{ route('patients.update',$patient->id) }}">
<!-- @csrf -->
@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>MR No</label>
<input type="text" name="mr_no" class="form-control" value="{{ $patient->mr_no }}">
</div>

<div class="col-md-4">
<label>First Name</label>
<input type="text" name="first_name" class="form-control" value="{{ $patient->first_name }}">
</div>

<div class="col-md-4">
<label>Middle Name</label>
<input type="text" name="middle_name" class="form-control" value="{{ $patient->middle_name }}">
</div>

<div class="col-md-4 mt-3">
<label>Last Name</label>
<input type="text" name="last_name" class="form-control" value="{{ $patient->last_name }}">
</div>

<div class="col-md-4 mt-3">
<label>Gender</label>
<select name="gender" class="form-control" value="{{ $patient->gender }}">
<option value="male">Male</option>
<option value="female">Female</option>
<option value="other">Other</option>
</select>
</div>

<div class="col-md-4 mt-3">
<label>DOB</label>
<input type="date" name="dob" class="form-control" value="{{ $patient->dob }}">
</div>

<div class="col-md-4 mt-3">
<label>CNIC</label>
<input type="text" name="cnic" class="form-control" value="{{ $patient->cnic }}">
</div>

<div class="col-md-4 mt-3">
<label>Passport No</label>
<input type="text" name="passport_no" class="form-control" value="{{ $patient->passport_no }}">
</div>

<div class="col-md-4 mt-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control" value="{{ $patient->phone }}">
</div>

<div class="col-md-4 mt-3">
<label>Alternate Phone</label>
<input type="text" name="alternate_phone" class="form-control" value="{{ $patient->alternate_phone }}">
</div>

<div class="col-md-4 mt-3">
<label>Email</label>
<input type="email" name="email" class="form-control" value="{{ $patient->email }}">
</div>

<div class="col-md-4 mt-3">
<label>Blood Group</label>
<input type="text" name="blood_group" class="form-control" value="{{ $patient->blood_group }}">
</div>

<div class="col-md-4 mt-3">
<label>Marital Status</label>
<select name="marital_status" class="form-control" value="{{ $patient->marital_status }}">
<option value="">Select</option>
<option value="single">Single</option>
<option value="married">Married</option>
<option value="divorced">Divorced</option>
<option value="widowed">Widowed</option>
</select>
</div>

<div class="col-md-4 mt-3">
<label>Occupation</label>
<input type="text" name="occupation" class="form-control" value="{{ $patient->occupation }}">
</div>

<div class="col-md-6 mt-3">
<label>Address</label>
<textarea name="address" class="form-control" value="{{ $patient->address }}"></textarea>
</div>

<div class="col-md-2 mt-3">
<label>City</label>
<input type="text" name="city" class="form-control" value="{{ $patient->city }}">
</div>

<div class="col-md-2 mt-3">
<label>Province</label>
<input type="text" name="province" class="form-control" value="{{ $patient->province }}">
</div>

<div class="col-md-2 mt-3">
<label>Country</label>
<input type="text" name="country" class="form-control" value="{{ $patient->country }}">
</div>

<div class="col-md-4 mt-3">
<label>Guardian Name</label>
<input type="text" name="guardian_name" class="form-control" value="{{ $patient->guardian_name }}">
</div>

<div class="col-md-4 mt-3">
<label>Guardian Phone</label>
<input type="text" name="guardian_phone" class="form-control" value="{{ $patient->guardian_phone }}">
</div>

<div class="col-md-4 mt-3">
<label>Emergency Contact</label>
<input type="text" name="emergency_contact" class="form-control" value="{{ $patient->emergency_contact }}">
</div>

<div class="col-md-6 mt-3">
<label>Insurance Company</label>
<input type="text" name="insurance_company" class="form-control" value="{{ $patient->insurance_company }}">
</div>

<div class="col-md-6 mt-3">
<label>Insurance Number</label>
<input type="text" name="insurance_number" class="form-control" value="{{ $patient->insurance_number }}">
</div>

<div class="col-md-4 mt-3">
<label>Status</label>
<select name="status" class="form-control" value="{{ $patient->status }}">
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