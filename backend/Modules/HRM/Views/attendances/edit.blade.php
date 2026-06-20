@extends('layouts.backend')

@section('content')

<h2>Edit Attendance</h2>

<form method="POST"
action="{{ route('attendances.update',$attendance->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">

<label>Employee</label>

<select name="employee_id"
class="form-control">

@foreach($employees as $id=>$name)

<option value="{{ $id }}"
{{ $attendance->employee_id==$id ? 'selected':'' }}>

{{ $name }}

</option>

@endforeach

</select>

</div>

<div class="col-md-4">

<label>Date</label>

<input type="date"
name="attendance_date"
value="{{ $attendance->attendance_date }}"
class="form-control">

</div>

<div class="col-md-4">

<label>Status</label>

<select name="status"
class="form-control">

<option value="present"
{{ $attendance->status=='present'?'selected':'' }}>
Present
</option>

<option value="absent"
{{ $attendance->status=='absent'?'selected':'' }}>
Absent
</option>

<option value="late"
{{ $attendance->status=='late'?'selected':'' }}>
Late
</option>

</select>

</div>

<div class="col-md-4 mt-3">

<label>Check In</label>

<input type="time"
name="check_in"
value="{{ $attendance->check_in }}"
class="form-control">

</div>

<div class="col-md-4 mt-3">

<label>Check Out</label>

<input type="time"
name="check_out"
value="{{ $attendance->check_out }}"
class="form-control">

</div>

</div>

<br>

<button class="btn btn-primary">
Update Attendance
</button>
<a href="{{ route('attendances.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection