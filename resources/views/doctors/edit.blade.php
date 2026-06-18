@extends('layouts.backend')

@section('content')

<h2>Edit Doctor</h2>

<form method="POST"
action="{{ route('doctors.update',$doctor->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Employee No</label>
<input type="text" name="employee_no" class="form-control" value="{{ $doctor->employee_no }}">
</div>

<div class="col-md-4">
<label>First Name</label>
<input type="text" name="first_name" class="form-control" value="{{ $doctor->first_name }}">
</div>

<div class="col-md-4">
<label>Middle Name</label>
<input type="text" name="middle_name" class="form-control" value="{{ $doctor->middle_name }}">
</div>

<div class="col-md-4 mt-3">
<label>Last Name</label>
<input type="text" name="last_name" class="form-control" value="{{ $doctor->last_name }}">
</div>

<div class="col-md-4 mt-3">
<label>Gender</label>
<select name="gender" class="form-control">

<option value="male"
{{ $doctor->gender=='male'?'selected':'' }}>
Male
</option>

<option value="female"
{{ $doctor->gender=='female'?'selected':'' }}>
Female
</option>

<option value="other"
{{ $doctor->gender=='other'?'selected':'' }}>
Other
</option>

</select>
</div>

<div class="col-md-4 mt-3">
<label>DOB</label>
<input type="date" name="dob" class="form-control" value="{{ $doctor->dob }}">
</div>

<div class="col-md-4 mt-3">
<label>CNIC</label>
<input type="text" name="cnic" class="form-control" value="{{ $doctor->cnic }}">
</div>

<div class="col-md-4 mt-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}">
</div>

<div class="col-md-4 mt-3">
<label>Alternate Phone</label>
<input type="text" name="alternate_phone" class="form-control" value="{{ $doctor->alternate_phone }}">
</div>

<div class="col-md-4 mt-3">
<label>Email</label>
<input type="email" name="email" class="form-control" value="{{ $doctor->email }}">
</div>

<div class="col-md-4 mt-3">
<label>Medical License</label>
<input type="text" name="medical_license_no" class="form-control" value="{{ $doctor->medical_license_no }}">
</div>

<div class="col-md-4 mt-3">
<label>Qualification</label>
<input type="text" name="qualification" class="form-control" value="{{ $doctor->qualification }}">
</div>

<div class="col-md-4 mt-3">
<label>Experience Years</label>
<input type="number" name="experience_years" class="form-control" value="{{ $doctor->experience_years }}">
</div>

<div class="col-md-4 mt-3">
<label>Joining Date</label>
<input type="date" name="joining_date" class="form-control" value="{{ $doctor->joining_date }}">
</div>

<div class="col-md-4 mt-3">
<label>Consultation Fee</label>
<input type="number" name="consultation_fee" class="form-control" value="{{ $doctor->consultation_fee }}">
</div>

<div class="col-md-4 mt-3">
<label>Salary</label>
<input type="number" name="salary" class="form-control" value="{{ $doctor->salary }}">
</div>

<div class="col-md-4 mt-3">
<label>Blood Group</label>
<input type="text" name="blood_group" class="form-control" value="{{ $doctor->blood_group }}">
</div>

<div class="col-md-4 mt-3">
<label>City</label>
<input type="text" name="city" class="form-control" value="{{ $doctor->city }}">
</div>

<div class="col-md-4 mt-3">
<label>Country</label>
<input type="text" name="country" class="form-control" value="{{ $doctor->country }}">
</div>

<div class="col-md-4 mt-3">
<label>Emergency Contact</label>
<input type="text" name="emergency_contact" class="form-control" value="{{ $doctor->emergency_contact }}">
</div>

<div class="col-md-12 mt-3">
<label>Address</label>
<textarea name="address" class="form-control">{{ $doctor->address }}</textarea>
</div>

<div class="col-md-12 mt-3">
<label>Notes</label>
<textarea name="notes" class="form-control">{{ $doctor->notes }}</textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>
<select name="status" class="form-control">

<option value="active"
{{ $doctor->status=='active'?'selected':'' }}>
Active
</option>

<option value="inactive"
{{ $doctor->status=='inactive'?'selected':'' }}>
Inactive
</option>

</select>
</div>

</div>

<br>

<button class="btn btn-success">

Save Doctor

</button>

<a href="{{ route('doctors.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection