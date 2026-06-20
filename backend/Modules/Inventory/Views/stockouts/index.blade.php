@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Stock Out</h2>

<a href="{{ route('stockouts.create') }}"
class="btn btn-success">

Add Stock Out

</a>

</div>

<form method="GET" class="mt-3">

<input type="text"
name="search"
class="form-control"
placeholder="Search Stock Out">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>Stock No</th>
<th>Product</th>
<th>Quantity</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($stockouts as $stockout)

<tr>

<td>{{ $stockout->id }}</td>

<td>{{ $stockout->stockout_no }}</td>

<td>
{{ $stockout->product->product_name ?? '' }}
</td>

<td>{{ $stockout->quantity }}</td>

<td>{{ $stockout->status }}</td>

<td>

<a href="{{ route('stockouts.show',$stockout->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('stockouts.edit',$stockout->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('stockouts.destroy',$stockout->id) }}"
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

{{ $stockouts->links() }}

@endsection