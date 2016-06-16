@extends('adminLayout')
@section('css')
    <link href="/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Clinics / Edit #{{$clinic->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('clinics.update', $clinic->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ $clinic->name }}"
                           required/>
                    <span class="help-block"></span>
                    @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('telephone')) has-error @endif">
                    <label for="telephone-field">Telephone</label>
                    <input type="text" id="telephone-field" name="telephone" class="form-control"
                           value="{{ $clinic->telephone }}" required/>
                    <span class="help-block"></span>
                    @if($errors->has("telephone"))
                        <span class="help-block">{{ $errors->first("telephone") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('address')) has-error @endif">
                    <label for="address-field">Address</label>
                    <input type="text" id="address-field" name="address" class="form-control"
                           value="{{ $clinic->address }}" required/>
                    <span class="help-block"></span>
                    @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('clinics.index') }}"><i
                                class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script src="js/clinic.js"></script>
    <script>
        $('.date-picker').datepicker({});
    </script>
@endsection
