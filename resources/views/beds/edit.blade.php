@extends('layouts.backend')

@section('content')

<h2>Edit Bed</h2>

<form method="POST"
action="{{ route('beds.update',$bed->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Room ID</label>
<input type="number"
name="room_id"
class="form-control"
value="{{ $bed->room_id }}">
</div>

<div class="col-md-4">
<label>Bed No</label>
<input type="text"
name="bed_no"
class="form-control"
value="{{ $bed->bed_no }}">
</div>

<div class="col-md-4">
<label>Bed Type</label>
<input type="text"
name="bed_type"
class="form-control"
value="{{ $bed->bed_type }}">
</div>

<div class="col-md-4 mt-3">
<label>Daily Charges</label>
<input type="number"
step="0.01"
name="daily_charges"
class="form-control"
value="{{ $bed->daily_charges }}">
</div>

<div class="col-md-4 mt-3">
<label>Availability</label>

<select name="availability" class="form-control">

<option value="available"
{{ $bed->availability=='available'?'selected':'' }}>
Available
</option>

<option value="occupied"
{{ $bed->availability=='occupied'?'selected':'' }}>
Occupied
</option>

<option value="maintenance"
{{ $bed->availability=='maintenance'?'selected':'' }}>
Maintenance
</option>

</select>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status" class="form-control">

<option value="active"
{{ $bed->status=='active'?'selected':'' }}>
Active
</option>

<option value="inactive"
{{ $bed->status=='inactive'?'selected':'' }}>
Inactive
</option>

</select>
</div>

</div>

<br>

<button class="btn btn-success">
Update Bed
</button>
<a href="{{ route('beds.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection