@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> DoctorDegrees
            <a class="btn btn-success pull-right" href="{{ route('doctor_degrees.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($doc_info->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DEGREE</th>
                        <th>UNIVERSITY</th>
                        <th>DESCRIPTION</th>
                        <th>GRADUATE_DATE</th>
                        <th>USER_ROLE_ID</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($doc_info as $info)
                            <tr>
                                <td>{{$info->username}}</td>
                                <td>{{$info->user_role_id}}</td>
                                <td>{{$info->user_role_id}}</td>
                                <td>{{$info->user_role_id}}</td>
                                <td>{{$info->id}}</td>
                                <td>{{$info->degree}}</td>
                                <td>{{$info->university}}</td>
                                <td>{{$info->description}}</td>
                                <td>{{$info->graduate_date}}</td>
                                
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('doctor_degrees.show', $doctor_degree->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('doctor_degrees.edit', $doctor_degree->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('doctor_degrees.destroy', $doctor_degree->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $doc_info->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection