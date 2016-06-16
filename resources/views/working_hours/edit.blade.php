@extends('adminLayout')
@section('css')
    <link href="/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')

    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i>{{$working_hour->clinic['name']}} : WorkingHours : Edit : {{$working_hour->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('working_hours.update', $working_hour->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('fromTime')) has-error @endif">
                    <label for="fromTime-field">From</label>
                    <input type="time" id="fromTime-field" name="fromTime" class="form-control"
                           value="{{ $working_hour->fromTime }}"/>
                    @if($errors->has("fromTime"))
                        <span class="help-block">{{ $errors->first("from") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('toTime')) has-error @endif">
                    <label for="toTime-field">To</label>
                    <input type="time" id="toTime-field" name="toTime" class="form-control"
                           value="{{ $working_hour->toTime }}"/>
                    <span id="error" class="help-block"></span>
                    @if($errors->has("toTime"))
                        <span class="help-block">{{ $errors->first("toTime") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('day')) has-error @endif">
                    <label for="day-field">Day</label>
                    {{--<input type="date" id="day-field" name="day" class="form-control" value="{{ $working_hour->day }}"/>--}}
                    <select id="day-field" name="day" class="form-control">
                    @foreach($day as $key=>$types)
                    @if($working_hour->day==$types)
                    <option selected value={{ $types }}>{{ $types }}</option>
                    @else
                    <option value={{ $types }}>{{ $types }}</option>
                    @endif

                    @endforeach
                    </select>
                    @if($errors->has("day"))
                        <span class="help-block">{{ $errors->first("day") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('clinic_id')) has-error @endif">
                    {{--<label for="clinic_id-field">Clinic_name</label>--}}
                    <input type="hidden" id="clinic_id-field" name="clinic_id" class="form-control"
                           value="{{ $working_hour->clinic->id}}"/>
                    @if($errors->has("clinic_id"))
                        <span class="help-block">{{ $errors->first("clinic_id") }}</span>
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('working_hours.index') }}"><i
                                class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/working_hours_validation.js"></script>

    <script>
        $('.date-picker').datepicker({});
    </script>
@endsection
