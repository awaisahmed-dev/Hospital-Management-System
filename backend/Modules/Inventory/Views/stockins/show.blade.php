@extends('layouts.backend')

@section('content')

<h2>Stock In Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $stockin->id }}</td>
</tr>

<tr>
<th>Stock No</th>
<td>{{ $stockin->stockin_no }}</td>
</tr>

<tr>
<th>Product</th>
<td>{{ $stockin->product->product_name ?? '' }}</td>
</tr>

<tr>
<th>Quantity</th>
<td>{{ $stockin->quantity }}</td>
</tr>

<tr>
<th>Unit Price</th>
<td>{{ $stockin->unit_price }}</td>
</tr>

<tr>
<th>Total Amount</th>
<td>{{ $stockin->total_amount }}</td>
</tr>

<tr>
<th>Stock In Date</th>
<td>{{ $stockin->stockin_date }}</td>
</tr>

<tr>
<th>Remarks</th>
<td>{{ $stockin->remarks }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $stockin->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $stockin->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $stockin->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $stockin->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $stockin->updated_at }}</td>
</tr>

</table>

<a href="{{ route('stockins.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection