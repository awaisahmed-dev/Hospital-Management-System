@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between">

<h2>Expenses</h2>

<a href="{{ route('expenses.create') }}"
class="btn btn-success">
Add Expense
</a>

</div>

<form method="GET" class="mt-3">

<input type="text"
name="search"
placeholder="Search Expense"
class="form-control">

</form>

<table class="table table-bordered mt-3">

<tr>
<th>ID</th>
<th>Expense No</th>
<th>Title</th>
<th>Amount</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>
</tr>

@foreach($expenses as $expense)

<tr>

<td>{{ $expense->id }}</td>
<td>{{ $expense->expense_no }}</td>
<td>{{ $expense->expense_title }}</td>
<td>{{ $expense->amount }}</td>
<td>{{ $expense->expense_date }}</td>
<td>{{ $expense->status }}</td>

<td>

<a href="{{ route('expenses.show',$expense->id) }}"
class="btn btn-info btn-sm">
View
</a>

<a href="{{ route('expenses.edit',$expense->id) }}"
class="btn btn-primary btn-sm">
Edit
</a>

<form method="POST"
action="{{ route('expenses.destroy',$expense->id) }}"
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

{{ $expenses->links() }}

@endsection