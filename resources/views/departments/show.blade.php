@extends('layouts.backend')

@section('content')

<h2>Department Profile</h2>

<table class="table table-bordered">

@foreach($department->toArray() as $key => $value)

<tr>
<th>{{ ucfirst(str_replace('_',' ',$key)) }}</th>
<td>{{ $value }}</td>
</tr>

@endforeach

</table>

<a href="{{ route('departments.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection