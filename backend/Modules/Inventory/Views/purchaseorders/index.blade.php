@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Purchase Orders</h2>

<a href="{{ route('purchaseorders.create') }}"
class="btn btn-success">

Add Purchase Order

</a>

</div>

<form method="GET" class="mt-3">

<input type="text"
name="search"
class="form-control"
placeholder="Search Purchase Order">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>PO No</th>
<th>Supplier</th>
<th>Total Amount</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($purchaseorders as $purchaseorder)

<tr>

<td>{{ $purchaseorder->id }}</td>

<td>{{ $purchaseorder->po_no }}</td>

<td>
{{ $purchaseorder->supplier->supplier_name ?? '' }}
</td>

<td>{{ $purchaseorder->total_amount }}</td>

<td>{{ $purchaseorder->status }}</td>

<td>

<a href="{{ route('purchaseorders.show',$purchaseorder->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('purchaseorders.edit',$purchaseorder->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('purchaseorders.destroy',$purchaseorder->id) }}"
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

{{ $purchaseorders->links() }}

@endsection