@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Products</h2>

<a href="{{ route('products.create') }}"
class="btn btn-success">

Add Product

</a>

</div>

<form method="GET" class="mt-3">

<input type="text"
name="search"
class="form-control"
placeholder="Search Product">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>Code</th>
<th>Name</th>
<th>Category</th>
<th>Supplier</th>
<th>Stock</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($products as $product)

<tr>

<td>{{ $product->id }}</td>

<td>{{ $product->product_code }}</td>

<td>{{ $product->product_name }}</td>

<td>{{ $product->category->category_name ?? '' }}</td>

<td>{{ $product->supplier->supplier_name ?? '' }}</td>

<td>{{ $product->stock_qty }}</td>

<td>{{ $product->status }}</td>

<td>

<a href="{{ route('products.show',$product->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('products.edit',$product->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('products.destroy',$product->id) }}"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $products->links() }}

@endsection