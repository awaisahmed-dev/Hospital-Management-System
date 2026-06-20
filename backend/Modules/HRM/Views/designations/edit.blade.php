@extends('layouts.backend')

@section('content')

<h2>Edit Designation</h2>

<form method="POST"
action="{{ route('designations.update',$designation->id) }}">

@csrf
@method('PUT')

<div class="mb-3">

<label>Department</label>

<select name="department_id"
class="form-control">

@foreach($departments as $id=>$name)

<option value="{{ $id }}"
{{ $designation->department_id==$id ? 'selected' : '' }}>

{{ $name }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Designation Name</label>

<input type="text"
name="designation_name"
value="{{ $designation->designation_name }}"
class="form-control">

</div>

<div class="mb-3">

<label>Status</label>

<select name="status"
class="form-control">

<option value="active"
{{ $designation->status=='active' ? 'selected' : '' }}>
Active
</option>

<option value="inactive"
{{ $designation->status=='inactive' ? 'selected' : '' }}>
Inactive
</option>

</select>

</div>

<button class="btn btn-success">
Update Designation
</button>
<a href="{{ route('designations.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection