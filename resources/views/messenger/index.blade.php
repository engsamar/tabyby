@extends(( (isset(Auth::user()->id) and Auth::user()->userRoles[0]->type==0 ) or (isset(Auth::user()->id) and Auth::user()->userRoles[0]->type==1 )) ? 'adminLayout' : 'layout')
@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Messages
            <a class="btn btn-success pull-right" href="{{ route('messages.create') }}"><i
                        class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection
@section('content')
    <div class="container">
        @if (Session::has('error_message'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error_message') }}
            </div>
        @endif
        @if($threads->count() > 0)
            @foreach($threads as $thread)
            <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
            <div id="thread_list_{{$thread->id}}" class="media alert {{ $class }}">
                <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
                <p id="thread_list_{{$thread->id}}_text">{{ $thread->latestMessage->body }}</p>
                <p><small><strong>Creator:</strong> {{ $thread->creator()->username }}</small></p>
                <p><small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id(), ['username']) }}</small></p>
            </div>
            @endforeach
        @else
            <p>Sorry, no threads.</p>
        @endif
    </div>
@stop
