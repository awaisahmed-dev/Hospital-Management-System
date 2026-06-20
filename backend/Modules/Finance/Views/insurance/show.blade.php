@extends('layouts.backend')

@section('content')

<h2>Insurance Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $insurance->id }}</td>
</tr>

<tr>
<th>Insurance No</th>
<td>{{ $insurance->insurance_no }}</td>
</tr>

<tr>
<th>Patient</th>
<td>
{{ $insurance->patient->first_name ?? '' }}
{{ $insurance->patient->last_name ?? '' }}
</td>
</tr>

<tr>
<th>Provider Name</th>
<td>{{ $insurance->provider_name }}</td>
</tr>

<tr>
<th>Policy No</th>
<td>{{ $insurance->policy_no }}</td>
</tr>

<tr>
<th>Coverage Amount</th>
<td>{{ $insurance->coverage_amount }}</td>
</tr>

<tr>
<th>Start Date</th>
<td>{{ $insurance->start_date }}</td>
</tr>

<tr>
<th>End Date</th>
<td>{{ $insurance->end_date }}</td>
</tr>

<tr>
<th>Remarks</th>
<td>{{ $insurance->remarks }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $insurance->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $insurance->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $insurance->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $insurance->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $insurance->updated_at }}</td>
</tr>

</table>

<a href="{{ route('insurances.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection