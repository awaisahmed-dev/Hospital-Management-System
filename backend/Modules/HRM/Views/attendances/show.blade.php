@extends('layouts.backend')

@section('content')

<h2>Attendance Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $attendance->id }}</td>
</tr>

<tr>
<th>Employee</th>
<td>{{ $attendance->employee->first_name ?? '' }}</td>
</tr>

<tr>
<th>Date</th>
<td>{{ $attendance->attendance_date }}</td>
</tr>

<tr>
<th>Check In</th>
<td>{{ $attendance->check_in }}</td>
</tr>

<tr>
<th>Check Out</th>
<td>{{ $attendance->check_out }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $attendance->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $attendance->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $attendance->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $attendance->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $attendance->updated_at }}</td>
</tr>

</table>

<a href="{{ route('attendances.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection