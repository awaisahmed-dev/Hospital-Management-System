@extends('layouts.backend')

@section('content')

<h2>Supplier Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $supplier->id }}</td>
</tr>

<tr>
<th>Supplier Code</th>
<td>{{ $supplier->supplier_code }}</td>
</tr>

<tr>
<th>Supplier Name</th>
<td>{{ $supplier->supplier_name }}</td>
</tr>

<tr>
<th>Contact Person</th>
<td>{{ $supplier->contact_person }}</td>
</tr>

<tr>
<th>Phone</th>
<td>{{ $supplier->phone }}</td>
</tr>

<tr>
<th>Email</th>
<td>{{ $supplier->email }}</td>
</tr>

<tr>
<th>Address</th>
<td>{{ $supplier->address }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $supplier->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $supplier->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $supplier->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $supplier->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $supplier->updated_at }}</td>
</tr>

</table>


<a href="{{ route('suppliers.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection