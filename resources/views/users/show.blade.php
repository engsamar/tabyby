@extends('layout')
@section('css')
    {{--<link rel="stylesheet" href="/css/bootstrap.css">--}}
    {{--<link rel="stylesheet" href="/css/style.css">--}}
    <!-- Font Awesome -->
    {{--<link rel="stylesheet" href="/css/font-awesome.min.css">--}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="/css/ionicons.min.css">
    <!-- Theme style -->
    {{--<link rel="stylesheet" href="/dist/css/AdminLTE.min.css">--}}
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
@endsection
@section('scripts')
    {{--<script src="/plugins/fastclick/fastclick.js"></script>--}}
@endsection
<!-- ******************************** -->
@section('content')

    <br>
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary" id="divProfile">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" id="imgProfile" src="../../dist/img/user4-128x128.jpg"
                         alt="User profile picture">

                    <h3 class="profile-username text-center">{{$user->username}}</h3>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right">{{$user->email}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Age</b> <a class="pull-right">{{$user->birthdate}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Gender</b> <a
                                    class="pull-right">@if($user->gender == 0){{"Male"}}@else {{"Female"}} @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>Telephone</b> <a class="pull-right">{{$user->telephone}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Mobile</b> <a class="pull-right">{{$user->mobile}}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.box -->
            <!-- About Me Box -->
            <div class="box box-primary" id="divProfile">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>
                <!-- /.box-header -->
                <!-- only for Doctor and secretary -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                    <p class="text-muted">
                        ContentOfEducation
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                    <p class="text-muted">{{$user->address}}</p>
                    <hr>
                    <hr>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom" id="dataDiv">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#medicalHistory" data-toggle="tab">MedicalHistory</a></li>
                    <li><a href="#timeline" data-toggle="tab">Prescriptions</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="timeline">
                        <!-- The timeline -->
                        @foreach($reservations as $reservation)
                        <ul class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-red">
                                  {{$reservation->date}}
                                </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                            <i class="fa fa-envelope bg-blue"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                    <h3 class="timeline-header">Medicines</h3>

                                    <div class="timeline-body">
                                        @if(count($reservation->cc) != 0)
                                            @if(count($reservation->cc->ccDetails) != 0)
                                                <table class="table">
                                                    <tr>
                                                        <th>medicine name</th>
                                                        <th>no of times</th>
                                                        <th>quantity</th>
                                                        <th>duaration</th>
                                                    </tr>
                                                    @foreach($reservation->prescription->PrescriptionDetails as $prescriptionDetail)
                                                    <tr>
                                                        <td>{{$prescriptionDetail['medicine_name']}}</td>
                                                        <td>{{$prescriptionDetail['no_times']}}</td>
                                                        <td>{{$prescriptionDetail['quantity']}}</td>
                                                        <td>{{$prescriptionDetail['duaration']}}</td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            @endif                                   
                                        @endif                                  
                                    </div>
                                </div>
                            </li>
                        </ul> 
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                    <!-- ******************************************************** -->
                    <div class="tab-pane" id="timeline">
                        <!-- The timeline -->
                        @foreach($reservations as $reservation)
                        <ul class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-red">
                                  {{$reservation->date}}
                                </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                            <i class="fa fa-envelope bg-blue"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                    <h3 class="timeline-header">Medicines</h3>

                                    <div class="timeline-body">
                                        @if(count($reservation->prescription) != 0)
                                            @if(count($reservation->prescription->PrescriptionDetails) != 0)
                                                <table class="table">
                                                    <tr>
                                                        <th>medicine name</th>
                                                        <th>no of times</th>
                                                        <th>quantity</th>
                                                        <th>duaration</th>
                                                    </tr>
                                                    @foreach($reservation->prescription->PrescriptionDetails as $prescriptionDetail)
                                                    <tr>
                                                        <td>{{$prescriptionDetail['medicine_name']}}</td>
                                                        <td>{{$prescriptionDetail['no_times']}}</td>
                                                        <td>{{$prescriptionDetail['quantity']}}</td>
                                                        <td>{{$prescriptionDetail['duaration']}}</td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            @endif                                   
                                        @endif                                  
                                    </div>
                                </div>
                            </li>
                        </ul> 
                        @endforeach
                    </div>
                    <!-- ******************************************************************** -->
                    <!-- /.tab-pane -->
                    <!-- edit profile -->
                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience"
                                              placeholder="Experience"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



@endsection