@extends('adminLayout')
@section('css')
  <link href="/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Complains / Edit #{{$complain->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('complains.update', $complain->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('complain')) has-error @endif">
                       <label for="complain-field">Complain</label>
                    <input type="text" id="complain-field" name="complain" class="form-control" value="{{ $complain->complain }}"/>
                       @if($errors->has("complain"))
                        <span class="help-block">{{ $errors->first("complain") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('h_of_complain')) has-error @endif">
                       <label for="h_of_complain-field">H_of_complain</label>
                    <textarea id="h_of_complain-field" name="h_of_complain" class="form-control" value="{{ $complain->h_of_complain }}"></textarea>
                       @if($errors->has("h_of_complain"))
                        <span class="help-block">{{ $errors->first("h_of_complain") }}</span>
                       @endif
                    </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('complains.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
