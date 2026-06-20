@extends('layouts.backend')

@section('content')

<h2>Edit Insurance</h2>

<form method="POST"
action="{{ route('insurances.update',$insurance->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Insurance No</label>
<input type="text"
name="insurance_no"
class="form-control"
value="{{ $insurance->insurance_no }}">
</div>

<div class="col-md-4">

<label>Patient</label>

<select name="patient_id"
class="form-control">

@foreach($patients as $id=>$name)

<option value="{{ $id }}"
{{ $insurance->patient_id==$id ? 'selected':'' }}>

{{ $name }}

</option>

@endforeach

</select>

</div>

<div class="col-md-4">
<label>Provider Name</label>
<input type="text"
name="provider_name"
class="form-control"
value="{{ $insurance->provider_name }}">
</div>

<div class="col-md-4 mt-3">
<label>Policy No</label>
<input type="text"
name="policy_no"
class="form-control"
value="{{ $insurance->policy_no }}">
</div>

<div class="col-md-4 mt-3">
<label>Coverage Amount</label>
<input type="number"
step="0.01"
name="coverage_amount"
class="form-control"
value="{{ $insurance->coverage_amount }}">
</div>

<div class="col-md-4 mt-3">
<label>Start Date</label>
<input type="date"
name="start_date"
class="form-control"
value="{{ $insurance->start_date }}">
</div>

<div class="col-md-4 mt-3">
<label>End Date</label>
<input type="date"
name="end_date"
class="form-control"
value="{{ $insurance->end_date }}">
</div>

<div class="col-md-12 mt-3">

<label>Remarks</label>

<textarea name="remarks"
class="form-control">{{ $insurance->remarks }}</textarea>

</div>

<div class="col-md-4 mt-3">

<label>Status</label>

<select name="status"
class="form-control">

<option value="active"
{{ $insurance->status=='active' ? 'selected':'' }}>
Active
</option>

<option value="expired"
{{ $insurance->status=='expired' ? 'selected':'' }}>
Expired
</option>

<option value="cancelled"
{{ $insurance->status=='cancelled' ? 'selected':'' }}>
Cancelled
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Update Insurance
</button>

<a href="{{ route('insurances.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection