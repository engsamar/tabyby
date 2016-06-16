@extends('adminLayout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Medicines
            <a class="btn btn-success pull-right" href="{{ route('medicines.create') }}"><i
                        class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($medicines->count())
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>TYPE</th>
                        <th>COMPANY</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($medicines as $medicine)
                        <tr>
                            <td>{{$medicine->id}}</td>
                            <td>{{$medicine->name}}</td>
                            <td>{{$medicineType[$medicine->type]}}</td>
                            <td>{{$medicine->company}}</td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-primary" href="{{ route('medicines.show', $medicine->id) }}"><i
                                            class="glyphicon glyphicon-eye-open"></i> View</a>
                                <a class="btn btn-xs btn-warning" href="{{ route('medicines.edit', $medicine->id) }}"><i
                                            class="glyphicon glyphicon-edit"></i> Edit</a>
                                <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST"
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
                {!! $medicines->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection