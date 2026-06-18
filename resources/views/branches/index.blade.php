@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Branches</h2>

<a href="{{ route('branches.create') }}"
class="btn btn-success">
Add Branch </a>

</div>

<form method="GET" class="mt-3">

<input
type="text"
name="search"
placeholder="Search Branch"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>Code</th>
<th>Name</th>
<th>Phone</th>
<th>City</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($branches as $branch)

<tr>

<td>{{ $branch->branch_code }}</td>
<td>{{ $branch->name }}</td>
<td>{{ $branch->phone }}</td>
<td>{{ $branch->city }}</td>
<td>{{ $branch->status }}</td>

<td>

<a href="{{ route('branches.show',$branch->id) }}"
class="btn btn-info btn-sm">
View </a>

<a href="{{ route('branches.edit',$branch->id) }}"
class="btn btn-primary btn-sm">
Edit </a>

<form
action="{{ route('branches.destroy',$branch->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button
onclick="return confirm('Delete this branch?')"
class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $branches->links() }}

@endsection
