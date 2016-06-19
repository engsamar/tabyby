@extends('adminLayout')
@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Clinics
            <a class="btn btn-success pull-right" href="{{ route('clinics.create') }}"><i
                        class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($clinics->count())
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>TELEPHONE</th>
                        <th>ADDRESS</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(Auth::user()->userRoles[0]->type==1)
                    @foreach($clinics as $clinic)
                        @if($clinic->id == $secertary)

                        <tr>
                            <td>{{$clinic->id}}</td>
                            <td>{{$clinic->name}}</td>
                            <td>{{$clinic->telephone}}</td>
                            <td>{{$clinic->address}}</td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-primary"
                                   href="{{ route('working_hours.show',$clinic->id) }}"><i
                                            class="glyphicon glyphicon-eye-open"></i>WorkingHours</a>
                                <a class="btn btn-xs btn-warning" href="{{ route('clinics.edit', $clinic->id) }}"><i
                                            class="glyphicon glyphicon-edit"></i> Edit</a>
                                <form action="{{ route('clinics.destroy', $clinic->id) }}" method="POST"
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
                        @endif
                    @endforeach
                    @else

                    @foreach($clinics as $clinic)

                        <tr>
                            <td>{{$clinic->id}}</td>
                            <td>{{$clinic->name}}</td>
                            <td>{{$clinic->telephone}}</td>
                            <td>{{$clinic->address}}</td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-primary"
                                   href="{{ route('working_hours.show',$clinic->id) }}"><i
                                            class="glyphicon glyphicon-eye-open"></i>WorkingHours</a>
                                <a class="btn btn-xs btn-warning" href="{{ route('clinics.edit', $clinic->id) }}"><i
                                            class="glyphicon glyphicon-edit"></i> Edit</a>
                                <form action="{{ route('clinics.destroy', $clinic->id) }}" method="POST"
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


                    @endif
                    </tbody>
                </table>
                {!! $clinics->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection