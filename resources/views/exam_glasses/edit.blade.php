@extends('adminLayout')
@section('css')
  <link href="/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> ExamGlasses / Edit #{{$exam_glass->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('exam_glasses.update', $exam_glass->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('sphr')) has-error @endif">
                       <label for="sphr-field">Sphr</label>
                    <input type="text" id="sphr-field" name="sphr" class="form-control" value="{{ $exam_glass->sphr }}"/>
                       @if($errors->has("sphr"))
                        <span class="help-block">{{ $errors->first("sphr") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cylr')) has-error @endif">
                       <label for="cylr-field">Cylr</label>
                    <input type="text" id="cylr-field" name="cylr" class="form-control" value="{{ $exam_glass->cylr }}"/>
                       @if($errors->has("cylr"))
                        <span class="help-block">{{ $errors->first("cylr") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('axisr')) has-error @endif">
                       <label for="axisr-field">Axisr</label>
                    <input type="text" id="axisr-field" name="axisr" class="form-control" value="{{ $exam_glass->axisr }}"/>
                       @if($errors->has("axisr"))
                        <span class="help-block">{{ $errors->first("axisr") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('sphl')) has-error @endif">
                       <label for="sphl-field">Sphl</label>
                    <input type="text" id="sphl-field" name="sphl" class="form-control" value="{{ $exam_glass->sphl }}"/>
                       @if($errors->has("sphl"))
                        <span class="help-block">{{ $errors->first("sphl") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cyll')) has-error @endif">
                       <label for="cyll-field">Cyll</label>
                    <input type="text" id="cyll-field" name="cyll" class="form-control" value="{{ $exam_glass->cyll }}"/>
                       @if($errors->has("cyll"))
                        <span class="help-block">{{ $errors->first("cyll") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('axisl')) has-error @endif">
                       <label for="axisl-field">Axisl</label>
                    <input type="text" id="axisl-field" name="axisl" class="form-control" value="{{ $exam_glass->axisl }}"/>
                       @if($errors->has("axisl"))
                        <span class="help-block">{{ $errors->first("axisl") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('type')) has-error @endif">
                       <label for="type-field">Type</label>
                    {{--<input type="text" id="type-field" name="type" class="form-control" value="{{ $exam_glass->type }}"/>--}}
                        <select id="type-field" name="type" class="form-control">
                            $examGlassType
                            @foreach($examGlassType as $key=>$types)
                                @if($exam_glass->exam_glass_type==$key)
                                    <option selected value={{ $types[$exam_glass->exam_glass_type] }}>{{ $types }}</option>
                                @else
                                    <option value={{ $key }}>{{ $types }}</option>
                                @endif

                            @endforeach
                        </select>
                       @if($errors->has("type"))
                        <span class="help-block">{{ $errors->first("type") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('reservation_id')) has-error @endif">
                       <label for="reservation_id-field">Reservation_id</label>
                    <input type="text" id="reservation_id-field" name="reservation_id" class="form-control" value="{{ $exam_glass->reservation_id }}"/>
                       @if($errors->has("reservation_id"))
                        <span class="help-block">{{ $errors->first("reservation_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('exam_glasses.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
