@extends('layouts.backend')

@section('content')

<h2>Create Stock Out</h2>

<form method="POST"
action="{{ route('stockouts.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Stock Out No</label>
<input type="text"
name="stockout_no"
class="form-control">
</div>

<div class="col-md-4">

<label>Product</label>

<select name="product_id"
class="form-control">

@foreach($products as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>

</div>

<div class="col-md-4">
<label>Quantity</label>
<input type="number"
name="quantity"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Date</label>
<input type="date"
name="stockout_date"
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

<option value="issued">
Issued
</option>

<option value="pending">
Pending
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save Stock Out
</button>

</form>

@endsection