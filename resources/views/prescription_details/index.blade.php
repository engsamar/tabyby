@extends('adminLayout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> PrescriptionDetails
            <a class="btn btn-success pull-right" href="{{ route('prescription_details.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($prescription_details->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            {{--<th>ID</th>--}}
                            <th>MEDICINE_NAME</th>
                        <th>NO_TIMES</th>
                        <th>QUANTITY</th>
                        <th>DURATION</th>
                        {{--<th>PRECEPTION_ID</th>--}}
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($prescription_details as $prescription_detail)
                            <tr>
{{--                                <td>{{$prescription_detail->id}}</td>--}}
                                <td>{{$prescription_detail->medicine_name}}</td>
                    <td>{{$prescription_detail->no_times}}</td>
                    <td>{{$prescription_detail->quantity}}</td>
                    <td>{{$prescription_detail->duaration}}</td>
{{--                    <td>{{$prescription_detail->preception_id}}</td>--}}
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('prescription_details.show', $prescription_detail->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('prescription_details.edit', $prescription_detail->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('prescription_details.destroy', $prescription_detail->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $prescription_details->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection