@extends('layouts.backend')

@section('content')

<h2>Create Admission</h2>

<form method="POST" action="{{ route('admissions.store') }}">
@csrf

<div class="row">

<div class="col-md-4">
<label>Admission No</label>
<input type="text"
name="admission_no"
class="form-control">
</div>

<div class="col-md-4">
<label>Patient</label>
<select name="patient_id" class="form-control">

@foreach($patients as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4">
<label>Doctor</label>
<select name="doctor_id" class="form-control">

@foreach($doctors as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Room</label>
<select name="room_id" class="form-control">

<option value="">
Select Room
</option>

@foreach($rooms as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Bed</label>
<select name="bed_id" class="form-control">

<option value="">
Select Bed
</option>

@foreach($beds as $id=>$name)

<option value="{{ $id }}">
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Admission Date</label>
<input type="date"
name="admission_date"
class="form-control">
</div>

<div class="col-md-4 mt-3">
<label>Admission Type</label>
<input type="text"
name="admission_type"
class="form-control">
</div>

<div class="col-md-8 mt-3">
<label>Reason</label>
<input type="text"
name="reason"
class="form-control">
</div>

<div class="col-md-12 mt-3">
<label>Remarks</label>
<textarea name="remarks"
class="form-control"></textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status"
class="form-control">

<option value="admitted">
Admitted
</option>

<option value="discharged">
Discharged
</option>

<option value="cancelled">
Cancelled
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Save Admission
</button>

<a href="{{ route('admissions.index') }}"
class="btn btn-secondary">
Back </a>

</form>

@endsection
