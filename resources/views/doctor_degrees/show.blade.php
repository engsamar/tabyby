@extends('layout')

@section('content')
<table class="table table-condensed table-striped">
    <thead>
    <tr>
        <th colspan="4">Personal Info</th>
    </tr>
    <tr>
        <th>username</th>
        <th>tel</th>
        <th>mobile</th>
        <th class="text-right">OPTIONS</th>
    </tr>
    </thead>

    <tbody>
	@foreach ($userInfo as $personal) 
        <tr>
            <td>{{$personal->username}}</td>
            <td>{{$personal->telephone}}</td>
            <td>{{$personal->mobile}}</td>
            <td class="text-right">
                <a class="btn btn-xs btn-warning" href="{{ route('users.edit', $personal->id) }}"><i
                            class="glyphicon glyphicon-edit"></i> Edit</a>
                <form action="{{ route('users.destroy', $personal->id) }}" method="POST"
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


<table class="table table-condensed table-striped">
    <thead>
    <tr>
        <th colspan="4">Education Info</th>
    </tr>
    <tr>
        <th>degree</th>
        <th>university</th>
        <th>description</th>
        <th class="text-right">OPTIONS</th>
    </tr>
    </thead>
    <tbody>
		@foreach($doc_info as $info) 
        <tr>
            <td>{{$info->degree}}</td>
            <td>{{$info->university}}</td>
            <td>{{$info->description}}</td>
            <td class="text-right">
                <a class="btn btn-xs btn-warning" href="{{ route('doctor_degrees.edit', $personal->id) }}"><i
                            class="glyphicon glyphicon-edit"></i> Edit</a>
                <form action="{{ route('doctor_degrees.destroy', $personal->id) }}" method="POST"
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
@endsection