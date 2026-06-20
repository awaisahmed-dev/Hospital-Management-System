@extends('layouts.backend')

@section('content')

<h2>Category Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $category->id }}</td>
</tr>

<tr>
<th>Category Name</th>
<td>{{ $category->category_name }}</td>
</tr>

<tr>
<th>Description</th>
<td>{{ $category->description }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $category->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $category->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $category->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $category->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $category->updated_at }}</td>
</tr>

</table>

<a href="{{ route('categories.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection