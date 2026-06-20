@extends('layouts.backend')

@section('content')

<h2>Edit Category</h2>

<form method="POST"
action="{{ route('categories.update',$category->id) }}">

@csrf
@method('PUT')

<label>Category Name</label>

<input type="text"
name="category_name"
class="form-control"
value="{{ $category->category_name }}">

<br>

<label>Description</label>

<textarea name="description"
class="form-control">{{ $category->description }}</textarea>

<br>

<label>Status</label>

<select name="status"
class="form-control">

<option value="active"
{{ $category->status=='active' ? 'selected' : '' }}>
Active
</option>

<option value="inactive"
{{ $category->status=='inactive' ? 'selected' : '' }}>
Inactive
</option>

</select>

<br>

<button class="btn btn-success">
Update Category
</button>

<a href="{{ route('categories.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection