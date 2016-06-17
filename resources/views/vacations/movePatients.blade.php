@extends('layout')

@section('content')
    @include('error')
	<table class="table table-bordered">
		<thead>
			<tr>
			<th>patient name</th>
			<th> original  date</th>
			<th> move to date </th>
			</tr>
			</thead>
			<tbody>
			<tr>
			@foreach($pat_data as $pat_deta)
				<td>{{ $pat_deta->username}}</td>
				<td> <input class="form-control oldDate" data-rowdate="{{$date}}+{{$pat_deta->id}}" value="{{ $date }}" readonly="readonly">
				</td>
				<td><div id="gdeed"><input type="text" id="mveSme" class="form-control date-picker mveSme" /></div></td>
			</tr>
	@endforeach
			</tbody></table>


			@if($pat_free)
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Date</th>
						<th>no of reserved patients</th>
						<th> free available  </th>
					</tr>
				</thead>
				<tbody>	
					@foreach($pat_no as $index => $nom)
					<tr>
						<td>{{ $pat_date[$index] }}</td>
						<td>{{$nom}}</td>
						<td>{{ $pat_free[$index] }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			@endif
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    var dateToday = new Date();
    $(".mveSme").datepicker({
     startDate: dateToday,
    });

  </script>
    <script type="text/javascript"  src="/js/movePat.js"></script>

@endsection