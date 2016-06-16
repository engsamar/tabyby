@extends('adminLayout')
@section('css')
    <link href="/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Medicines / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('medicines.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                    <span class="help-block"></span>
                    @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('type')) has-error @endif">
                    <label for="type-field">Type</label>
                    {{--<input type="text" id="type-field" name="type" class="form-control" value="{{ old("type") }}"/>--}}
                    <select id="type-field" name="type" class="form-control">
                        @foreach($medicineType as $key=>$value)
                            <option value={{ $key }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @if($errors->has("type"))
                        <span class="help-block">{{ $errors->first("type") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('constituent')) has-error @endif">
                    <label for="constituent-field">Active_constituent</label>
                    {{--<input type="text" id="constituent-field" name="constituent" class="form-control" value="{{ old("constituent") }}"/>--}}
                    <select id="constituent-field" name="constituent" class="form-control">
                        @foreach($constituent as $value)
                            <option value={{ $value->id }}>{{ $value->active_consistitue }}</option>
                        @endforeach
                    </select>
                    @if($errors->has("constituent"))
                        <span class="help-block">{{ $errors->first("constituent") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('company')) has-error @endif">
                    <label for="company-field">Company</label>
                    <input type="text" id="company-field" name="company" class="form-control"
                           value="{{ old("company") }}"/>
                    @if($errors->has("company"))
                        <span class="help-block">{{ $errors->first("company") }}</span>
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('medicines.index') }}"><i
                                class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/medicine.js"></script>
    <script>
        $('.date-picker').datepicker({});
    </script>
@endsection
