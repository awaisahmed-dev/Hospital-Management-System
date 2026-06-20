@extends('layouts.backend')

@section('content')

<h2>Create Stock In</h2>

<form method="POST"
action="{{ route('stockins.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Stock No</label>
<input type="text"
name="stockin_no"
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
<label>Unit Price</label>
<input type="number"
step="0.01"
name="unit_price"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Stock In Date</label>
<input type="date"
name="stockin_date"
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

<option value="received">
Received
</option>

<option value="pending">
Pending
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save Stock In
</button>

</form>

@endsection