@extends('layouts.backend')

@section('content')

<h2>Create Bed</h2>

<form method="POST" action="{{ route('beds.store') }}">
@csrf

<div class="row">

<div class="col-md-4">
<label>Room ID</label>
<input type="number" name="room_id" class="form-control">
</div>

<div class="col-md-4">
<label>Bed No</label>
<input type="text" name="bed_no" class="form-control">
</div>

<div class="col-md-4">
<label>Bed Type</label>
<input type="text" name="bed_type" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Daily Charges</label>
<input type="number" step="0.01" name="daily_charges" class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Availability</label>
<select name="availability" class="form-control">
<option value="available">Available</option>
<option value="occupied">Occupied</option>
<option value="maintenance">Maintenance</option>
</select>
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
Save Bed
</button>

<a href="{{ route('beds.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection