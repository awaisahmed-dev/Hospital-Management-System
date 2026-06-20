@extends('layouts.backend')

@section('content')

<h2>Create Payroll</h2>

<form method="POST"
action="{{ route('payrolls.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Payroll No</label>
<input type="text"
name="payroll_no"
class="form-control">
</div>

<div class="col-md-4">
<label>Employee Name</label>
<input type="text"
name="employee_name"
class="form-control">
</div>

<div class="col-md-4">
<label>Salary</label>
<input type="number"
step="0.01"
name="salary"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Payroll Date</label>
<input type="date"
name="payroll_date"
class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Remarks</label>
<textarea name="remarks"
class="form-control"></textarea>
</div>

<div class="col-md-4 mt-3">

<label>Status</label>

<select name="status"
class="form-control">

<option value="pending">
Pending
</option>

<option value="paid">
Paid
</option>

<option value="cancelled">
Cancelled
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save Payroll
</button>

<a href="{{ route('payrolls.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection