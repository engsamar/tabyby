@extends('adminLayout')
@section('css')
    <link href="/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> PrescriptionDetails / Edit #{{$prescription_detail->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('prescription_details.update', $prescription_detail->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="res_id" value="{{ $res_id }}">
                <div class="form-group @if($errors->has('search_by')) has-error @endif">
                    <label for="search_by-field">Search_by</label>
                    <select id="search_by-field" name="search_by" class="form-control">
                        <option value="1">NAME</option>
                        <option value="2">ACTIVE CONSTITUENT</option>
                    </select>
                    @if($errors->has("search_by"))
                        <span class="help-block">{{ $errors->first("search_by") }}</span>
                    @endif
                </div>

                <div id="type" class="form-group @if($errors->has('type')) has-error @endif">
                    <label for="type-field">Medicine_type</label>
                    <select id="type-field" name="type" class="form-control">
                        <option value="-1">ALL TYPES</option>
                        @foreach($medicineType as $key=>$value)
                            @if($medicine->type==$key)
                                <option selected value={{ $value[$medicine->type] }}>{{ $value }}</option>
                            @else
                                <option value={{ $key }}>{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has("type"))
                        <span class="help-block">{{ $errors->first("type") }}</span>
                    @endif
                </div>

                <div id="active_div1" class="form-group @if($errors->has('active_constituent')) has-error @endif">
                    <label for="active_constituent-field">active_constituent</label>
                    <input list="active" id="active_constituent-field" name="active_constituent" class="form-control"
                           required/>
                    <datalist id="active">
                        <option value="{{$prescription_detail->active_constituent}}"></option>
                    </datalist>
                    @if($errors->has("active_constituent"))
                        <span class="help-block">{{ $errors->first("active_constituent") }}</span>
                    @endif
                </div>

                <div id="active_div2" class="form-group @if($errors->has('medicines_name')) has-error @endif">
                    <label for="medicines_name-field">Medicine_name</label>
                    <select id="medicines_name-field" name="medicines_name" class="form-control"
                    >
                        <option value="{{$prescription_detail->medicine_id}}">{{ $prescription_detail->medicine_name }}</option>
                    </select>

                    @if($errors->has("medicines_name"))
                        <span class="help-block">{{ $errors->first("medicines_name") }}</span>
                    @endif
                </div>

                <div id="medicine_name" class="form-group @if($errors->has('medicine_name')) has-error @endif">
                    <label id="name" for="medicine_name-field">Medicine_name</label>
                    <input list="results" id="medicine_name-field" name="medicine_name" class="form-control"
                           required/>
                    <datalist id="results">
                        <option value="{{$prescription_detail->medicine_name}}"></option>
                    </datalist>
                    @if($errors->has("medicine_name"))
                        <span class="help-block">{{ $errors->first("medicine_name") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('no_times')) has-error @endif">
                    <label for="no_times-field">No_times</label>
                    <input type="text" id="no_times-field" name="no_times" class="form-control"
                           value="{{ $prescription_detail->no_times }}" required/>
                    @if($errors->has("no_times"))
                        <span class="help-block">{{ $errors->first("no_times") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('quantity')) has-error @endif">
                    <label for="quantity-field">Quantity</label>
                    <input type="text" id="quantity-field" name="quantity" class="form-control"
                           value="{{ $prescription_detail->quantity }}" required/>
                    @if($errors->has("quantity"))
                        <span class="help-block">{{ $errors->first("quantity") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('duration')) has-error @endif">
                    <label for="duration-field">Duration</label>
                    <input type="text" id="duration-field" name="duration" class="form-control"
                           value="{{ $prescription_detail->duration }}" required/>
                    @if($errors->has("duration"))
                        <span class="help-block">{{ $errors->first("duration") }}</span>
                    @endif
                </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('prescription_details.index') }}"><i
                                class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/prescription.js"></script>
    <script>
        $('.date-picker').datepicker({});
    </script>
@endsection
