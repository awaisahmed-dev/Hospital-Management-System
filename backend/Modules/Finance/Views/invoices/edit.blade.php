@extends('layouts.backend')

@section('content')

<h2>Edit Invoice</h2>

<form method="POST"
action="{{ route('invoices.update',$invoice->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Invoice No</label>

<input type="text"
name="invoice_no"
class="form-control"
value="{{ $invoice->invoice_no }}">
</div>

<div class="col-md-4">
<label>Patient</label>

<select name="patient_id"
class="form-control">

@foreach($patients as $id=>$name)

<option value="{{ $id }}"
{{ $invoice->patient_id==$id ? 'selected':'' }}>

{{ $name }}

</option>

@endforeach

</select>

</div>

<div class="col-md-4">
<label>Doctor</label>

<select name="doctor_id"
class="form-control">

@foreach($doctors as $id=>$name)

<option value="{{ $id }}"
{{ $invoice->doctor_id==$id ? 'selected':'' }}>

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
class="form-control"
value="{{ $invoice->total_amount }}">
</div>

<div class="col-md-4 mt-3">
<label>Paid Amount</label>

<input type="number"
step="0.01"
name="paid_amount"
class="form-control"
value="{{ $invoice->paid_amount }}">
</div>

<div class="col-md-4 mt-3">
<label>Balance Amount</label>

<input type="number"
step="0.01"
name="balance_amount"
class="form-control"
value="{{ $invoice->balance_amount }}">
</div>

<div class="col-md-4 mt-3">
<label>Invoice Date</label>

<input type="date"
name="invoice_date"
class="form-control"
value="{{ $invoice->invoice_date }}">
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status"
class="form-control">

<option value="pending"
{{ $invoice->status=='pending' ? 'selected':'' }}>
Pending
</option>

<option value="partial"
{{ $invoice->status=='partial' ? 'selected':'' }}>
Partial
</option>

<option value="paid"
{{ $invoice->status=='paid' ? 'selected':'' }}>
Paid
</option>

<option value="cancelled"
{{ $invoice->status=='cancelled' ? 'selected':'' }}>
Cancelled
</option>

</select>

</div>

<div class="col-md-12 mt-3">
<label>Remarks</label>

<textarea name="remarks"
class="form-control">{{ $invoice->remarks }}</textarea>

</div>

</div>

<br>

<button class="btn btn-success">
Update Invoice
</button>

<a href="{{ route('invoices.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection