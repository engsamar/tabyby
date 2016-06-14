@extends('adminLayout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> WorkingHours
            <a class="btn btn-success pull-right" href="{{ route('working_hours.create') }}"><i
                        class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($working_hours->count())
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        {{--<th>ID</th>--}}
                        <th>FROM</th>
                        <th>TO</th>
                        <th>DAY</th>
                        <th>CLINIC_NAME</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($working_hours as $working_hour)
                        <tr>
{{--                            <td>{{$working_hour->id}}</td>--}}
                            <td>{{$working_hour->fromTime}}</td>
                            <td>{{$working_hour->toTime}}</td>
                            <td>{{$working_hour->day}}</td>
                            <td>{{$working_hour->clinic->name}}

                            </td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-primary"
                                   href="{{ route('working_hours.show', $working_hour->id) }}"><i
                                            class="glyphicon glyphicon-eye-open"></i> View</a>
                                <a class="btn btn-xs btn-warning"
                                   href="{{ route('working_hours.edit', $working_hour->id) }}"><i
                                            class="glyphicon glyphicon-edit"></i> Edit</a>
                                <form action="{{ route('working_hours.destroy', $working_hour->id) }}" method="POST"
                                      style="display: inline;"
                                      onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-xs btn-danger"><i
                                                class="glyphicon glyphicon-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $working_hours->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection