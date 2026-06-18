@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Doctor</h2>

<a href="/admin/doctors/create"
class="btn btn-success">

Add Doctor

</a>

</div>

<form class="mt-3">

<input
type="text"
name="search"
class="form-control"
placeholder="Search Doctor">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>ID</th>
<th>Employee No</th>
<th>Name</th>
<th>Phone</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($doctors as $doctor)

<tr>

<td>{{ $doctor->id }}</td>

<td>{{ $doctor->employee_no }}</td>

<td>
{{ $doctor->first_name }}
{{ $doctor->last_name }}
</td>

<td>{{ $doctor->phone }}</td>

<td>{{ $doctor->status }}</td>

<td>

<a href="/admin/doctors/{{$doctor->id}}"
class="btn btn-info btn-sm">

View

</a>

<a href="/admin/doctors/{{$doctor->id}}/edit"
class="btn btn-primary btn-sm">

Edit

</a>

<form
action="/admin/doctors/{{$doctor->id}}"
method="POST"
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

{{ $doctors->links() }}

@endsection