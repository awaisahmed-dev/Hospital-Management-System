@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Attendance</h2>

<a href="{{ route('attendances.create') }}"
class="btn btn-success">

Add Attendance

</a>

</div>

<form method="GET" class="mt-3">

<input type="text"
name="search"
placeholder="Search Employee"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>Employee</th>
<th>Date</th>
<th>Check In</th>
<th>Check Out</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($attendances as $attendance)

<tr>

<td>{{ $attendance->id }}</td>

<td>
{{ $attendance->employee->first_name ?? '' }}
</td>

<td>{{ $attendance->attendance_date }}</td>

<td>{{ $attendance->check_in }}</td>

<td>{{ $attendance->check_out }}</td>

<td>{{ $attendance->status }}</td>

<td>

<a href="{{ route('attendances.show',$attendance->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('attendances.edit',$attendance->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('attendances.destroy',$attendance->id) }}"
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

{{ $attendances->links() }}

@endsection