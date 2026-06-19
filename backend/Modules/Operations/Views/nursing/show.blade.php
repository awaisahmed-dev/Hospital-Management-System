@extends('layouts.backend')

@section('content')

<h2>Nursing Details</h2>

<table class="table table-bordered">

<tr>
<th>Nursing No</th>
<td>{{ $nursing->nursing_no }}</td>
</tr>

<tr>
<th>Patient</th>
<td>
{{ $nursing->patient->first_name ?? '' }}
{{ $nursing->patient->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Doctor</th>
<td>
{{ $nursing->doctor->first_name ?? '' }}
{{ $nursing->doctor->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Nurse</th>
<td>
{{ $nursing->staff->first_name ?? '' }}
{{ $nursing->staff->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Date</th>
<td>{{ $nursing->nursing_date }}</td>
</tr>

<tr>
<th>Care Notes</th>
<td>{{ $nursing->care_notes }}</td>
</tr>

<tr>
<th>Medication Notes</th>
<td>{{ $nursing->medication_notes }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $nursing->status }}</td>
</tr>

</table>

<a href="{{ route('nursing.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection