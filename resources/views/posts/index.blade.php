@extends('adminLayout')
@section('css')
    <link href="css/1-col-portfolio.css" rel="stylesheet">
@endsection
@section('scripts')

@endsection

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Posts
            <a class="btn btn-success pull-right" href="{{ route('posts.create') }}"><i
                        class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    {{--////////////////////////--}}
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Posts</h1>
            </div>
        </div>
        <!-- /.row -->
        @if($posts->count())
        @foreach($posts as $post)
                <!-- Project One -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive col-md-11" src="{{URL::asset('/images/posts/'.$post->picture_path )}}" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>{{$post->title}}</h3>
                <p>{{$post->content}}</p>
                {{--<a class="btn btn-primary" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>--}}
                {{--<a class="btn btn-xs btn-primary" href="{{ route('posts.show', $post->id) }}"><i--}}
                            {{--class="glyphicon glyphicon-eye-open"></i> View</a>--}}
                <a class="btn btn-xs btn-warning" href="{{ route('posts.edit', $post->id) }}"><i
                            class="glyphicon glyphicon-edit"></i> Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;"
                      onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete
                    </button>
                {{--</div>--}}
            </div>
            <hr>
            @endforeach


            {!! $posts->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    {{--</div>--}}

@endsection