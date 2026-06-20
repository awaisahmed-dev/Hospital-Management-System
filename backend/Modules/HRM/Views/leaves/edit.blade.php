@extends('layouts.backend')

@section('content')

<h2>Edit Leave</h2>

<form method="POST"
action="{{ route('leaves.update',$leave->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Leave No</label>

<input type="text"
name="leave_no"
value="{{ $leave->leave_no }}"
class="form-control">

</div>

<div class="col-md-4">

<label>Employee</label>

<select name="employee_id"
class="form-control">

@foreach($employees as $id=>$name)

<option
value="{{ $id }}"
{{ $leave->employee_id==$id?'selected':'' }}>

{{ $name }}

</option>

@endforeach

</select>

</div>

<div class="col-md-4">

<label>Status</label>

<select name="status"
class="form-control">

<option value="pending"
{{ $leave->status=='pending'?'selected':'' }}>
Pending
</option>

<option value="approved"
{{ $leave->status=='approved'?'selected':'' }}>
Approved
</option>

<option value="rejected"
{{ $leave->status=='rejected'?'selected':'' }}>
Rejected
</option>

</select>

</div>

<div class="col-md-4 mt-3">
<label>From Date</label>

<input type="date"
name="from_date"
value="{{ $leave->from_date }}"
class="form-control">

</div>

<div class="col-md-4 mt-3">
<label>To Date</label>

<input type="date"
name="to_date"
value="{{ $leave->to_date }}"
class="form-control">

</div>

<div class="col-md-12 mt-3">

<label>Reason</label>

<textarea
name="reason"
class="form-control">{{ $leave->reason }}</textarea>

</div>

</div>

<br>

<button class="btn btn-primary">
Update Leave
</button>

<a href="{{ route('leaves.index') }}"
class="btn btn-secondary">

Back

</a>
</form>

@endsection