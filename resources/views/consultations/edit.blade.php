@extends('layouts.backend')

@section('content')

<h2>Edit Consultation</h2>

<form method="POST"
action="{{ route('consultations.update',$consultation->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Appointment</label>
<select name="appointment_id" class="form-control">

@foreach($appointments as $id=>$name)

<option value="{{ $id }}"
{{ $consultation->appointment_id == $id ? 'selected' : '' }}>

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
{{ $consultation->patient_id == $id ? 'selected' : '' }}>

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
{{ $consultation->doctor_id == $id ? 'selected' : '' }}>

{{ $name }}

</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Consultation Date</label>

<input
type="date"
name="consultation_date"
class="form-control"
value="{{ $consultation->consultation_date }}">

</div>

<div class="col-md-12 mt-3">
<label>Chief Complaint</label>

<textarea
name="chief_complaint"
class="form-control">{{ $consultation->chief_complaint }}</textarea>

</div>

<div class="col-md-12 mt-3">
<label>History</label>

<textarea
name="history"
class="form-control">{{ $consultation->history }}</textarea>

</div>

<div class="col-md-12 mt-3">
<label>Diagnosis</label>

<textarea
name="diagnosis"
class="form-control">{{ $consultation->diagnosis }}</textarea>

</div>

<div class="col-md-12 mt-3">
<label>Treatment Plan</label>

<textarea
name="treatment_plan"
class="form-control">{{ $consultation->treatment_plan }}</textarea>

</div>

<div class="col-md-12 mt-3">
<label>Doctor Notes</label>

<textarea
name="doctor_notes"
class="form-control">{{ $consultation->doctor_notes }}</textarea>

</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status" class="form-control">

<option value="pending"
{{ $consultation->status=='pending' ? 'selected' : '' }}>
Pending
</option>

<option value="completed"
{{ $consultation->status=='completed' ? 'selected' : '' }}>
Completed
</option>

</select>
</div>

</div>

<br>

<button class="btn btn-success">
Update Consultation
</button>

<a href="{{ route('consultations.index') }}"
class="btn btn-secondary">
Back </a>

</form>

@endsection
