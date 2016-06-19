@extends('adminLayout')
@section('css')
    <link rel="stylesheet" href="/css/tab.css">
@endsection
@section('header')


    <meta charset="utf-8">
    <title>jQuery UI Accordion - Default functionality</title>
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    {{--<link rel="stylesheet" href="/resources/demos/style.css">--}}
    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>
        $(function() {
            
            $( ".tabs" ).tabs();
        });

        $(function() {
            $( "#accordion" ).accordion();

        });

         $(function() {
            $( "#accordion2" ).accordion();

        })  


        $(document).ready(function(){
            $("#accordion2").fadeIn();
            $("#show").click(function(){
                $("#accordion2").fadeToggle('300');
            });
        });
    </script>
            <script src="/js/examination_validation.js"></script>


@endsection

@section('content')

    <div>
        <h1>

            <i class="glyphicon glyphicon-align-justify"></i> 

                @foreach ($reservations as $reservation)           

                    @if($reservation->status !=4)
        <button type="button" class="btn btn-info pull-right"><a href='/exitReserv/{{$reservation->id}}'style="color:white">Exit Examination</a></button>
        @if($examPatients != null)
        <button type="button" class="btn btn-info pull-right"><a href='/nextReserv/{{$reservation->id}}'style="color:white">Next</a></button>
        @endif
                @endif
                @endforeach

        
        @if($examPatientNo == 0)
        <button type="button" class="btn btn-info pull-right"><a href='/reservation/today'style="color:white">Exit Examination</a></button>
        @endif

{{--        {!! Form::text('date_created',old('date_created', Carbon\Carbon::today()->format('Y-m-d')),['class'=>'form-control date-picker']) !!}--}}
        </h1>

    </div>
    <!-- ************************************************* -->
   <button id="show" class=" btn btn-info glyphicon glyphicon-sort">Medical History</button>
    
    <div id="accordion2">
       <h3>Medical History</h3>
       @if(count($reservation->user->medicalHistories) != 0)
            <div class="tabs">
                <ul>
                    <li><a href="#tabs-1">Surgies</a></li>
                    <li><a href="#tabs-2">Diseases</a></li>
                    <li><a href="#tabs-3">Medicines</a></li>
                </ul>
                <div id="tabs-1">
                    @if(count($reservation->user->medicalHistories) != 0)
                        @foreach($reservation->user->medicalHistories as $history)
                            @if($history->type == 0)
                                <h4>Begined at: {{$history['begin_at']}}</h4>
                                <h4>Details: {{$history->medicalHistoryDetail['description']}}</h4>
                                <hr>

                                
                            @endif
                        @endforeach
                    @endif
                </div>
                <!-- ******************************* -->
                <div id="tabs-2">
                    @if(count($reservation->user->medicalHistories) != 0)

                        @foreach($reservation->user->medicalHistories as $history)
                            @if($history->type == 1)
                                @foreach ($history->medicalHistoryDetail as $detail)
                                    <h4>{{$detail['description']}}</h4><hr/><br/>
                                @endforeach 
                            @endif
                        @endforeach 
                    @endif  
                </div>
                <!-- ************************************************* -->
                <div id="tabs-3">
                    @if(count($reservation->user->medicalHistories) != 0)
                        @foreach($reservation->user->medicalHistories as $history)
                            @if($history->type == 2)
                                @foreach ($history->medicalHistoryDetail as $detail)
                                         <h4>{{$detail['description']}}</h4><hr/><br/>
                                @endforeach 
                            @endif
                        @endforeach
                    @endif
                </div>
                
            </div>
        @endif
        
    </div>

    <!-- ***************************************************** -->
    <div id="accordion">

        <?php $i = 0?>

        @if(count($reservations) != 0)
            @foreach ($reservations as $reservation)
                <?php $i++ ?>

                <h3>{{$reservation->date}}</h3>

                <div class="tabs">
                    <ul>
                        <li><a href="#tabs-{{$i}}1">Complain</a></li>
                        <li><a href="#tabs-{{$i}}2">Examination</a></li>
                        <li><a href="#tabs-{{$i}}3">Glass Examination</a></li>
                        <li><a href="#tabs-{{$i}}4">Prescription</a></li>
                    </ul>
                    @if($i== count($reservations))
                        <div id="tabs-{{$i}}1">
                            @if(count($reservation->complain) != 0)
                                @include("forms.complainUpdate")

                            @endif

                            @if(count($reservation->complain) == 0)
                                @include("forms.complain")
                            @endif
                        </div>
                        <!-- ******************************* -->
                        <div id="tabs-{{$i}}2">

                            @if(count($reservation->examination) != 0)     
                                @include("forms.examinationUpdate")

                            @endif
                            @if(count($reservation->examination) == 0)
                                @include("forms.examination")

                            @endif
                        </div>
                        <!-- ************************************************* -->
                        <div id="tabs-{{$i}}3">
                            @if(count($reservation->examGlass) != 0)
                              @include("forms.examGlassUpdate")
                            @endif

                        </div>
                        <!-- *********************************************** -->
                        <div id="tabs-{{$i}}4">
                            @if(count($reservation->prescription) != 0)
                                @if(count($reservation->prescription->PrescriptionDetails) != 0)
                                    @foreach($reservation->prescription->PrescriptionDetails as $prescriptionDetail)
                                        <table class="table">
                                            <tr>
                                                <th>id</th>
                                                <th>medicine_name</th>
                                                <th>no_times</th>
                                                <th>quantity</th>
                                                <th>duaration</th>
                                                <th>EDIT</th>
                                            <tr>
                                                <td>{{$prescriptionDetail["id"]}}  </td>
                                                <td>{{$prescriptionDetail['medicine_name']}}</td>
                                                <td>{{$prescriptionDetail['no_times']}}</td>
                                                <td>{{$prescriptionDetail['quantity']}}</td>
                                                <td>{{$prescriptionDetail['duaration']}}</td>
                                                <td>
                                                    <a class="btn btn-xs btn-warning"
                                                       href="{{ route('prescription_details.edit', $prescriptionDetail["id"]) }}"><i
                                                                class="glyphicon glyphicon-edit"></i> Edit</a></td>
                                            </tr>
                                        </table>
                                    @endforeach
                                    <a class="btn btn-xs btn-primary"
                                       href='/newPrescriptionDetails/{{$reservation->id}}'><i
                                                class="glyphicon glyphicon-eye-open"></i> New
                                        PRESCRIPTION_DETAIL</a>
                                @else
                                    <a class="btn btn-xs btn-primary"
                                       href='/newPrescriptionDetails/{{$reservation->id}}'><i
                                                class="glyphicon glyphicon-eye-open"></i> New
                                        PRESCRIPTION_DETAIL</a>
                                @endif
                            @else
                                <a class="btn btn-xs btn-primary"
                                   href='/newPrescriptionDetails/{{$reservation->id}}'><i
                                            class="glyphicon glyphicon-eye-open"></i> New PRESCRIPTION_DETAIL</a>
                            @endif
                        </div>
                        <!-- ******************************************************** -->
                    @else
                        <div id="tabs-{{$i}}1">
                            <table class="table table-bordered" border="1px">
                                <tr>
                                    <th>Complain</th>
                                    <th>History of Complain</th>
                                    <th>Diagnose</th>
                                    <th>Plan</th>
                                </tr>

                                    @if(count($reservation->complain) != 0)
                                    <tr>
                                        <td>{{$reservation->complain['complain']}}</td>
                                        <td>{{$reservation->complain['h_of_complain']}}</td>
                                        @if(count($reservation->complain->complainDetail) != 0)
                                            @foreach ($reservation->complain->complainDetail as $detail)
                                                <td>{{$detail['plan']}}</td>
                                                <td>{{$detail['diagnose']}}</td>
                                                
                                            @endforeach
                                        @endif
                                    </tr>
                                    @endif
                            </table>
                        </div>
                        <div id="tabs-{{$i}}2">
                            <table class="table table-bordered">
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
                                @if(count($reservation->examination) != 0)
                                    @foreach($reservation->examination as $exam)
                                    <tr>
                                        <td>
                                            @if($exam['eye_type'] == 0) {{"Right Eye"}}@else {{"Left Eye"}} @endif  </td>
                                        <td>{{$exam['vision']}}</td>
                                        <td>{{$exam['lid']}}</td>
                                        <td>{{$exam['conjunctiva']}}</td>
                                        <td>{{$exam['pupil']}}</td>
                                        <td>{{$exam['a_c']}}</td>
                                        <td>{{$exam['lens']}}</td>
                                        <td>{{$exam['fundus']}}</td>
                                        <td>{{$exam['i_o_p']}}</td>
                                    </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                        <div id="tabs-{{$i}}3">
                            @if(count($reservation->examGlass) != 0)
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Examination Type</th>
                                        <th>sphr</th>
                                        <th>cylr</th>
                                        <th>axisr</th>
                                        <th>sphl</th>
                                        <th>cyll</th>
                                        <th>axisl</th>
                                    </tr>
                                    @foreach ($reservation->examGlass as $exam)
                                        <tr>
                                            <td>{{ $examGlassType[$exam['exam_glass_type']] }}</td>
                                            <td>{{ $exam['sphr'] }}</td>
                                            <td>{{ $exam['cylr'] }}</td>
                                            <td>{{ $exam['axisr'] }}</td>
                                            <td>{{ $exam['sphl'] }}</td>
                                            <td>{{ $exam['cyll'] }}</td>
                                            <td>{{ $exam['axisl'] }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                        </div>
                    @endif
                </div>
            @endforeach
        @else
            <p align="center">There are no Reservations till now</p>
        @endif

@endsection
