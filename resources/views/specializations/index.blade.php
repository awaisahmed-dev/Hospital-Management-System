@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Specialization</h2>

<a href="{{ route('specializations.create') }}"
class="btn btn-success">
Add Specialist
</a>

</div>

<form method="GET" class="mt-3">

<input
type="text"
name="search"
placeholder="Search Specialist"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>Specialization Code</th>
<th>Name</th>
<th>Consultation Fee</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($specializations as $specialization)

<tr>

<td>{{ $specialization->specialization_code }}</td>

<td>
{{ $specialization->name }}
</td>

<td>{{ $specialization->description }}</td>

<td>{{ $specialization->status }}</td>

<td>

<a href="{{ route('specializations.show',$specialization->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('specializations.edit',$specialization->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form
action="{{ route('specializations.destroy',$specialization->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<!-- <button class="btn btn-danger btn-sm">
Delete
</button> -->
<button
onclick="return confirm('Delete this specialization?')"
class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $specializations->links() }}

@endsection