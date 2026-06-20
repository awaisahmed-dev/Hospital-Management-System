@extends('layouts.backend')

@section('content')

<h2>Create Category</h2>

<form method="POST"
action="{{ route('categories.store') }}">

@csrf

<label>Category Name</label>

<input type="text"
name="category_name"
class="form-control">

<br>

<label>Description</label>

<textarea name="description"
class="form-control"></textarea>

<br>

<label>Status</label>

<select name="status"
class="form-control">

<option value="active">
Active
</option>

<option value="inactive">
Inactive
</option>

</select>

<br>

<button class="btn btn-success">
Save Category
</button>

<a href="{{ route('categories.index') }}"
class="btn btn-secondary">
Back
</a>

</form>

@endsection