@extends('layout')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                    @lang('validation.login')
                   </br>
                    @lang('validation.logout')
                     </br>
                    @lang('validation.home')
                     </br>
                    @lang('validation.register')
                     </br>
                     <div class="quote">{{ Inspiring::quote() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
