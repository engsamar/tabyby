@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> PerceptionDetails
            <a class="btn btn-success pull-right" href="{{ route('perception_details.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($perception_details->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>MEDICINE_NAME</th>
                        <th>NO_TIMES</th>
                        <th>QUANTITY</th>
                        <th>DURATION</th>
                        <th>PRECEPTION_ID</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($perception_details as $perception_detail)
                            <tr>
                                <td>{{$perception_detail->id}}</td>
                                <td>{{$perception_detail->medicine_name}}</td>
                    <td>{{$perception_detail->no_times}}</td>
                    <td>{{$perception_detail->quantity}}</td>
                    <td>{{$perception_detail->duration}}</td>
                    <td>{{$perception_detail->preception_id}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('perception_details.show', $perception_detail->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('perception_details.edit', $perception_detail->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('perception_details.destroy', $perception_detail->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $perception_details->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection