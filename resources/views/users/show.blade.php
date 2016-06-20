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
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <form action="{{ route('users.update', $user->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group @if($errors->has('username')) has-error @endif">
                                           <label for="username-field">Username</label>
                                        <input type="text" id="username-field" name="username" class="form-control" value="{{ $user->username }}" required/>
                                        <span id="error" class="help-block"></span>
                                           @if($errors->has("username"))
                                            <span class="help-block">{{ $errors->first("username") }}</span>
                                           @endif
                                        </div>
                                        <div class="form-group @if($errors->has('email')) has-error @endif">
                                           <label for="email-field">Email</label>
                                        <input type="text" id="email-field" name="email" class="form-control" value="{{ $user->email }}" required/>
                                            <span id="error" class="help-block"></span>
                                           @if($errors->has("email"))
                                            <span class="help-block">{{ $errors->first("email") }}</span>
                                           @endif
                                        </div>

                                        <div hidden class="form-group @if($errors->has('password')) has-error @endif">
                                           <label for="password-field">Password</label>
                                        <input type="text" id="password-field" name="password" class="form-control" value="{{ $user->password }}"/>
                                           @if($errors->has("password"))
                                            <span class="help-block">{{ $errors->first("password") }}</span>
                                           @endif
                                        </div>


                                        <div class="form-group @if($errors->has('address')) has-error @endif">
                                           <label for="address-field">Address</label>
                                        <input type="text" id="address-field" name="address" class="form-control" value="{{ $user->address }}"/>
                                           @if($errors->has("address"))
                                            <span class="help-block">{{ $errors->first("address") }}</span>
                                           @endif
                                        </div>
                                        <div class="form-group @if($errors->has('telephone')) has-error @endif">
                                           <label for="telephone-field">Telephone</label>
                                        <input type="text" id="telephone-field" name="telephone" class="form-control" value="{{ $user->telephone }}"/>
                                           @if($errors->has("telephone"))
                                            <span class="help-block">{{ $errors->first("telephone") }}</span>
                                           @endif
                                        </div>
                                        <div class="form-group @if($errors->has('mobile')) has-error @endif">
                                           <label for="mobile-field">Mobile</label>
                                        <input type="text" id="mobile-field" name="mobile" class="form-control" value="{{ $user->mobile }}"/>
                                           @if($errors->has("mobile"))
                                            <span class="help-block">{{ $errors->first("mobile") }}</span>
                                           @endif
                                        </div>
                                        <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                                           <label for="birthdate-field">Birthdate</label>
                                        <input type="text" id="birthdate-field" name="birthdate" class="form-control datepicker" value="{{ $user->birthdate }}" required/>
                                           @if($errors->has("birthdate"))
                                            <span class="help-block">{{ $errors->first("birthdate") }}</span>
                                           @endif
                                        </div>
                                    <div class="well well-sm">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a class="btn btn-link pull-right" href="{{ route('users.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                                    </div>
                                </form>

                            </div>
                        </div>
<!-- ********************************* -->
                        
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

<script src="/js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="/css/jquery-ui.css">

<script type="text/javascript">

$("input[name='birthdate']").datepicker({
    dateFormat: "yy/mm/dd",
    minDate: "-3500w",
    maxDate: "-1d"
});

</script>
