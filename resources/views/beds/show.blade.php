@extends('layouts.backend')

@section('content')

<h2>Bed Profile</h2>

<table class="table table-bordered">

@foreach($bed->toArray() as $key => $value)

<tr>
<th>{{ ucfirst(str_replace('_',' ',$key)) }}</th>
<td>{{ $value }}</td>
</tr>

@endforeach

</table>

<a href="{{ route('beds.index') }}"
class="btn btn-secondary">
Back
</a>

@endsection