@extends(( (isset(Auth::user()->id) and Auth::user()->userRoles[0]->type==0 ) or (isset(Auth::user()->id) and Auth::user()->userRoles[0]->type==1 )) ? 'adminLayout' : 'layout')
@section('content')
<div class="container">
    <h1>Create a new message</h1>
    {!! Form::open(['route' => 'messages.store']) !!}
    <div class="col-md-6">
        <!-- Subject Form Input -->
        <div class="form-group">
            {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
            {!! Form::text('subject', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Message Form Input -->
        <div class="form-group">
            {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
        </div>

        @if($users->count() > 0)

            @foreach($users as $user)
            <div class="checkbox">
                <label title="{{ $user->username }}"><input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->username }}</label>
                </div>
            @endforeach

                
        @endif

        <!-- Submit Form Input -->
        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop
