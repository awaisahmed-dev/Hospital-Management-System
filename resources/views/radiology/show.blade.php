@extends('layouts.backend')

@section('content')

<h2>Radiology Profile</h2>

<table class="table table-bordered">

@foreach($radiology->toArray() as $key=>$value)

<tr>
<th>{{ ucfirst(str_replace('_',' ',$key)) }}</th>
<td>{{ $value }}</td>
</tr>

@endforeach

</table>

<a href="{{ route('radiology.index') }}"
class="btn btn-secondary">
Back </a>

@endsection
