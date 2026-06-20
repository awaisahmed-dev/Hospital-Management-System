@extends('layouts.backend')

@section('content')

<h2>Create Attendance</h2>

<form method="POST"
action="{{ route('attendances.store') }}">

@csrf

<div class="row">

<div class="col-md-4">

<label>Employee</label>

<select name="employee_id"
class="form-control">

<option value="">
Select Employee
</option>

@foreach($employees as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>

</div>

<div class="col-md-4">

<label>Date</label>

<input type="date"
name="attendance_date"
class="form-control">

</div>

<div class="col-md-4">

<label>Status</label>

<select name="status"
class="form-control">

<option value="present">
Present
</option>

<option value="absent">
Absent
</option>

<option value="late">
Late
</option>

</select>

</div>

<div class="col-md-4 mt-3">

<label>Check In</label>

<input type="time"
name="check_in"
class="form-control">

</div>

<div class="col-md-4 mt-3">

<label>Check Out</label>

<input type="time"
name="check_out"
class="form-control">

</div>

</div>

<br>

<button class="btn btn-success">
Save Attendance
</button>

</form>

@endsection