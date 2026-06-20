@extends('layouts.backend')

@section('content')

<h2>Create Product</h2>

<form method="POST"
action="{{ route('products.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Product Code</label>
<input type="text" name="product_code" class="form-control">
</div>

<div class="col-md-4">
<label>Category</label>
<select name="category_id" class="form-control">

@foreach($categories as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4">
<label>Supplier</label>
<select name="supplier_id" class="form-control">

@foreach($suppliers as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-6 mt-3">
<label>Product Name</label>
<input type="text" name="product_name" class="form-control">
</div>

<div class="col-md-3 mt-3">
<label>Purchase Price</label>
<input type="number" step="0.01" name="purchase_price" class="form-control">
</div>

<div class="col-md-3 mt-3">
<label>Sale Price</label>
<input type="number" step="0.01" name="sale_price" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Stock Qty</label>
<input type="number" name="stock_qty" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status" class="form-control">

<option value="active">Active</option>
<option value="inactive">Inactive</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save Product
</button>

</form>

@endsection