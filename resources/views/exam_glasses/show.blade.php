@extends('layout')
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
                     <label for="from">FROM</label>
                     <p class="form-control-static">{{$exam_glass->from}}</p>
                </div>
                    <div class="form-group">
                     <label for="exam_glass_type">EXAM_GLASS_TYPE</label>
                     <p class="form-control-static">{{$exam_glass->exam_glass_type}}</p>
                </div>
                    <div class="form-group">
                     <label for="spl">SPL</label>
                     <p class="form-control-static">{{$exam_glass->spl}}</p>
                </div>
                    <div class="form-group">
                     <label for="cyl">CYL</label>
                     <p class="form-control-static">{{$exam_glass->cyl}}</p>
                </div>
                    <div class="form-group">
                     <label for="axis">AXIS</label>
                     <p class="form-control-static">{{$exam_glass->axis}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('exam_glasses.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection