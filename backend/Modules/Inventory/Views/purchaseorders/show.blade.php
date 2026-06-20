@extends('layouts.backend')

@section('content')

<h2>Purchase Order Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $purchaseorder->id }}</td>
</tr>

<tr>
<th>PO No</th>
<td>{{ $purchaseorder->po_no }}</td>
</tr>

<tr>
<th>Supplier</th>
<td>{{ $purchaseorder->supplier->supplier_name ?? '' }}</td>
</tr>

<tr>
<th>PO Date</th>
<td>{{ $purchaseorder->po_date }}</td>
</tr>

<tr>
<th>Total Amount</th>
<td>{{ $purchaseorder->total_amount }}</td>
</tr>

<tr>
<th>Remarks</th>
<td>{{ $purchaseorder->remarks }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $purchaseorder->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $purchaseorder->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $purchaseorder->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $purchaseorder->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $purchaseorder->updated_at }}</td>
</tr>

</table>

<a href="{{ route('purchaseorders.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection