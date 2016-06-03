@extends('layout')
@section('content')

    <div class="row">
        {{--/////////////////////--}}
        <table>
            <tr>
                <td style="width: 48%;">
                    <div id="clinicInfo" class="col-sm-4" style="width:48%;height:40%;border-color: black">
                        <h1>clinicInfo</h1>

                        <form action="{{ route('working_hours.update',$working_hour->id) }}" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <select id="clinic_id-field" name="clinic_id" class="form-control">
                            @foreach($clinics as $clinic)
                                <option value={{ $clinic->id }}>{{ $clinic->name }}</option>
                            @endforeach
                        </select>
                            <label for="from-field">From</label>
                            <input type="text" id="from-field" name="from" class="form-control"/>

                            <label for="to-field">To</label>
                            <input type="text" id="to-field" name="to" class="form-control"/>

                            <label for="day-field">Day</label>

                            <input type="date" id="day-field" name="day" class="form-control"/>
                            <input type="hidden" id="clinic_id-field" name="clinic_id" class="form-control"/>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a class="btn btn-link pull-right" href="{{ route('working_hours.index') }}"/>
                            {{--class="glyphicon glyphicon-backward"></i> Back</a>--}}
                            {{--</div>--}}
                            </form>

                    </div>
                </td>
                <td style="width: 70%;">
                    <div id="recentPost" class="col-sm-6">
                        <h1>recentPost</h1>
                    </div>
                </td>
                <td>
                    <div id="searchPatient" class="col-sm-4" style="width:22%;height:40%">
                        <h1>searchPatient</h1>
                        <input type="search">
                        <div>
                            b55
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div id="doctorBio" class="col-sm-4" style="width:22%;height:40%">
                        <h1>Doctor Bio</h1>
                        <table>
                            <tr>
                                <td><h4>DoctorName</h4></td>
                                <td><h4>:</h4></td>
                                <td><b>{{ $userRole->user->username }}</b></td>
                            </tr>
                            @foreach($userRole->degrees as $data)
                                <tr>
                                    <td>Degree</td>
                                    <td>:</td>
                                    <td>{{$data->degree}}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>:</td>
                                    <td>{{$data->description}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </td>
                <td>
                    <div id="writePost" class="col-sm-6">
                        <h1>writePost</h1>
                    </div>
                </td>
                {{--<td></td>--}}
            </tr>
        </table>

    </div>
@section('scripts')

    <script>
        $(document).ready(function () {

            console.log("hiii in ready");
            $("select[name='clinic_id']").change(function () {
                console.log('iam in');
                $id = this.value;
                console.log('hi', $id);
                $.get("/working_hours/date/" + this.value).done(function (data, status) {
                    console.log(data);
                    if (data.length > 0) {
                        console.log('fffffff');
                        $('#from-field').val(data[0]['fromTime']);
                        $('#to-field').val(data[0]['toTime']);
                        $('#clinic_id-field').val(data[0]['clinic_id']);
                        $('#day-field').val(data[0]['day']);
                    } else {
                        $('#from-field').val(null);
                        $('#to-field').val(null);
                        $('#clinic_id-field').val(null);
                        $('#day-field').val(null);
                    }
                });
            });
//            $("select[name='address']").change(function () {
//                alert("Handler for .change() called.");
//                console.log("hiii");
//            });
//            $('address').on("change", function () {
//                console.log("hiii");
//            });
        });

    </script>
@endsection

@stop