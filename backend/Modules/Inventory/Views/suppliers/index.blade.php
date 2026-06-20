@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Suppliers</h2>

<a href="{{ route('suppliers.create') }}"
class="btn btn-success">

Add Supplier

</a>

</div>

<form method="GET" class="mt-3">

<input type="text"
name="search"
class="form-control"
placeholder="Search Supplier">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>ID</th>
<th>Code</th>
<th>Name</th>
<th>Phone</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($suppliers as $supplier)

<tr>

<td>{{ $supplier->id }}</td>
<td>{{ $supplier->supplier_code }}</td>
<td>{{ $supplier->supplier_name }}</td>
<td>{{ $supplier->phone }}</td>
<td>{{ $supplier->status }}</td>

<td>

<a href="{{ route('suppliers.show',$supplier->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('suppliers.edit',$supplier->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('suppliers.destroy',$supplier->id) }}"
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

{{ $suppliers->links() }}

@endsection