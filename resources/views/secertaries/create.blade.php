@extends('adminLayout')
@section('css')
<link href="/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
<div class="page-header">
  <h1><i class="glyphicon glyphicon-plus"></i> Secertaries / Create </h1>
</div>
@endsection
@section('scripts')
    <script src="/js/secretary.js"></script>
@endsection
@section('content')
@include('error')
<div class="row">
  <div class="col-md-12">
    <form action="{{ route('secertaries.store') }}" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group @if($errors->has('name')) has-error @endif">
        <label for="name-field">Secretary Name</label>
        <input list="searchResult" type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
        <datalist id="searchResult">
        
        </datalist>
        <span class="help-block"></span>
        @if($errors->has("name"))
        <span class="help-block">{{ $errors->first("name") }}</span>
        @endif
      </div>

      <div  class="form-group @if($errors->has('address')) has-error @endif">
                <label for="address-field">Clinic</label>
                <select id="type-field" name="address" class="form-control">
                    <option value="0">Choose Clinic</option>}
                    option
                    @foreach($address as $key=>$value)

                    <option value={{ $value->id }}>{{ $value->name }} :: {{ $value->address }}</option>
                    @endforeach
                </select>
                @if($errors->has("address"))
                <span class="help-block">{{ $errors->first("address") }}</span>
                @endif
            </div>

      <div class="form-group @if($errors->has('degree')) has-error @endif">
        <label for="degree-field">Degree</label>
        <input type="text" id="degree-field" name="degree" class="form-control" value="{{ old("degree") }}"/>
        @if($errors->has("degree"))
        <span class="help-block">{{ $errors->first("degree") }}</span>
        @endif
      </div>
      <div class="form-group @if($errors->has('national_id')) has-error @endif">
        <label for="national_id-field">National_id</label>
        <input type="number" id="national_id-field" name="national_id" class="form-control" value="{{ old("national_id") }}"/>
        @if($errors->has("national_id"))
        <span class="help-block">{{ $errors->first("national_id") }}</span>
        @endif
      </div>
      <div class="well well-sm">
        <button type="submit" class="btn btn-primary">Create</button>
        <a class="btn btn-link pull-right" href="{{ route('secertaries.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
      </div>
    </form>
  </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<script src="/js/site.js"></script>
<script src="/js/secretary.js"></script>
<script>
$('.date-picker').datepicker({
});

</script>
@endsection