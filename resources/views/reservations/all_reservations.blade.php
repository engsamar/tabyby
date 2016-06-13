@extends('adminLayout')
@section('css')
    <link rel="stylesheet" href="/css/tab.css">
@endsection
@section('header')
    <meta charset="utf-8">
    <title>jQuery UI Accordion - Default functionality</title>
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <script src="/js/jquery-1.11.2.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function () {
            $("#accordion").accordion();
        });
    </script>
@endsection

@section('content')
    <div id="accordion">
    {{$i = 0}}
        @foreach ($reservations as $reservation)
            {{$i++}}
            <h3>{{$reservation->date}}</h3>
                <div id="container">
                    <input id="tab-1" type="radio" name="tab-group"/>
                    <label for="tab-1">Complains</label>

                    <input id="tab-2" type="radio" name="tab-group"/>
                    <label for="tab-2">Examinations</label>

                    <input id="tab-3" type="radio" name="tab-group"/>
                    <label for="tab-3">Glass Examination</label>

                    <input id="tab-4" type="radio" name="tab-group"/>
                    <label for="tab-4">Prescriptions</label>


                    <div id="content">
                    @if($i== count($reservations))
                       {{"uhuhuuhu"}}
                        <div id="content-1">
                             <a class="btn btn-xs btn-primary" href='/newComplain/{{$reservation->id}}'><i class="glyphicon glyphicon-eye-open"></i> New Complain</a>
                            
                        </div>
                        <div id="content-2">
                             <a class="btn btn-xs btn-primary" href='/insertExamination/{{$reservation->id}}'><i class="glyphicon glyphicon-eye-open"></i> New Examination</a>
                        </div>
                        <div id="content-3">
                               <a class="btn btn-xs btn-primary" href='/createExamGlassHome/{{$reservation->id}}'><i
                            class="glyphicon glyphicon-eye-open"></i> New Glass Examination</a>
                        </div>

                        
                        <div id="content-4">
                            <a class="btn btn-xs btn-primary" href='/newPrescriptionDetails/{{$reservation->id}}'><i
                            class="glyphicon glyphicon-eye-open"></i> New PRESCRIPTION</a>
                        </div>

                    @else
                        <div id="content-1">
                            <table class="table" border="1px">
                                <tr>
                                    <th>Complain</th>
                                    <th>History of Complain</th>
                                    <th>Diagnose</th>
                                    <th>Plan</th>
                                </tr>
                                <tr>
                                    <td>{{$reservation->complain['complain']}}</td>
                                    <td>{{$reservation->complain['h_of_complain']}}</td>
                                    @foreach ($reservation->complain->complainDetail as $detail)
                                        <td>{{$detail['plan']}}</td>
                                        <td>{{$detail['diagnose']}}</td>      
                                    @endforeach
                                </tr>
                            </table>
                        </div>
                        <div id="content-2">
                            <table class="table">
                                <tr>
                                    <th>Eye</th>
                                    <th>vision</th>
                                    <th>Lid</th>
                                    <th>Conjunctiva</th>
                                    <th>Pupil</th>
                                    <th>A/C</th>
                                    <th>Lens</th>
                                    <th>Fundus</th>
                                    <th>I.O.P</th>
                                <tr>
                                    <td>{{$reservation->examination['eye_type']}}  </td>
                                    <td>{{$reservation->examination['vision']}}</td>
                                    <td>{{$reservation->examination['lid']}}</td>
                                    <td>{{$reservation->examination['conjunctiva']}}</td>
                                    <td>{{$reservation->examination['pupil']}}</td>
                                    <td>{{$reservation->examination['a_c']}}</td>
                                    <td>{{$reservation->examination['lens']}}</td>
                                    <td>{{$reservation->examination['fundus']}}</td>
                                    <td>{{$reservation->examination['i_o_p']}}</td>
                                </tr>
                            </table>
                        </div>  
                        <div id="content-3">
                            
                        </div>

                        <div id="content-4">
                            
                        </div>
                    @endif
                    </div>
                </div>
        @endforeach
    </div>
@endsection
</body>
</html>