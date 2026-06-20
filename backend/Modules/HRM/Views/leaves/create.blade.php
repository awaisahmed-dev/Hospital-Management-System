@extends('layouts.backend')

@section('content')

<h2>Create Leave</h2>

<form method="POST"
action="{{ route('leaves.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Leave No</label>
<input type="text"
name="leave_no"
class="form-control">
</div>

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
<label>Status</label>

<select name="status"
class="form-control">

<option value="pending">
Pending
</option>

<option value="approved">
Approved
</option>

<option value="rejected">
Rejected
</option>

</select>

</div>

<div class="col-md-4 mt-3">
<label>From Date</label>
<input type="date"
name="from_date"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>To Date</label>
<input type="date"
name="to_date"
class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Reason</label>

<textarea
name="reason"
class="form-control"></textarea>

</div>

</div>

<br>

<button class="btn btn-success">
Save Leave
</button>

</form>

@endsection