@extends('layouts.backend')

@section('content')

<h2>Edit Stock In</h2>

<form method="POST"
action="{{ route('stockins.update',$stockin->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Stock No</label>
<input type="text"
name="stockin_no"
class="form-control"
value="{{ $stockin->stockin_no }}">
</div>

<div class="col-md-4">

<label>Product</label>

<select name="product_id"
class="form-control">

@foreach($products as $id=>$name)

<option value="{{ $id }}"
{{ $stockin->product_id==$id ? 'selected':'' }}>

{{ $name }}

</option>

@endforeach

</select>

</div>

<div class="col-md-4">
<label>Quantity</label>
<input type="number"
name="quantity"
class="form-control"
value="{{ $stockin->quantity }}">
</div>

<div class="col-md-4 mt-3">
<label>Unit Price</label>
<input type="number"
step="0.01"
name="unit_price"
class="form-control"
value="{{ $stockin->unit_price }}">
</div>

<div class="col-md-4 mt-3">
<label>Date</label>
<input type="date"
name="stockin_date"
class="form-control"
value="{{ $stockin->stockin_date }}">
</div>

</div>

<br>

<button class="btn btn-success">
Update Stock In
</button>


<a href="{{ route('stockins.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection