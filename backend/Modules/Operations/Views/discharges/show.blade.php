@extends('layouts.backend')

@section('content')

<h2>Discharge Details</h2>

<table class="table table-bordered">

<tr>
<th>Discharge No</th>
<td>{{ $discharge->discharge_no }}</td>
</tr>

<tr>
<th>Patient</th>
<td>
{{ $discharge->patient->first_name ?? '' }}
{{ $discharge->patient->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Doctor</th>
<td>
{{ $discharge->doctor->first_name ?? '' }}
{{ $discharge->doctor->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Date</th>
<td>{{ $discharge->discharge_date }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $discharge->status }}</td>
</tr>

<tr>
<th>Final Diagnosis</th>
<td>{{ $discharge->final_diagnosis }}</td>
</tr>

<tr>
<th>Instructions</th>
<td>{{ $discharge->instructions }}</td>
</tr>

</table>

<a href="{{ route('discharges.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection