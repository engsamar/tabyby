@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-condensed table-striped">
                <thead>
                <tr><th colspan="8">personal info</th></tr>
                <tr>
                    <th>username</th>
                    <th>email</th>
                    <th>address</th>
                    <th>tel</th>
                    <th>mobile</th>
                    <th>password</th>
                    <th>birthdate</th>
                    <th class="text-right">OPTIONS</th>
                </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{$personal_info->username}}</td>
                        <td>{{$personal_info->email}}</td>
                        <td>{{$personal_info->address}}</td>
                        <td>{{$personal_info->telephone}}</td>
                        <td>{{$personal_info->mobile}}</td>
                        <td>{{$personal_info->password}}</td>
                        <td>{{$personal_info->birthdate}}</td>
                        <td>{{$personal_info->gender}}</td>
                        <td class="text-right">
                            <a class="btn btn-xs btn-warning" href="{{ route('users.edit', $personal_info->id) }}"><i
                                        class="glyphicon glyphicon-edit"></i> Edit</a>
                            <form action="{{ route('users.destroy', $personal_info->id) }}" method="POST"
                                  style="display: inline;"
                                  onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection