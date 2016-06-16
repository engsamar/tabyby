@extends(( (isset(Auth::user()->id) and Auth::user()->userRoles[0]->type==1 )or ( isset(Auth::user()->id) and Auth::user()->userRoles[0]->type==0)) ? 'adminLayout' : 'homeViewLayout')
@section('css')
<link href="/css/bootstrap-datepicker.css"
rel="stylesheet">
@endsection
@section('header')

@endsection

@section('content')
@include('error')

<div class="row">
    <div class="col-md-12">
    @if($errors->has('msg'))
<h4>@lang('validation.$errors->first()'){{$errors->first()}}</h4>
@endif
        <form action="{{ route('reservations.store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if($userRole == 1 || $userRole == 0)
            <div class="form-group @if($errors->has('name')) has-error @endif">
                <label for="name-field">Patient Name</label>
                <input list="searchResult" type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                <datalist id="searchResult">
                    
                </datalist>
               
                @if($errors->has("name"))
                <span class="help-block">{{ $errors->first("name") }}</span>
                @endif
            </div>

            @endif
            @if($userRole ==2)
            <div  class="form-group @if($errors->has('address')) has-error @endif">
                <label for="address-field">Address</label>
                <select id="type-field" name="address" class="form-control">
                    <option value="0">Choose Clinic</option>
                    @foreach($address as $key=>$value)

                    <option value={{ $value->id }}>{{ $value->name }} :: {{ $value->address }}</option>
                    @endforeach
                </select>
                @if($errors->has("address"))
                <span class="help-block">{{ $errors->first("address") }}</span>
                @endif
            </div>

            @endif 
            <div class="form-group @if($errors->has('date')) has-error @endif">
                <label for="date-field">date</label>
                <input type="text" id="date-field" name="date"  class="form-control date-picker"
                value="{{ old("date") }}"/>
                @if($errors->has("date"))
                <span class="help-block">{{ $errors->first("date") }}</span>
                @endif
            </div>


            <div  class="form-group @if($errors->has('examination')) has-error @endif">
                <label for="examination-field">Examination Type</label>
                <select id="type-field" name="examination" class="form-control">
                    <option >Choose Examination</option>}
                    <option value="0"> examination</option>
                    <option value="4">glasses prescription</option>
                </select>
                @if($errors->has("examination"))
                <span class="help-block">{{ $errors->first("examination") }}</span>
                @endif
            </div>

            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Reserve</button>
                @if($userRole == 1)
                <button type="button" class="btn btn-primary"><a href="{{ route('users.create') }}"

                 style="color:white">New User</a></button>
                 @endif
                 <a class="btn btn-link pull-right" href="{{ route('reservations.index') }}"><i
                    class="glyphicon glyphicon-backward"></i> Back</a>
                </div>

            </form>

        </div>
    </div>
    @endsection
    @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
        $('.date-picker').datepicker({
            dateFormate:'yyyy/mm/dd ',
            startDate: today,
        });
        $("input[name='date']").keypress(function (event) {
            event.preventDefault();
        });
    </script>
    @endsection
