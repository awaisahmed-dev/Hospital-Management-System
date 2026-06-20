@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Stock In</h2>

<a href="{{ route('stockins.create') }}"
class="btn btn-success">

Add Stock In

</a>

</div>

<form method="GET" class="mt-3">

<input type="text"
name="search"
class="form-control"
placeholder="Search Stock In">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>Stock No</th>
<th>Product</th>
<th>Quantity</th>
<th>Total</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($stockins as $stockin)

<tr>

<td>{{ $stockin->id }}</td>

<td>{{ $stockin->stockin_no }}</td>

<td>
{{ $stockin->product->product_name ?? '' }}
</td>

<td>{{ $stockin->quantity }}</td>

<td>{{ $stockin->total_amount }}</td>

<td>{{ $stockin->status }}</td>

<td>

<a href="{{ route('stockins.show',$stockin->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('stockins.edit',$stockin->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('stockins.destroy',$stockin->id) }}"
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

{{ $stockins->links() }}

@endsection