@extends('layouts.backend')

@section('content')

<h2>Create Ward Management</h2>

<form method="POST"
action="{{ route('wardmanagement.store') }}">

@csrf

<div class="row">

<div class="col-md-4">
<label>Ward No</label>
<input type="text"
name="ward_no"
class="form-control">
</div>

<div class="col-md-4">
<label>Patient</label>
<select name="patient_id"
class="form-control">

@foreach($patients as $id=>$name)
<option value="{{ $id }}">
{{ $name }}
</option>
@endforeach

</select>
</div>

<div class="col-md-4">
<label>Doctor</label>
<select name="doctor_id"
class="form-control">

@foreach($doctors as $id=>$name)
<option value="{{ $id }}">
{{ $name }}
</option>
@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Room</label>
<select name="room_id"
class="form-control">

@foreach($rooms as $id=>$name)
<option value="{{ $id }}">
{{ $name }}
</option>
@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Bed</label>
<select name="bed_id"
class="form-control">

@foreach($beds as $id=>$name)
<option value="{{ $id }}">
{{ $name }}
</option>
@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Shift Date</label>
<input type="date"
name="shift_date"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Ward Type</label>
<input type="text"
name="ward_type"
class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Notes</label>
<textarea name="notes"
class="form-control"></textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status"
class="form-control">

<option value="active">
Active
</option>

<option value="inactive">
Inactive
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save Ward Management
</button>

<a href="{{ route('wardmanagement.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection