@extends('layouts.backend')

@section('content')

<h2>Specialization Profile</h2>

<table class="table table-bordered">

@foreach($specialization->toArray() as $key=>$value)

<tr>
<th>{{ ucfirst(str_replace('_',' ',$key)) }}</th>
<td>{{ $value }}</td>
</tr>

@endforeach

</table>

<a href="{{ route('specializations.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection