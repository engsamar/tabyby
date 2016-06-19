@extends(( (isset(Auth::user()->id) and Auth::user()->userRoles[0]->type==1 )or ( isset(Auth::user()->id) and Auth::user()->userRoles[0]->type==0)) ? 'adminLayout' : 'layout')
@section('css')
<link href="/css/bootstrap-datepicker.css"
rel="stylesheet">
@endsection
@section('header')


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
                <select id="address-field" name="address" class="form-control">
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
            <div class="form-group" id="reservTime">
                
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
    <script>
       /* $("#date-field").change(function (e) {
        var date = new Date($('#date-field').val());
        var clinic_id = $('#address-field').val();
        date.setDate(date.getDate() + 1);
        var date= date.toISOString().substring(0, 10);
        var myDiv=document.getElementById('reservTime');
        $.ajax
        ({
            url: "/checkReservDate/"+date+"/"+clinic_id,
            type: 'GET',
            data: {},
            success: function (data)
            {
                if(data=='vacation'){
                    var HTMLtxt='<p style="font-weight:bold;color:blue">This date is vacation , please try other one</p>';
                }else if(data=='complete'){
                     var HTMLtxt='<p style="font-weight:bold;color:blue">this date is fully completed , please try another one</p>';
                    
                }else if(data=='noTime'){
                     var HTMLtxt='<p style="font-weight:bold;color:blue">we do\'nt have any working hour in this dat, please try another one</p>';
                    
                }
                else{
                     var HTMLtxt='<select name="workingHour" class="form-control">';
                HTMLtxt+='<option>choose suitable time</option>';
                $.each(data,function(index, el) {
                    HTMLtxt+='<option value='+el['id']+'> From : '+ el['fromTime']+' To : '+el['toTime']+ '</option>';
                });

                HTMLtxt += '</select>';
                }
              
                myDiv.innerHTML = HTMLtxt;
            },
            error: function (data) {
                console.log(data);
            }
        });
    });*/
    </script>
    @endsection
