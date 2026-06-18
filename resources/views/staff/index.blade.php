@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Staff Management</h2>

<a href="{{ route('staff.create') }}"
class="btn btn-success">
Add Staff
</a>

</div>

<form method="GET" class="mt-3">

<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="Search Staff"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>Employee No</th>
<th>Name</th>
<th>Phone</th>
<th>Designation</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($staff as $row)

<tr>

<td>{{ $row->employee_no }}</td>

<td>
{{ $row->first_name }}
{{ $row->last_name }}
</td>

<td>{{ $row->phone }}</td>

<td>{{ $row->designation }}</td>

<td>{{ $row->status }}</td>

<td>

<a href="{{ route('staff.show',$row->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('staff.edit',$row->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form
action="{{ route('staff.destroy',$row->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button
onclick="return confirm('Delete Staff?')"
class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $staff->links() }}

@endsection