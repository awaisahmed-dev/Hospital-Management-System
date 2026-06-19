@extends('layouts.backend')

@section('content')

<h2>Edit Admission</h2>

<form method="POST"
action="{{ route('admissions.update',$admission->id) }}">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-4">
<label>Admission No</label>
<input type="text"
name="admission_no"
class="form-control"
value="{{ $admission->admission_no }}">
</div>

<div class="col-md-4">
<label>Patient</label>
<select name="patient_id" class="form-control">

@foreach($patients as $id=>$name)

<option value="{{ $id }}"
{{ $admission->patient_id==$id ? 'selected' : '' }}>
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4">
<label>Doctor</label>
<select name="doctor_id" class="form-control">

@foreach($doctors as $id=>$name)

<option value="{{ $id }}"
{{ $admission->doctor_id==$id ? 'selected' : '' }}>
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Room</label>
<select name="room_id" class="form-control">

@foreach($rooms as $id=>$name)

<option value="{{ $id }}"
{{ $admission->room_id==$id ? 'selected' : '' }}>
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Bed</label>
<select name="bed_id" class="form-control">

@foreach($beds as $id=>$name)

<option value="{{ $id }}"
{{ $admission->bed_id==$id ? 'selected' : '' }}>
{{ $name }}
</option>

@endforeach

</select>
</div>

<div class="col-md-4 mt-3">
<label>Admission Date</label>
<input type="date"
name="admission_date"
class="form-control"
value="{{ $admission->admission_date }}">
</div>

<div class="col-md-4 mt-3">
<label>Admission Type</label>
<input type="text"
name="admission_type"
class="form-control"
value="{{ $admission->admission_type }}">
</div>

<div class="col-md-8 mt-3">
<label>Reason</label>
<input type="text"
name="reason"
class="form-control"
value = " {{ $admission->reason }} ">
</div>

<div class="col-md-12 mt-3">
<label>Remarks</label>
<textarea name="remarks"
class="form-control">{{ $admission->remarks }}</textarea>
</div>

<div class="col-md-4 mt-3">
<label>Status</label>

<select name="status" class="form-control">

<option value="admitted"
{{ $admission->status == 'admitted' ? 'selected' : '' }}>
Admitted
</option>

<option value="discharged"
{{ $admission->status == 'discharged' ? 'selected' : '' }}>
Discharged
</option>

<option value="cancelled"
{{ $admission->status == 'cancelled' ? 'selected' : '' }}>
Cancelled
</option>

</select>

</div>

</div>

<br>

<button class="btn btn-success">
Update Admission
</button>

<a href="{{ route('admissions.index') }}"
class="btn btn-secondary">

Back

</a>

</form>

@endsection
