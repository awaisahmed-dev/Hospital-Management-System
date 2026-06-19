@extends('layouts.backend')

@section('content')

<h2>Create Consultation</h2>

<form method="POST" action="{{ route('consultations.store') }}">
@csrf

<div class="row">

<div class="col-md-4">
<label>Appointment</label>
<select name="appointment_id" class="form-control">
@foreach($appointments as $id=>$name)
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
<label>Date</label>
<input type="date"
name="consultation_date"
class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Chief Complaint</label>
<textarea name="chief_complaint"
class="form-control"></textarea>
</div>

<div class="col-md-12 mt-3">
<label>History</label>
<textarea name="history"
class="form-control"></textarea>
</div>

<div class="col-md-12 mt-3">
<label>Diagnosis</label>
<textarea name="diagnosis"
class="form-control"></textarea>
</div>

<div class="col-md-12 mt-3">
<label>Treatment Plan</label>
<textarea name="treatment_plan"
class="form-control"></textarea>
</div>

<div class="col-md-12 mt-3">
<label>Doctor Notes</label>
<textarea name="doctor_notes"
class="form-control"></textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>
<select name="status" class="form-control">
<option value="pending">Pending</option>
<option value="completed">Completed</option>
</select>
</div>

</div>

<br>

<button class="btn btn-success">
Save Consultation
</button>

</form>

@endsection