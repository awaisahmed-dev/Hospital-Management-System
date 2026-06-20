@extends('layouts.backend')

@section('content')

<h2>Create Payment</h2>

<form method="POST"
action="{{ route('payments.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Payment No</label>
<input type="text"
name="payment_no"
class="form-control">
</div>

<div class="col-md-4">
<label>Invoice</label>
<select name="invoice_id"
class="form-control">

@foreach($invoices as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4">
<label>Patient</label>
<select name="patient_id"
class="form-control">

@foreach($patients as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Amount</label>
<input type="number"
step="0.01"
name="amount"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Payment Date</label>
<input type="date"
name="payment_date"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Payment Method</label>
<input type="text"
name="payment_method"
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
Save Payment
</button>

<a href="{{ route('payments.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection