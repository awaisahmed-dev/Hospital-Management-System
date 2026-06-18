@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between mb-3">

<h2>Appointments</h2>

<a href="{{ route('appointments.create') }}"
class="btn btn-success">
Add Appointment </a>

</div>

<form method="GET">

<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="Search Appointment"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>No</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($appointments as $appointment)

<tr>

<td>{{ $appointment->appointment_no }}</td>

<td>
{{ $appointment->patient->first_name ?? '' }}
</td>

<td>
{{ $appointment->doctor->first_name ?? '' }}
</td>

<td>{{ $appointment->appointment_date }}</td>

<td>{{ $appointment->appointment_time }}</td>

<td>{{ $appointment->status }}</td>

<td>

<a href="{{ route('appointments.show',$appointment->id) }}"
class="btn btn-info btn-sm">
View </a>

<a href="{{ route('appointments.edit',$appointment->id) }}"
class="btn btn-primary btn-sm">
Edit </a>

<form
action="{{ route('appointments.destroy',$appointment->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button
onclick="return confirm('Delete Appointment?')"
class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $appointments->links() }}

@endsection
