@extends('layouts.backend')

@section('content')

<h2>Edit Specialization</h2>

<form method="POST"
action="{{ route('specializations.update',$specialization->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Specialization Code</label>
<input type="text"
name="specialization_code"
class="form-control" value="{{ $specialization->specialization_code }}">
</div>

<div class="col-md-4">
<label>Name</label>
<input type="text"
name="name"
class="form-control" value="{{ $specialization->name }}">
</div>

<div class="col-md-4">
<label>Consultation Fee</label>
<input type="number"
name="default_consultation_fee"
class="form-control" value="{{ $specialization->default_consultation_fee }}">
</div>

<div class="col-md-12 mt-3">
<label>Description</label>
<textarea
name="description"
class="form-control">{{ $specialization->description }}</textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select
name="status"
class="form-control">

<option value="active"
{{ $specialization->status=='active'?'selected':'' }}>
Active
</option>

<option value="inactive"
{{ $specialization->status=='inactive'?'selected':'' }}>
Inactive
</option>

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