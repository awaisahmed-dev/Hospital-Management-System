@extends('layouts.backend')

@section('content')

<h2>Scheduling Details</h2>

<table class="table table-bordered">

<tr>
<th>Schedule No</th>
<td>{{ $scheduling->schedule_no }}</td>
</tr>

<tr>
<th>Patient</th>
<td>
{{ $scheduling->patient->first_name ?? '' }}
{{ $scheduling->patient->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Doctor</th>
<td>
{{ $scheduling->doctor->first_name ?? '' }}
{{ $scheduling->doctor->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Appointment Date</th>
<td>{{ $scheduling->appointment_date }}</td>
</tr>

<tr>
<th>Appointment Time</th>
<td>{{ $scheduling->appointment_time }}</td>
</tr>

<tr>
<th>Purpose</th>
<td>{{ $scheduling->purpose }}</td>
</tr>

<tr>
<th>Remarks</th>
<td>{{ $scheduling->remarks }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $scheduling->status }}</td>
</tr>

</table>

<a href="{{ route('scheduling.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection