@extends('adminLayout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Examinations
            <a class="btn btn-success pull-right" href="{{ route('examinations.create') }}"><i
                        class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($examinations->count())
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>EYE_TYPE</th>
                        <th>VISION</th>
                        <th>LID</th>
                        <th>CONJUNCTIVA</th>
                        <th>CORNEA</th>
                        <th>A_C</th>
                        <th>PUPIL</th>
                        <th>LENS</th>
                        <th>FUNDUS</th>
                        <th>I_O_P</th>
                        <th>ANGLE</th>
                        <th>RESERVATION_ID</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($examinations as $examination)
                        <tr>
                            <td>{{$examination->id}}</td>
                            <td>{{$eyeType[$examination->eye_type]}}</td>
                            <td>{{$vision[$examination->vision]}}</td>
                            <td>{{$examination->lid}}</td>
                            <td>{{$examination->conjunctiva}}</td>
                            <td>{{$examination->cornea}}</td>
                            <td>{{$examination->a_c}}</td>
                            <td>{{$examination->pupil}}</td>
                            <td>{{$examination->lens}}</td>
                            <td>{{$examination->fundus}}</td>
                            <td>{{$examination->i_o_p}}</td>
                            <td>{{$examination->angle}}</td>
                            <td>{{$examination->reservation_id}}</td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-primary"
                                   href="{{ route('examinations.show', $examination->id) }}"><i
                                            class="glyphicon glyphicon-eye-open"></i> View</a>
                                <a class="btn btn-xs btn-warning"
                                   href="{{ route('examinations.edit', $examination->id) }}"><i
                                            class="glyphicon glyphicon-edit"></i> Edit</a>
                                <form action="{{ route('examinations.destroy', $examination->id) }}" method="POST"
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
                {!! $examinations->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection