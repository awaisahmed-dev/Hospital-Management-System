@extends('layouts.backend')

@section('content')

<h2>Create Specialization</h2>

<form method="POST"
action="{{ route('specializations.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Specialization Code</label>
<input type="text"
name="specialization_code"
class="form-control">
</div>

<div class="col-md-4">
<label>Name</label>
<input type="text"
name="name"
class="form-control">
</div>

<div class="col-md-4">
<label>Consultation Fee</label>
<input type="number"
name="default_consultation_fee"
class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Description</label>
<textarea
name="description"
class="form-control"></textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select
name="status"
class="form-control">

<option value="active">Active</option>
<option value="inactive">Inactive</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save Specialization
</button>

<a href="{{ route('specializations.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection