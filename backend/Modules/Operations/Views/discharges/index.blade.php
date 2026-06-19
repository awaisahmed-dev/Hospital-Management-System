@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Discharges</h2>

<a href="{{ route('discharges.create') }}"
class="btn btn-success">
Add Discharge </a>

</div>

<table class="table table-bordered mt-3">

<tr>

<th>No</th>
<th>Discharge No</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($discharges as $discharge)

<tr>

<td>{{ $discharge->id }}</td>

<td>{{ $discharge->discharge_no }}</td>

<td>
{{ $discharge->patient->first_name ?? '' }}
{{ $discharge->patient->last_name ?? '' }}
</td>

<td>
{{ $discharge->doctor->first_name ?? '' }}
{{ $discharge->doctor->last_name ?? '' }}
</td>

<td>{{ $discharge->discharge_date }}</td>

<td>{{ $discharge->status }}</td>

<td>

<a href="{{ route('discharges.show',$discharge->id) }}"
class="btn btn-info btn-sm">
View </a>

<a href="{{ route('discharges.edit',$discharge->id) }}"
class="btn btn-primary btn-sm">
Edit </a>

<form method="POST"
action="{{ route('discharges.destroy',$discharge->id) }}"
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

{{ $discharges->links() }}

@endsection
