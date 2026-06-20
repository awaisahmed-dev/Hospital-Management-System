@extends('layouts.backend')

@section('content')

<h2>Create Supplier</h2>

<form method="POST"
action="{{ route('suppliers.store') }}">

@csrf

<label>Supplier Code</label>
<input type="text"
name="supplier_code"
class="form-control">

<br>

<label>Supplier Name</label>
<input type="text"
name="supplier_name"
class="form-control">

<br>

<label>Contact Person</label>
<input type="text"
name="contact_person"
class="form-control">

<br>

<label>Phone</label>
<input type="text"
name="phone"
class="form-control">

<br>

<label>Email</label>
<input type="email"
name="email"
class="form-control">

<br>

<label>Address</label>
<textarea name="address"
class="form-control"></textarea>

<br>

<label>Status</label>

<select name="status"
class="form-control">

<option value="active">Active</option>
<option value="inactive">Inactive</option>

</select>

<br>

<button class="btn btn-success">
Save Supplier
</button>

</form>

@endsection