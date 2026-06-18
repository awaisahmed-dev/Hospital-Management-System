@extends('layouts.backend')

@section('content')

<h2>Create Branch</h2>

<form method="POST" action="{{ route('branches.store') }}">
@csrf

<div class="row">

<div class="col-md-4">
<label>Branch Code</label>
<input type="text" name="branch_code" class="form-control">
</div>

<div class="col-md-4">
<label>Name</label>
<input type="text" name="name" class="form-control">
</div>

<div class="col-md-4">
<label>Phone</label>
<input type="text" name="phone" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>City</label>
<input type="text" name="city" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Country</label>
<input type="text" name="country" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Total Rooms</label>
<input type="number" name="total_rooms" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Total Beds</label>
<input type="number" name="total_beds" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Manager Name</label>
<input type="text" name="manager_name" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Manager Phone</label>
<input type="text" name="manager_phone" class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Address</label>
<textarea name="address" class="form-control"></textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status" class="form-control">

<option value="active">Active</option>
<option value="inactive">Inactive</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save Branch
</button>

<a href="{{ route('branches.index') }}"
class="btn btn-secondary">
Back </a>

</form>

@endsection
