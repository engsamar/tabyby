@extends('adminLayout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> ExamGlasses
            <a class="btn btn-success pull-right" href="{{ route('exam_glasses.create') }}"><i
                        class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($exam_glasses->count())
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>SPHR</th>
                        <th>CYLR</th>
                        <th>AXISR</th>
                        <th>NOTES</th>
                        <th>SPHL</th>
                        <th>CYLL</th>
                        <th>AXISL</th>
                        <th>TYPE</th>
                        <th>RESERVATION_ID</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($exam_glasses as $exam_glass)
                        <tr>
                            <td>{{$exam_glass->id}}</td>
                            <td>{{$exam_glass->sphr}}</td>
                            <td>{{$exam_glass->cylr}}</td>
                            <td>{{$exam_glass->axisr}}</td>
                            <td>{{$exam_glass->notes}}</td>
                            <td>{{$exam_glass->sphl}}</td>
                            <td>{{$exam_glass->cyll}}</td>
                            <td>{{$exam_glass->axisl}}</td>
                            <td>{{$examGlassType[$exam_glass->exam_glass_type]}}</td>
                            <td>{{$exam_glass->reservation_id}}</td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-primary"
                                   href="{{ route('exam_glasses.show', $exam_glass->id) }}"><i
                                            class="glyphicon glyphicon-eye-open"></i> View</a>
                                <a class="btn btn-xs btn-warning"
                                   href="{{ route('exam_glasses.edit', $exam_glass->id) }}"><i
                                            class="glyphicon glyphicon-edit"></i> Edit</a>
                                <form action="{{ route('exam_glasses.destroy', $exam_glass->id) }}" method="POST"
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
                {!! $exam_glasses->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection