@extends('adminLayout')
@section('header')
<div class="page-header">
        <h1>ExamGlasses / Show #{{$exam_glass->id}}</h1>
        <form action="{{ route('exam_glasses.destroy', $exam_glass->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('exam_glasses.edit', $exam_glass->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="sphr">SPHR</label>
                     <p class="form-control-static">{{$exam_glass->sphr}}</p>
                </div>
                    <div class="form-group">
                     <label for="cylr">CYLR</label>
                     <p class="form-control-static">{{$exam_glass->cylr}}</p>
                </div>
                    <div class="form-group">
                     <label for="axisr">AXISR</label>
                     <p class="form-control-static">{{$exam_glass->axisr}}</p>
                </div>
                    <div class="form-group">
                     <label for="sphl">SPHL</label>
                     <p class="form-control-static">{{$exam_glass->sphl}}</p>
                </div>
                    <div class="form-group">
                     <label for="cyll">CYLL</label>
                     <p class="form-control-static">{{$exam_glass->cyll}}</p>
                </div>
                    <div class="form-group">
                     <label for="axisl">AXISL</label>
                     <p class="form-control-static">{{$exam_glass->axisl}}</p>
                </div>
                    <div class="form-group">
                     <label for="type">Exam_Glass_TYPE</label>
                     <p class="form-control-static">{{$examGlassType[$exam_glass->exam_glass_type]}}</p>
                </div>
                    <div class="form-group">
                     <label for="reservation_id">RESERVATION_ID</label>
                     <p class="form-control-static">{{$exam_glass->reservation_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('exam_glasses.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection