@extends('adminLayout')
@section('header')
<div class="page-header">
        <h1>Examinations / Show #{{$examination->id}}</h1>
        <form action="{{ route('examinations.destroy', $examination->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('examinations.edit', $examination->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="eye_type">EYE_TYPE</label>
                     <p class="form-control-static">{{$eyeType[$examination->eye_type]}}</p>
                </div>
                    <div class="form-group">
                     <label for="vision">VISION</label>
                     <p class="form-control-static">{{$vision[$examination->vision]}}</p>
                </div>
                    <div class="form-group">
                     <label for="lid">LID</label>
                     <p class="form-control-static">{{$examination->lid}}</p>
                </div>
                    <div class="form-group">
                     <label for="conjunctiva">CONJUNCTIVA</label>
                     <p class="form-control-static">{{$examination->conjunctiva}}</p>
                </div>
                    <div class="form-group">
                     <label for="cornea">CORNEA</label>
                     <p class="form-control-static">{{$examination->cornea}}</p>
                </div>
                    <div class="form-group">
                     <label for="a_c">A_C</label>
                     <p class="form-control-static">{{$examination->a_c}}</p>
                </div>
                    <div class="form-group">
                     <label for="pupil">PUPIL</label>
                     <p class="form-control-static">{{$examination->pupil}}</p>
                </div>
                    <div class="form-group">
                     <label for="lens">LENS</label>
                     <p class="form-control-static">{{$examination->lens}}</p>
                </div>
                    <div class="form-group">
                     <label for="fundus">FUNDUS</label>
                     <p class="form-control-static">{{$examination->fundus}}</p>
                </div>
                    <div class="form-group">
                     <label for="i_o_p">I_O_P</label>
                     <p class="form-control-static">{{$examination->i_o_p}}</p>
                </div>
                    <div class="form-group">
                     <label for="angle">ANGLE</label>
                     <p class="form-control-static">{{$examination->angle}}</p>
                </div>
                    <div class="form-group">
                     <label for="reservation_id">RESERVATION_ID</label>
                     <p class="form-control-static">{{$examination->reservation_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('examinations.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection