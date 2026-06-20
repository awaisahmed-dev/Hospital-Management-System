@extends('layouts.backend')

@section('content')

<h2>Edit Payment</h2>

<form method="POST"
action="{{ route('payments.update',$payment->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Payment No</label>
<input type="text"
name="payment_no"
class="form-control"
value="{{ $payment->payment_no }}">
</div>

<div class="col-md-4">
<label>Invoice</label>

<select name="invoice_id"
class="form-control">

@foreach($invoices as $id=>$name)

<option value="{{ $id }}"
{{ $payment->invoice_id==$id ? 'selected' : '' }}>

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

<option value="{{ $id }}"
{{ $payment->patient_id==$id ? 'selected' : '' }}>

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
class="form-control"
value="{{ $payment->amount }}">
</div>

<div class="col-md-4 mt-3">
<label>Payment Date</label>
<input type="date"
name="payment_date"
class="form-control"
value="{{ $payment->payment_date }}">
</div>

<div class="col-md-4 mt-3">
<label>Payment Method</label>
<input type="text"
name="payment_method"
class="form-control"
value="{{ $payment->payment_method }}">
</div>

<div class="col-md-12 mt-3">
<label>Remarks</label>

<textarea name="remarks"
class="form-control">{{ $payment->remarks }}</textarea>

</div>

<div class="col-md-4 mt-3">

<label>Status</label>

<select name="status"
class="form-control">

<option value="pending"
{{ $payment->status=='pending'?'selected':'' }}>
Pending
</option>

<option value="paid"
{{ $payment->status=='paid'?'selected':'' }}>
Paid
</option>

<option value="cancelled"
{{ $payment->status=='cancelled'?'selected':'' }}>
Cancelled
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Update Payment
</button>

<a href="{{ route('payments.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection