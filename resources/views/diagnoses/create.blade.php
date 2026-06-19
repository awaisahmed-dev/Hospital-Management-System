@extends('layouts.backend')

@section('content')

<h2>Create Diagnosis</h2>

<form method="POST" action="{{ route('diagnoses.store') }}">
@csrf

<div class="row">

<div class="col-md-4">
<label>Consultation</label>
<select name="consultation_id" class="form-control">
@foreach($consultations as $id=>$name)
<option value="{{ $id }}">{{ $name }}</option>
@endforeach
</select>
</div>

<div class="col-md-4">
<label>Patient</label>
<select name="patient_id" class="form-control">
@foreach($patients as $id=>$name)
<option value="{{ $id }}">{{ $name }}</option>
@endforeach
</select>
</div>

<div class="col-md-4">
<label>Doctor</label>
<select name="doctor_id" class="form-control">
@foreach($doctors as $id=>$name)
<option value="{{ $id }}">{{ $name }}</option>
@endforeach
</select>
</div>

<div class="col-md-4 mt-3">
<label>Diagnosis Date</label>
<input type="date"
name="diagnosis_date"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Disease Name</label>
<input type="text"
name="disease_name"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>ICD Code</label>
<input type="text"
name="icd_code"
class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Symptoms</label>
<textarea name="symptoms"
class="form-control"></textarea>
</div>

<div class="col-md-12 mt-3">
<label>Findings</label>
<textarea name="findings"
class="form-control"></textarea>
</div>

<div class="col-md-12 mt-3">
<label>Remarks</label>
<textarea name="remarks"
class="form-control"></textarea>
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
Save Diagnosis
</button>

</form>

@endsection