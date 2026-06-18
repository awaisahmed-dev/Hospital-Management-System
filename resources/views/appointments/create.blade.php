@extends('layouts.backend')

@section('content')

<h2>Create Appointment</h2>

<form method="POST"
action="{{ route('appointments.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Appointment No</label>
<input type="text"
name="appointment_no"
class="form-control">
</div>

<div class="col-md-4">
<label>Patient</label>

<select
name="patient_id"
class="form-control">

<option value="">
Select Patient
</option>

@foreach($patients as $id => $name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>

</div>

<div class="col-md-4">
<label>Doctor</label>

<select
name="doctor_id"
class="form-control">

<option value="">
Select Doctor
</option>

@foreach($doctors as $id => $name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>

</div>

<div class="col-md-4 mt-3">
<label>Appointment Date</label>
<input type="date"
name="appointment_date"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Appointment Time</label>
<input type="time"
name="appointment_time"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Token No</label>
<input type="number"
name="token_no"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Visit Type</label>
<input type="text"
name="visit_type"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Appointment Source</label>
<input type="text"
name="appointment_source"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Consultation Fee</label>
<input type="number"
step="0.01"
name="consultation_fee"
class="form-control">
</div>

<div class="col-md-6 mt-3">
<label>Symptoms</label>

<textarea
name="symptoms"
class="form-control"></textarea>

</div>

<div class="col-md-6 mt-3">
<label>Doctor Notes</label>

<textarea
name="doctor_notes"
class="form-control"></textarea>

</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select
name="status"
class="form-control">

<option value="pending">Pending</option>
<option value="confirmed">Confirmed</option>
<option value="completed">Completed</option>
<option value="cancelled">Cancelled</option>
<option value="rescheduled">Rescheduled</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save Appointment
</button>

<a href="{{ route('appointments.index') }}"
class="btn btn-secondary">
Back </a>

</form>

@endsection
