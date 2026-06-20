@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Categories</h2>

<a href="{{ route('categories.create') }}"
class="btn btn-success">

Add Category

</a>

</div>

<form method="GET"
class="mt-3">

<input type="text"
name="search"
placeholder="Search Category"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>

<th>ID</th>
<th>Name</th>
<th>Status</th>
<th>Action</th>

</tr>

@foreach($categories as $category)

<tr>

<td>{{ $category->id }}</td>

<td>{{ $category->category_name }}</td>

<td>{{ $category->status }}</td>

<td>

<a href="{{ route('categories.show',$category->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('categories.edit',$category->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('categories.destroy',$category->id) }}"
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

{{ $categories->links() }}

@endsection