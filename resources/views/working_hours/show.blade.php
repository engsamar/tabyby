@extends('adminLayout')
@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i>{{$working_hour[0]->clinic['name']}}

        </h1>

    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(!empty($working_hour))
                <a class="btn btn-success pull-right" href="create/{{ $clinic_id }}"><i
                            class="glyphicon glyphicon-plus"></i> Create</a>
            <table class="table table-condensed table-striped">
                <thead>
                <tr>
                    <th>FROM_DAY</th>
                    <th>TO_DAY</th>
                    <th>DAY</th>
                    <th class="text-right">OPTIONS</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($working_hour as $data)
                        <tr>
                            <td>{{$data->fromTime}}</td>
                            <td>{{$data->toTime}}</td>
                            <td>{{$data->day}}</td>
                            <td class="text-right">
                                <form action="{{ route('working_hours.destroy', $data->id) }}" method="POST"
                                      style="display: inline;"
                                      onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="btn-group pull-right" role="group" aria-label="...">
                                        <a class="btn btn-warning btn-group" role="group"
                                           href="{{ route('working_hours.edit', $data->id) }}"><i
                                                    class="glyphicon glyphicon-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete <i
                                                    class="glyphicon glyphicon-trash"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>


            <a class="btn btn-link" href="{{ route('working_hours.index') }}"><i
                        class="glyphicon glyphicon-backward"></i> Back</a>

        </div>
    </div>

@endsection