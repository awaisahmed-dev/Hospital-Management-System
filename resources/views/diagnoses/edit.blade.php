@extends('layouts.backend')

@section('content')

<h2>Edit Diagnosis</h2>

<form method="POST"
action="{{ route('diagnoses.update',$diagnosis->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Consultation</label>
<select name="consultation_id" class="form-control">
@foreach($consultations as $id=>$name)
<option value="{{ $id }}"
{{ $diagnosis->consultation_id==$id?'selected':'' }}>
{{ $name }}
</option>
@endforeach
</select>
</div>

<div class="col-md-4">
<label>Patient</label>
<select name="patient_id" class="form-control">
@foreach($patients as $id=>$name)
<option value="{{ $id }}"
{{ $diagnosis->patient_id==$id?'selected':'' }}>
{{ $name }}
</option>
@endforeach
</select>
</div>

<div class="col-md-4">
<label>Doctor</label>
<select name="doctor_id" class="form-control">
@foreach($doctors as $id=>$name)
<option value="{{ $id }}"
{{ $diagnosis->doctor_id==$id?'selected':'' }}>
{{ $name }}
</option>
@endforeach
</select>
</div>

<div class="col-md-4 mt-3">
<label>Diagnosis Date</label>
<input type="date"
name="diagnosis_date"
class="form-control"
value="{{ $diagnosis->diagnosis_date }}">
</div>

<div class="col-md-4 mt-3">
<label>Disease Name</label>
<input type="text"
name="disease_name"
class="form-control"
value="{{ $diagnosis->disease_name }}">
</div>

<div class="col-md-4 mt-3">
<label>ICD Code</label>
<input type="text"
name="icd_code"
class="form-control"
value="{{ $diagnosis->icd_code }}">
</div>

<div class="col-md-12 mt-3">
<label>Symptoms</label>
<textarea name="symptoms"
class="form-control">{{ $diagnosis->symptoms }}</textarea>
</div>

<div class="col-md-12 mt-3">
<label>Findings</label>
<textarea name="findings"
class="form-control">{{ $diagnosis->findings }}</textarea>
</div>

<div class="col-md-12 mt-3">
<label>Remarks</label>
<textarea name="remarks"
class="form-control">{{ $diagnosis->remarks }}</textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>
<select name="status" class="form-control">

<option value="active"
{{ $diagnosis->status=='active'?'selected':'' }}>
Active
</option>

<option value="inactive"
{{ $diagnosis->status=='inactive'?'selected':'' }}>
Inactive
</option>

</select>
</div>

</div>

<br>

<button class="btn btn-success">
Update Diagnosis
</button>

</form>

@endsection