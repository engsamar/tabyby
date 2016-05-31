@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> PreceptionDetails / Edit #{{$preception_detail->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('preception_details.update', $preception_detail->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('medicine_name')) has-error @endif">
                       <label for="medicine_name-field">Medicine_name</label>
                    <input type="text" id="medicine_name-field" name="medicine_name" class="form-control" value="{{ $preception_detail->medicine_name }}"/>
                       @if($errors->has("medicine_name"))
                        <span class="help-block">{{ $errors->first("medicine_name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('no_times')) has-error @endif">
                       <label for="no_times-field">No_times</label>
                    <input type="text" id="no_times-field" name="no_times" class="form-control" value="{{ $preception_detail->no_times }}"/>
                       @if($errors->has("no_times"))
                        <span class="help-block">{{ $errors->first("no_times") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('quantity')) has-error @endif">
                       <label for="quantity-field">Quantity</label>
                    <input type="text" id="quantity-field" name="quantity" class="form-control" value="{{ $preception_detail->quantity }}"/>
                       @if($errors->has("quantity"))
                        <span class="help-block">{{ $errors->first("quantity") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duaration')) has-error @endif">
                       <label for="duaration-field">Duaration</label>
                    <input type="text" id="duaration-field" name="duaration" class="form-control" value="{{ $preception_detail->duaration }}"/>
                       @if($errors->has("duaration"))
                        <span class="help-block">{{ $errors->first("duaration") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('preception_details.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
