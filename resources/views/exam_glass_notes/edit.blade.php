@extends('layout')
@section('css')
  <link href="/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> ExamGlassNotes / Edit #{{$exam_glass_note->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('exam_glass_notes.update', $exam_glass_note->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('"note')) has-error @endif">
                       <label for=""note-field">"note</label>
                    <input type="text" id=""note-field" name=""note" class="form-control" value="{{ $exam_glass_note->"note }}"/>
                       @if($errors->has(""note"))
                        <span class="help-block">{{ $errors->first(""note") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('examglass_id')) has-error @endif">
                       <label for="examglass_id-field">ExamGlass_id</label>
                    <input type="text" id="examglass_id-field" name="examglass_id" class="form-control" value="{{ $exam_glass_note->examglass_id }}"/>
                       @if($errors->has("examglass_id"))
                        <span class="help-block">{{ $errors->first("examglass_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('exam_glass_notes.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
