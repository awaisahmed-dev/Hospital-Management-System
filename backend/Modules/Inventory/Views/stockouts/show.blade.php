@extends('layouts.backend')

@section('content')

<h2>Stock Out Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $stockout->id }}</td>
</tr>

<tr>
<th>Stock Out No</th>
<td>{{ $stockout->stockout_no }}</td>
</tr>

<tr>
<th>Product</th>
<td>{{ $stockout->product->product_name ?? '' }}</td>
</tr>

<tr>
<th>Quantity</th>
<td>{{ $stockout->quantity }}</td>
</tr>

<tr>
<th>Date</th>
<td>{{ $stockout->stockout_date }}</td>
</tr>

<tr>
<th>Remarks</th>
<td>{{ $stockout->remarks }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $stockout->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $stockout->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $stockout->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $stockout->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $stockout->updated_at }}</td>
</tr>

</table>

<a href="{{ route('stockouts.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection