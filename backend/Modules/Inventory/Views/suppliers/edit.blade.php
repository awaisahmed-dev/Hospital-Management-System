@extends('layouts.backend')

@section('content')

<h2>Edit Supplier</h2>

<form method="POST"
action="{{ route('suppliers.update',$supplier->id) }}">

@csrf
@method('PUT')

<input type="text"
name="supplier_code"
class="form-control"
value="{{ $supplier->supplier_code }}">

<br>

<input type="text"
name="supplier_name"
class="form-control"
value="{{ $supplier->supplier_name }}">

<br>

<input type="text"
name="contact_person"
class="form-control"
value="{{ $supplier->contact_person }}">

<br>

<input type="text"
name="phone"
class="form-control"
value="{{ $supplier->phone }}">

<br>

<input type="email"
name="email"
class="form-control"
value="{{ $supplier->email }}">

<br>

<textarea name="address"
class="form-control">{{ $supplier->address }}</textarea>

<br>

<button class="btn btn-success">
Update Supplier
</button>

<a href="{{ route('suppliers.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection