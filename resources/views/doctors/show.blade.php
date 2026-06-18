@extends('layouts.backend')

@section('content')

<h2>Doctor Profile</h2>

<table class="table table-bordered">

@foreach($doctor->toArray() as $key => $value)

<tr>
<th>{{ ucfirst(str_replace('_',' ',$key)) }}</th>
<td>{{ $value }}</td>
</tr>

@endforeach

</table>

<a href="{{ route('doctors.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection