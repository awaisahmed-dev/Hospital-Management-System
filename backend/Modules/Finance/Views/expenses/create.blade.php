@extends('layouts.backend')

@section('content')

<h2>Create Expense</h2>

<form method="POST"
action="{{ route('expenses.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Expense No</label>
<input type="text"
name="expense_no"
class="form-control">
</div>

<div class="col-md-4">
<label>Expense Title</label>
<input type="text"
name="expense_title"
class="form-control">
</div>

<div class="col-md-4">
<label>Amount</label>
<input type="number"
step="0.01"
name="amount"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Expense Date</label>
<input type="date"
name="expense_date"
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

<option value="approved">
Approved
</option>

<option value="rejected">
Rejected
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save Expense
</button>

<a href="{{ route('expenses.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection