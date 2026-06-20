@extends('layouts.backend')

@section('content')

<h2>Create Invoice</h2>

<form method="POST"
action="{{ route('invoices.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Invoice No</label>
<input type="text"
name="invoice_no"
class="form-control">
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

<div class="col-md-4">
<label>Doctor</label>
<select name="doctor_id"
class="form-control">

<option value="">
Select Doctor
</option>

@foreach($doctors as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Total Amount</label>
<input type="number"
step="0.01"
name="total_amount"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Paid Amount</label>
<input type="number"
step="0.01"
name="paid_amount"
class="form-control"
value="0">
</div>

<div class="col-md-4 mt-3">
<label>Balance Amount</label>
<input type="number"
step="0.01"
name="balance_amount"
class="form-control"
value="0">
</div>

<div class="col-md-4 mt-3">
<label>Invoice Date</label>
<input type="date"
name="invoice_date"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status"
class="form-control">

<option value="pending">
Pending
</option>

<option value="partial">
Partial
</option>

<option value="paid">
Paid
</option>

<option value="cancelled">
Cancelled
</option>

</select>

</div>

<div class="col-md-12 mt-3">
<label>Remarks</label>

<textarea name="remarks"
class="form-control"></textarea>

</div>

</div>

<br>

<button class="btn btn-success">
Save Invoice
</button>

<a href="{{ route('invoices.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection