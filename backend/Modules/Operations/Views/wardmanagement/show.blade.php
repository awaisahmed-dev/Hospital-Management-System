@extends('layouts.backend')

@section('content')

<h2>Ward Management Details</h2>

<table class="table table-bordered">

<tr>
<th>Ward No</th>
<td>{{ $wardmanagement->ward_no }}</td>
</tr>

<tr>
<th>Patient</th>
<td>
{{ $wardmanagement->patient->first_name ?? '' }}
{{ $wardmanagement->patient->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Doctor</th>
<td>
{{ $wardmanagement->doctor->first_name ?? '' }}
{{ $wardmanagement->doctor->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Room</th>
<td>{{ $wardmanagement->room->room_no ?? '' }}</td>
</tr>

<tr>
<th>Bed</th>
<td>{{ $wardmanagement->bed->bed_no ?? '' }}</td>
</tr>

<tr>
<th>Shift Date</th>
<td>{{ $wardmanagement->shift_date }}</td>
</tr>

<tr>
<th>Ward Type</th>
<td>{{ $wardmanagement->ward_type }}</td>
</tr>

<tr>
<th>Notes</th>
<td>{{ $wardmanagement->notes }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $wardmanagement->status }}</td>
</tr>

</table>

<a href="{{ route('wardmanagement.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection