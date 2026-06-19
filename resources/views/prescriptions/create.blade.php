@extends('layouts.backend')

@section('content')

<h2>Create Prescription</h2>

<form method="POST" action="{{ route('prescriptions.store') }}">
@csrf

<div class="row">

<div class="col-md-4">
<label>Prescription No</label>
<input type="text"
name="prescription_no"
class="form-control">
</div>

<div class="col-md-4">
<label>Consultation</label>
<select name="consultation_id" class="form-control">
@foreach($consultations as $id=>$name)
<option value="{{ $id }}">{{ $name }}</option>
@endforeach
</select>
</div>

<div class="col-md-4">
<label>Diagnosis</label>
<select name="diagnosis_id" class="form-control">
<option value="">Select</option>
@foreach($diagnoses as $id=>$name)
<option value="{{ $id }}">{{ $name }}</option>
@endforeach
</select>
</div>

<div class="col-md-4 mt-3">
<label>Patient</label>
<select name="patient_id" class="form-control">
@foreach($patients as $id=>$name)
<option value="{{ $id }}">{{ $name }}</option>
@endforeach
</select>
</div>

<div class="col-md-4 mt-3">
<label>Doctor</label>
<select name="doctor_id" class="form-control">
@foreach($doctors as $id=>$name)
<option value="{{ $id }}">{{ $name }}</option>
@endforeach
</select>
</div>

<div class="col-md-4 mt-3">
<label>Prescription Date</label>
<input type="date"
name="prescription_date"
class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Medicine Details</label>
<textarea
name="medicine_details"
class="form-control"
rows="5"></textarea>
</div>

<div class="col-md-12 mt-3">
<label>Instructions</label>
<textarea
name="instructions"
class="form-control"
rows="4"></textarea>
</div>

<div class="col-md-4 mt-3">
<label>Duration (Days)</label>
<input type="number"
name="duration_days"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Status</label>
<select name="status" class="form-control">
<option value="active">Active</option>
<option value="completed">Completed</option>
<option value="cancelled">Cancelled</option>
</select>
</div>

</div>

<br>

<button class="btn btn-success">
Save Prescription
</button>

<a href="{{ route('prescriptions.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection