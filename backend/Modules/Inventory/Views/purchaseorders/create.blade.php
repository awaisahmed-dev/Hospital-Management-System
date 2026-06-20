@extends('layouts.backend')

@section('content')

<h2>Create Purchase Order</h2>

<form method="POST"
action="{{ route('purchaseorders.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>PO No</label>
<input type="text"
name="po_no"
class="form-control">
</div>

<div class="col-md-4">

<label>Supplier</label>

<select name="supplier_id"
class="form-control">

@foreach($suppliers as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>

</div>

<div class="col-md-4">
<label>PO Date</label>
<input type="date"
name="po_date"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Total Amount</label>
<input type="number"
step="0.01"
name="total_amount"
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

<option value="pending">Pending</option>
<option value="approved">Approved</option>
<option value="received">Received</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save Purchase Order
</button>

</form>

@endsection