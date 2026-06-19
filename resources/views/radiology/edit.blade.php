@extends('layouts.backend')

@section('content')

<h2>Edit Radiology</h2>

<form method="POST"
action="{{ route('radiology.update',$radiology->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Radiology No</label>
<input type="text"
name="radiology_no"
class="form-control"
value="{{ $radiology->radiology_no }}">
</div>

<div class="col-md-4">
<label>Consultation</label>
<select name="consultation_id" class="form-control">

@foreach($consultations as $id=>$name)

<option value="{{ $id }}"
{{ $radiology->consultation_id==$id ? 'selected':'' }}>
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4">
<label>Patient</label>
<select name="patient_id" class="form-control">

@foreach($patients as $id=>$name)

<option value="{{ $id }}"
{{ $radiology->patient_id==$id ? 'selected':'' }}>
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Doctor</label>
<select name="doctor_id" class="form-control">

@foreach($doctors as $id=>$name)

<option value="{{ $id }}"
{{ $radiology->doctor_id==$id ? 'selected':'' }}>
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Scan Name</label>
<input type="text"
name="scan_name"
class="form-control"
value="{{ $radiology->scan_name }}">
</div>

<div class="col-md-4 mt-3">
<label>Scan Type</label>
<input type="text"
name="scan_type"
class="form-control"
value="{{ $radiology->scan_type }}">
</div>

<div class="col-md-4 mt-3">
<label>Scan Fee</label>
<input type="number"
step="0.01"
name="scan_fee"
class="form-control"
value="{{ $radiology->scan_fee }}">
</div>

<div class="col-md-4 mt-3">
<label>Order Date</label>
<input type="date"
name="order_date"
class="form-control"
value="{{ $radiology->order_date }}">
</div>

<div class="col-md-4 mt-3">
<label>Report Date</label>
<input type="date"
name="report_date"
class="form-control"
value="{{ $radiology->report_date }}">
</div>

<div class="col-md-12 mt-3">
<label>Findings</label>
<textarea name="findings"
class="form-control">{{ $radiology->findings }}</textarea>
</div>

<div class="col-md-12 mt-3">
<label>Impression</label>
<textarea name="impression"
class="form-control">{{ $radiology->impression }}</textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status" class="form-control">

<option value="pending"
{{ $radiology->status=='pending'?'selected':'' }}>
Pending
</option>

<option value="scheduled"
{{ $radiology->status=='scheduled'?'selected':'' }}>
Scheduled
</option>

<option value="completed"
{{ $radiology->status=='completed'?'selected':'' }}>
Completed
</option>

<option value="cancelled"
{{ $radiology->status=='cancelled'?'selected':'' }}>
Cancelled
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Update Radiology
</button>

<a href="{{ route('radiology.index') }}"
class="btn btn-secondary">
Back </a>

</form>

@endsection
