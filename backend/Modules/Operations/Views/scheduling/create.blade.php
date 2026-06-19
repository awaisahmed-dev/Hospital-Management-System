@extends('layouts.backend')

@section('content')

<h2>Create Scheduling</h2>

<form method="POST"
action="{{ route('scheduling.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Schedule No</label>
<input type="text"
name="schedule_no"
class="form-control">
</div>

<div class="col-md-4">
<label>Patient</label>

<select name="patient_id"
class="form-control">

@foreach($patients as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>

</div>

<div class="col-md-4">
<label>Doctor</label>

<select name="doctor_id"
class="form-control">

@foreach($doctors as $id=>$name)

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
<label>Purpose</label>

<input type="text"
name="purpose"
class="form-control">

</div>

<div class="col-md-12 mt-3">
<label>Remarks</label>

<textarea name="remarks"
class="form-control"></textarea>

</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status"
class="form-control">

<option value="scheduled">
Scheduled
</option>

<option value="completed">
Completed
</option>

<option value="cancelled">
Cancelled
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save Scheduling
</button>

<a href="{{ route('scheduling.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection