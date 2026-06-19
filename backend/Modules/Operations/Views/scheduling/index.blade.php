@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Scheduling</h2>

<a href="{{ route('scheduling.create') }}"
class="btn btn-success">

Add Scheduling

</a>

</div>

<form method="GET"
class="mt-3">

<input type="text"
name="search"
placeholder="Search Scheduling"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>No</th>
<th>Schedule No</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($schedulings as $scheduling)

<tr>

<td>{{ $scheduling->id }}</td>

<td>{{ $scheduling->schedule_no }}</td>

<td>
{{ $scheduling->patient->first_name ?? '' }}
{{ $scheduling->patient->last_name ?? '' }}
</td>

<td>
{{ $scheduling->doctor->first_name ?? '' }}
{{ $scheduling->doctor->last_name ?? '' }}
</td>

<td>{{ $scheduling->appointment_date }}</td>

<td>{{ $scheduling->appointment_time }}</td>

<td>{{ $scheduling->status }}</td>

<td>

<a href="{{ route('scheduling.show',$scheduling->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('scheduling.edit',$scheduling->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('scheduling.destroy',$scheduling->id) }}"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $schedulings->links() }}

@endsection