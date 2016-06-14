@extends('layout')

@section('content')
    @include('error')
	<table class="table table-bordered">
		<thead>
			<tr>
			<th>no of patients </th>
			<th> day date</th>
			<th>Move all</th>
			<th>Move some</th>
			</tr>
			</thead>
			@for($i=0;$i<sizeof($reserve_array);$i++)
				@if($reserve_array[$i]!=0) 
			
			<tbody>
			<tr>
				<td>{{ $reserve_array[$i] }}</td>
				<td> {{ $date_array[$i] }}</td>
				<td><a  id="allPat" class='btn btn-primary'>Move all</a></td>
				<td><a id="somePat" class='btn btn-danger'>Move some</a></td>
			</tr>
				@endif
			@endfor
			</tbody></table>
			<div id="moveAll"></div>
			<div id="moveSome"></div>
@endsection