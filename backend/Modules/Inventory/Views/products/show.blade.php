@extends('layouts.backend')

@section('content')

<h2>Product Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $product->id }}</td>
</tr>

<tr>
<th>Product Code</th>
<td>{{ $product->product_code }}</td>
</tr>

<tr>
<th>Product Name</th>
<td>{{ $product->product_name }}</td>
</tr>

<tr>
<th>Category</th>
<td>{{ $product->category->category_name ?? '' }}</td>
</tr>

<tr>
<th>Supplier</th>
<td>{{ $product->supplier->supplier_name ?? '' }}</td>
</tr>

<tr>
<th>Purchase Price</th>
<td>{{ $product->purchase_price }}</td>
</tr>

<tr>
<th>Sale Price</th>
<td>{{ $product->sale_price }}</td>
</tr>

<tr>
<th>Stock Qty</th>
<td>{{ $product->stock_qty }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $product->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $product->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $product->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $product->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $product->updated_at }}</td>
</tr>

</table>

<a href="{{ route('products.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection