@extends(( (isset(Auth::user()->id) and Auth::user()->userRoles[0]->type==1 )or ( isset(Auth::user()->id) and Auth::user()->userRoles[0]->type==0)) ? 'adminLayout' : 'layout')
@section('css')
  <link href="/css/bootstrap-datepicker.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/jquery-ui.css">  <!--date-->
@endsection
@section('header')
@endsection

@section('content')
    @include('error')

    <div class="row">

        <div class="col-md-12">
            <h1><i class="glyphicon glyphicon-edit"></i> Reservations / Edit #{{$reservation->id}}</h1>
            <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('date')) has-error @endif">
                       <label for="date-field">Date</label>
                    <input type="text" id="date-field" name="date" class="form-control date-picker" value="{{ $reservation->date }}"/>
                       @if($errors->has("date"))
                        <span class="help-block">{{ $errors->first("date") }}</span>
                       @endif
                    </div>
                    <div hidden class="form-group @if($errors->has('status')) has-error @endif">
                       <label for="status-field">Status</label>
                    <input type="text" id="status-field" name="status" class="form-control" value="{{ $reservation->status }}"/>
                       @if($errors->has("status"))
                        <span class="help-block">{{ $errors->first("status") }}</span>
                       @endif
                    </div>
                    <div hidden class="form-group @if($errors->has('user_id')) has-error @endif">
                       <label for="user_id-field">User_id</label>
                    <input type="text" id="user_id-field" name="user_id" class="form-control" value="{{ $reservation->user_id }}"/>
                       @if($errors->has("user_id"))
                        <span class="help-block">{{ $errors->first("user_id") }}</span>
                       @endif
                    </div>
                    <div hidden class="form-group @if($errors->has('clinic_id')) has-error @endif">
                       <label for="clinic_id-field">Clinic_id</label>
                    <input type="text" id="clinic_id-field" name="clinic_id" class="form-control" value="{{ $reservation->clinic_id }}"/>
                       @if($errors->has("clinic_id"))
                        <span class="help-block">{{ $errors->first("clinic_id") }}</span>
                       @endif
                    </div>
                    <div hidden class="form-group @if($errors->has('reservation_type_id')) has-error @endif">
                       <label for="reservation_type_id-field">Reservation_type_id</label>
                    <input type="text" id="reservation_type_id-field" name="reservation_type_id" class="form-control" value="{{ $reservation->reservation_type_id }}"/>
                       @if($errors->has("reservation_type_id"))
                        <span class="help-block">{{ $errors->first("reservation_type_id") }}</span>
                       @endif
                    </div>
                    <div hidden class="form-group @if($errors->has('parent_reservation_id')) has-error @endif">
                       <label for="parent_reservation_id-field">Parent_reservation_id</label>
                    <input type="text" id="parent_reservation_id-field" name="parent_reservation_id" class="form-control" value="{{ $reservation->parent_reservation_id }}"/>
                       @if($errors->has("parent_reservation_id"))
                        <span class="help-block">{{ $errors->first("parent_reservation_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">update</button>
                    <a class="btn btn-link pull-right" href="{{ route('reservations.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
  @section('scripts')
      <script src="/js/jquery-ui.min.js"></script> <!--date-->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>--}}
    <script>
        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
        $('.date-picker').datepicker({
            dateFormate:'yyyy/mm/dd ',
            startDate: today,
        });
        $("input[name='date']").keypress(function (event) {
            event.preventDefault();
        });
    </script>
    @endsection
