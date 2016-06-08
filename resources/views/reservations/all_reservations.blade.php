@extends('layout')
@section('css')
	<link rel="stylesheet" href="/css/tab.css">
@endsection
@section('header')
	  <meta charset="utf-8">
	  <title>jQuery UI Accordion - Default functionality</title>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  <link rel="stylesheet" href="/resources/demos/style.css">
	  <script>
	  $(function() {
	    $( "#accordion" ).accordion();
	  });
	  </script>
@endsection
@section('content')
<div id="accordion">
<pre>

{{$length = count($arr)}}
@foreach ($arr as $key => $my_array)
	@foreach($my_array as $key => $val)
		{{var_dump($key)}}
		<pre>
		{{$val}}
		

	@endforeach
	{{die()}}
@endforeach
{{die()}}



@foreach ($arr as $my_array)
	@foreach($my_array as $key => $val)
	  <h3>{{454}}</h3>
		<div>
		    <div id="container">		 
			    <input id="tab-3" type="radio" name="tab-group" />
			    <label for="tab-3">Complains</label>

			    <input id="tab-4" type="radio" name="tab-group" />
			    <label for="tab-4">Examinatoins</label>

			    <input id="tab-5" type="radio" name="tab-group" />
			    <label for="tab-5">Prescriptions</label>
			    <div id="content">
				    <div id="content-3">
		            <a class="btn btn-xs btn-primary" href='/newComplain/{{$reservation->id}}}'><i class="glyphicon glyphicon-eye-open"></i> New Complain</a>
		                <table class="table" border="1px">
		                <tr><th>Complain</th><th>History of Complain</th><th>Diagnose</th><th>Plan</th></tr>
		                <!-- {{count($complains)}} -->
		                    @foreach($complains as $complain)    
		                        <tr>
		                            <td>{{$complain->complain}}</td>
		                            <td>{{$complain->h_of_complain}}</td>
		                            <td>{{$complain->diagnose}}</td>
		                            <td>{{$complain->plan}}</td>
		                        </tr>
		                    @endforeach
		                </table>
		            </div>
		            <div id="content-4">
	            	<a class="btn btn-xs btn-primary" href='/newExamination/{{$reservation->id}}'><i class="glyphicon glyphicon-eye-open"></i> New Examination</a>
	                <table class="table" >
	                <tr><th>Eye</th><th>vision</th><th>Lid</th><th>Conjunctiva</th><th>Pupil</th><th>A/C</th><th>Lens</th><th>Fundus</th><th>I.O.P</th>
	                    <tr>    
	                    {{count($examinations)}}
	                    @foreach($examinations as $exam) 
	                        <td>{{$exam->eye_type}}  </td>
	                        <td>{{$exam->vision}}</td>
	                        <td>{{$exam->lid}}</td>
	                        <td>{{$exam->conjunctiva}}</td>
	                        <td>{{$exam->pupil}}</td>
	                        <td>{{$exam->a_c}}</td>
	                        <td>{{$exam->lens}}</td>
	                        <td>{{$exam->fundus}}</td>
	                        <td>{{$exam->i_o_p}}</td>
	                    </tr>
	                    @endforeach
	                </table>
	            </div>
				</div>
			</div>
		</div>
	@endforeach
	@endforeach

</div>
@endsection
</body>
</html>
