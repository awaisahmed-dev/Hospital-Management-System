@extends('layouts.backend')

@section('content')

<h2>Create Radiology</h2>

<form method="POST" action="{{ route('radiology.store') }}">
@csrf

<div class="row">

<div class="col-md-4">
<label>Radiology No</label>
<input type="text"
name="radiology_no"
class="form-control">
</div>

<div class="col-md-4">
<label>Consultation</label>
<select name="consultation_id" class="form-control">
<option value="">Select Consultation</option>
@foreach($consultations as $id=>$name)
<option value="{{ $id }}">{{ $name }}</option>
@endforeach
</select>
</div>

<div class="col-md-4">
<label>Patient</label>
<select name="patient_id" class="form-control">
@foreach($patients as $id=>$name)
<option value="{{ $id }}">{{ $name }}</option>
@endforeach
</select>
</div>

<div class="col-md-4 mt-3">
<label>Doctor</label>
<select name="doctor_id" class="form-control">
@foreach($doctors as $id=>$name)
<option value="{{ $id }}">{{ $name }}</option>
@endforeach
</select>
</div>

<div class="col-md-4 mt-3">
<label>Scan Name</label>
<input type="text"
name="scan_name"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Scan Type</label>
<input type="text"
name="scan_type"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Scan Fee</label>
<input type="number"
step="0.01"
name="scan_fee"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Order Date</label>
<input type="date"
name="order_date"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Report Date</label>
<input type="date"
name="report_date"
class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Findings</label>
<textarea name="findings"
class="form-control"></textarea>
</div>

<div class="col-md-12 mt-3">
<label>Impression</label>
<textarea name="impression"
class="form-control"></textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>
<select name="status" class="form-control">
<option value="pending">Pending</option>
<option value="scheduled">Scheduled</option>
<option value="completed">Completed</option>
<option value="cancelled">Cancelled</option>
</select>
</div>

</div>

<br>

<button class="btn btn-success">
Save Radiology
</button>

<a href="{{ route('radiology.index') }}"
class="btn btn-secondary">
Back </a>

</form>

@endsection
