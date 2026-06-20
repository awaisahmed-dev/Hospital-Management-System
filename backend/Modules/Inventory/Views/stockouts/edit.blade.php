@extends('layouts.backend')

@section('content')

<h2>Edit Stock Out</h2>

<form method="POST"
action="{{ route('stockouts.update',$stockout->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Stock Out No</label>
<input type="text"
name="stockout_no"
class="form-control"
value="{{ $stockout->stockout_no }}">
</div>

<div class="col-md-4">

<label>Product</label>

<select name="product_id"
class="form-control">

@foreach($products as $id=>$name)

<option value="{{ $id }}"
{{ $stockout->product_id==$id ? 'selected':'' }}>

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
value="{{ $stockout->quantity }}">
</div>

<div class="col-md-4 mt-3">
<label>Date</label>
<input type="date"
name="stockout_date"
class="form-control"
value="{{ $stockout->stockout_date }}">
</div>

</div>

<br>

<button class="btn btn-success">
Update Stock Out
</button>

</form>

@endsection