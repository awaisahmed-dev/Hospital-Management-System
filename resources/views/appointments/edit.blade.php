@extends('layouts.backend')

@section('content')

<h2>Edit Appointment</h2>

<form method="POST"
action="{{ route('appointments.update',$appointment->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Appointment No</label>
<input type="text"
name="appointment_no"
class="form-control"
value="{{ $appointment->appointment_no }}">
</div>

<div class="col-md-4">
<label>Patient</label>

<select name="patient_id" class="form-control">

@foreach($patients as $id => $name)

<option
value="{{ $id }}"
{{ $appointment->patient_id == $id ? 'selected' : '' }}>

{{ $name }}

</option>

@endforeach

</select>

</div>

<div class="col-md-4">
<label>Doctor</label>

<select name="doctor_id" class="form-control">

@foreach($doctors as $id => $name)

<option
value="{{ $id }}"
{{ $appointment->doctor_id == $id ? 'selected' : '' }}>

{{ $name }}

</option>

@endforeach

</select>

</div>

<div class="col-md-4 mt-3">
<label>Appointment Date</label>

<input
type="date"
name="appointment_date"
class="form-control"
value="{{ $appointment->appointment_date }}">

</div>

<div class="col-md-4 mt-3">
<label>Appointment Time</label>

<input
type="time"
name="appointment_time"
class="form-control"
value="{{ $appointment->appointment_time }}">

</div>

<div class="col-md-4 mt-3">
<label>Token No</label>

<input
type="number"
name="token_no"
class="form-control"
value="{{ $appointment->token_no }}">

</div>

<div class="col-md-12 mt-3">
<label>Symptoms</label>

<textarea
name="symptoms"
class="form-control">{{ $appointment->symptoms }}</textarea>

</div>

<div class="col-md-12 mt-3">
<label>Doctor Notes</label>

<textarea
name="doctor_notes"
class="form-control">{{ $appointment->doctor_notes }}</textarea>

</div>

<div class="col-md-4 mt-3">

<label>Status</label>

<select name="status" class="form-control">

<option value="pending"
{{ $appointment->status=='pending'?'selected':'' }}>
Pending
</option>

<option value="confirmed"
{{ $appointment->status=='confirmed'?'selected':'' }}>
Confirmed
</option>

<option value="completed"
{{ $appointment->status=='completed'?'selected':'' }}>
Completed
</option>

<option value="cancelled"
{{ $appointment->status=='cancelled'?'selected':'' }}>
Cancelled
</option>

<option value="rescheduled"
{{ $appointment->status=='rescheduled'?'selected':'' }}>
Rescheduled
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Update Appointment
</button>

<a href="{{ route('appointments.index') }}"
class="btn btn-secondary">
Back </a>

</form>

@endsection
