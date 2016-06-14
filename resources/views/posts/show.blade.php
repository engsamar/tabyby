@extends('adminLayout')
@section('header')
<div class="page-header">
        <h1>Posts / Show #{{$post->id}}</h1>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('posts.edit', $post->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                {{--<div class="form-group">--}}
                    {{--<label for="nome">ID</label>--}}
                    {{--<p class="form-control-static"></p>--}}
                {{--</div>--}}
                <div class="form-group">
                     <label for="title">TITLE</label>
                     <p class="form-control-static">{{$post->title}}</p>
                </div>
                    <div class="form-group">
                     <label for="content">CONTENT</label>
                     <p class="form-control-static">{{$post->content}}</p>
                </div>
                    {{--<div class="form-group">--}}
                     {{--<label for="user_id">USER_ID</label>--}}
                     {{--<p class="form-control-static">{{$post->user_id}}</p>--}}
                {{--</div>--}}
                    <div class="form-group">
                    <img class="img-rounded" width="300" height="200" src="{{URL::asset('/images/posts/'.$post->picture_path )}}">
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('posts.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection