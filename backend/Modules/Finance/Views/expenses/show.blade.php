@extends('layouts.backend')

@section('content')

<h2>Expense Details</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td>{{ $expense->id }}</td>
</tr>

<tr>
<th>Expense No</th>
<td>{{ $expense->expense_no }}</td>
</tr>

<tr>
<th>Title</th>
<td>{{ $expense->expense_title }}</td>
</tr>

<tr>
<th>Amount</th>
<td>{{ $expense->amount }}</td>
</tr>

<tr>
<th>Date</th>
<td>{{ $expense->expense_date }}</td>
</tr>

<tr>
<th>Remarks</th>
<td>{{ $expense->remarks }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $expense->status }}</td>
</tr>

<tr>
<th>Created By</th>
<td>{{ $expense->created_by }}</td>
</tr>

<tr>
<th>Updated By</th>
<td>{{ $expense->updated_by }}</td>
</tr>

<tr>
<th>Created At</th>
<td>{{ $expense->created_at }}</td>
</tr>

<tr>
<th>Updated At</th>
<td>{{ $expense->updated_at }}</td>
</tr>

</table>

<a href="{{ route('expenses.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection