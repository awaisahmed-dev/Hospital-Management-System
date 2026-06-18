@extends('layouts.backend')

@section('content')

<h2>Appointment Details</h2>

<table class="table table-bordered">

<tr>
<th>Appointment No</th>
<td>{{ $appointment->appointment_no }}</td>
</tr>

<tr>
<th>Patient</th>
<td>{{ $appointment->patient->first_name ?? '' }}</td>
</tr>

<tr>
<th>Doctor</th>
<td>{{ $appointment->doctor->first_name ?? '' }}</td>
</tr>

<tr>
<th>Date</th>
<td>{{ $appointment->appointment_date }}</td>
</tr>

<tr>
<th>Time</th>
<td>{{ $appointment->appointment_time }}</td>
</tr>

<tr>
<th>Token No</th>
<td>{{ $appointment->token_no }}</td>
</tr>

<tr>
<th>Visit Type</th>
<td>{{ $appointment->visit_type }}</td>
</tr>

<tr>
<th>Appointment Source</th>
<td>{{ $appointment->appointment_source }}</td>
</tr>

<tr>
<th>Consultation Fee</th>
<td>{{ $appointment->consultation_fee }}</td>
</tr>

<tr>
<th>Symptoms</th>
<td>{{ $appointment->symptoms }}</td>
</tr>

<tr>
<th>Doctor Notes</th>
<td>{{ $appointment->doctor_notes }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $appointment->status }}</td>
</tr>

</table>

<a href="{{ route('appointments.index') }}"
class="btn btn-secondary">
Back </a>

@endsection
