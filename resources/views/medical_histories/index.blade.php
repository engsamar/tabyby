@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> MedicalHistories
            <a class="btn btn-success pull-right" href="{{ route('medical_histories.create') }}"><i
                        class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($medical_histories->count())
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                         <th>Patient Name</th>
                        <th>TYPE</th>
                        <th>Description</th>
                        <th>BEGIN_AT</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($medical_histories as $medical_history)
                        <tr>
                            <td>{{ $medical_history->id }}</td>
                            <td><a href='/user_profiles/{{$medical_history->user_id}}'>{{ $medical_history->user->username }}</a></td>
                            <td>{{ $medicalHistoryType[$medical_history->type] }}</td>
                            
                             <td>@foreach($medical_history->medicalHistoryDetail as $detail)

                             {{ $detail->description}}

                             @endforeach
                             </td>


                            <td>{{ $medical_history->begin_at }}</td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-primary"
                                   href="{{ route('medical_histories.show', $medical_history->id) }}"><i
                                            class="glyphicon glyphicon-eye-open"></i> View</a>
                                <a class="btn btn-xs btn-warning"
                                   href="{{ route('medical_histories.edit', $medical_history->id) }}"><i
                                            class="glyphicon glyphicon-edit"></i> Edit</a>
                                <form action="{{ route('medical_histories.destroy', $medical_history->id) }}"
                                      method="POST" style="display: inline;"
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
                {!! $medical_histories->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection