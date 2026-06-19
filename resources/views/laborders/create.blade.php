@extends('layouts.backend')

@section('content')

<h2>Create Lab Order</h2>

<form method="POST" action="{{ route('laborders.store') }}">
@csrf

<div class="row">

<div class="col-md-4">
<label>Lab Order No</label>
<input type="text"
name="lab_order_no"
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
<label>Test Name</label>
<input type="text"
name="test_name"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Test Category</label>
<input type="text"
name="test_category"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Test Fee</label>
<input type="number"
step="0.01"
name="test_fee"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Order Date</label>
<input type="date"
name="order_date"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Result Date</label>
<input type="date"
name="result_date"
class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Remarks</label>
<textarea name="remarks"
class="form-control"></textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>
<select name="status" class="form-control">
<option value="pending">Pending</option>
<option value="sample_collected">Sample Collected</option>
<option value="processing">Processing</option>
<option value="completed">Completed</option>
<option value="cancelled">Cancelled</option>
</select>
</div>

</div>

<br>

<button class="btn btn-success">
Save Lab Order
</button>

<a href="{{ route('laborders.index') }}"
class="btn btn-secondary">
Back </a>

</form>

@endsection
