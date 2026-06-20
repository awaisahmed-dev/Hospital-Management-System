@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Insurance</h2>

<a href="{{ route('insurances.create') }}"
class="btn btn-success">

Add Insurance

</a>

</div>

<form method="GET"
class="mt-3">

<input type="text"
name="search"
placeholder="Search Insurance"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>Insurance No</th>
<th>Patient</th>
<th>Provider</th>
<th>Policy No</th>
<th>Coverage</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($insurances as $insurance)

<tr>

<td>{{ $insurance->id }}</td>

<td>{{ $insurance->insurance_no }}</td>

<td>
{{ $insurance->patient->first_name ?? '' }}
{{ $insurance->patient->last_name ?? '' }}
</td>

<td>{{ $insurance->provider_name }}</td>

<td>{{ $insurance->policy_no }}</td>

<td>{{ $insurance->coverage_amount }}</td>

<td>{{ $insurance->status }}</td>

<td>

<a href="{{ route('insurances.show',$insurance->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('insurances.edit',$insurance->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('insurances.destroy',$insurance->id) }}"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $insurances->links() }}

@endsection