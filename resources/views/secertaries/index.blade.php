@extends('adminLayout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Secertaries
            <a class="btn btn-success pull-right" href="{{ route('secertaries.create') }}"><i
                        class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($secertaries->count())
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>ADDRESS</th>
                        <th>TELEPHONE</th>
                        <th>MOBILE</th>
                        <th>BIRTHDATE</th>
                        <th>DEGREE</th>
                        <th>NATIONAL_ID</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($secertaries as $secertary)

                        <tr>
                            @foreach($userRole as $role)

                                @if($role['id']==$secertary->userRole_id)
                                    @foreach($users as $user)
                                        @if($user['id']==$role['user_id'])
                                            <td>{{$user['username']}}</td>
                                            <td>{{$user['email']}}</td>
                                            <td>{{$user['address']}}</td>
                                            <td>{{$user['telephone']}}</td>
                                            <td>{{$user['mobile']}}</td>
                                            <td>{{$user['birthdate']}}</td>
                                            <td>{{$secertary->degree}}</td>
                                            <td>{{$secertary->national_id}}</td>
                                            <td class="text-right">
                                                {{--<a class="btn btn-xs btn-primary"--}}
                                                {{--href="{{ route('secertaries.show', $secertary->id) }}"><i--}}
                                                {{--class="glyphicon glyphicon-eye-open"></i> View</a>--}}
                                                <a class="btn btn-xs btn-warning"
                                                   href="{{ route('secertaries.edit', $secertary->id) }}"><i
                                                            class="glyphicon glyphicon-edit"></i> Edit</a>
                                                <form action="{{ route('secertaries.destroy', $secertary->id) }}"
                                                      method="POST"
                                                      style="display: inline;"
                                                      onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-xs btn-danger"><i
                                                                class="glyphicon glyphicon-trash"></i> Delete
                                                    </button>
                                                </form>
                                                @endif
                                                @endforeach
                                                @endif
                                                @endforeach
                                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--                {!! $secertaries->render() !!}--}}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
