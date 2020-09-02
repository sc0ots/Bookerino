@extends('layouts.app')

@section('title')Home @endsection

@section('content')
<div class="container">
<div class="row">
<title>User Details</title>
<table>
<thead>
<tr>
<th class="col-md-1">AccountId</th>
<th class="col-md-3">Email</th>
<th class="col-md-4">Full name</th>




</tr>
</thead>
<tbody>
@foreach($users as $u)
<tr>
<td>{{ $u->id }}</td>
<td>{{ $u->email }}</td>
<td>{{ $u->fullname }}</td>

</tr>
@endforeach
</tbody>
</table>
</div>
</div>
@endsection