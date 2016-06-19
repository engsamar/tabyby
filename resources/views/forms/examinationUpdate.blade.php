  <div class="row">
        <div class="col-md-4">
            <form action="{{ route('examinations.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="res_id" value="{{ $reservation->id }}">
                <h3>Left Eye</h3>
                 <?php 
                    $eyeType=array('right','left');
                    $vision=array('6/6','6/9','6/12','6/18','6/24','6/36','6/60','5/60','4/60','3/60','2/60','1/60','H.M','PL','No_Pl');

                ?>
                <div class="form-group @if($errors->has('eye_type')) has-error @endif">

                    @if($errors->has("eye_type"))
                        <span class="help-block">{{ $errors->first("eye_type") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('vision')) has-error @endif">
                    <label for="vision-field">Vision</label>
                    <select id="vision-field" name="vision" class="form-control">
                        @foreach($vision as $key=>$value)
                            <option value={{ $key }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @if($errors->has("vision"))
                        <span class="help-block">{{ $errors->first("vision") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('lid')) has-error @endif">
                    <label for="lid-field">Lid</label>
                    <input type="text" id="lid-field" name="lid" class="form-control" value="{{  $reservation->examination[0]["lid"] }}"/>
                    @if($errors->has("lid"))
                        <span class="help-block">{{ $errors->first("lid") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('conjunctiva')) has-error @endif">
                    <label for="conjunctiva-field">Conjunctiva</label>
                    <input type="text" id="conjunctiva-field" name="conjunctiva" class="form-control"
                           value="{{  $reservation->examination[0]["conjunctiva"] }}"/>
                    @if($errors->has("conjunctiva"))
                        <span class="help-block">{{ $errors->first("conjunctiva") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('cornea')) has-error @endif">
                    <label for="cornea-field">Cornea</label>
                    <input type="text" id="cornea-field" name="cornea" class="form-control"
                           value="{{  $reservation->examination[0]["cornea"]}}"/>
                    @if($errors->has("cornea"))
                        <span class="help-block">{{ $errors->first("cornea") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('a_c')) has-error @endif">
                    <label for="a_c-field">A_c</label>
                    <input type="text" id="a_c-field" name="a_c" class="form-control" value="{{  $reservation->examination[0]["a_c"]}}"/>
                    @if($errors->has("a_c"))
                        <span class="help-block">{{ $errors->first("a_c") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('pupil')) has-error @endif">
                    <label for="pupil-field">Pupil</label>
                    <input type="text" id="pupil-field" name="pupil" class="form-control" value="{{  $reservation->examination[0]["pupil"]}}"/>
                    @if($errors->has("pupil"))
                        <span class="help-block">{{ $errors->first("pupil") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('lens')) has-error @endif">
                    <label for="lens-field">Lens</label>
                    <input type="text" id="lens-field" name="lens" class="form-control" value="{{  $reservation->examination[0]["lens"] }}"/>
                    @if($errors->has("lens"))
                        <span class="help-block">{{ $errors->first("lens") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('fundus')) has-error @endif">
                    <label for="fundus-field">Fundus</label>
                    <input type="text" id="fundus-field" name="fundus" class="form-control"
                           value="{{  $reservation->examination[0]["fundus"] }}"/>
                    @if($errors->has("fundus"))
                        <span class="help-block">{{ $errors->first("fundus") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('i_o_p')) has-error @endif">
                    <label for="i_o_p-field">I_o_p</label>
                    <input type="text" id="i_o_p-field" name="i_o_p" class="form-control" value="{{  $reservation->examination[0]["i_o_p"] }}"/>
                    @if($errors->has("i_o_p"))
                        <span class="help-block">{{ $errors->first("i_o_p") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('angle')) has-error @endif">
                    <label for="angle-field">Angle</label>
                    <input type="text" id="angle-field" name="angle" class="form-control" value="{{  $reservation->examination[0]["angle"] }}"/>
                    @if($errors->has("angle"))
                        <span class="help-block">{{ $errors->first("angle") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('reservation_id')) has-error @endif">
                    {{--<label for="reservation_id-field">Reservation_id</label>--}}
                    <input type="hidden" id="reservation_id-field" name="reservation_id" class="form-control"
                           value="{{ $reservation->id }}"/>
                    @if($errors->has("reservation_id"))
                        <span class="help-block">{{ $errors->first("reservation_id") }}</span>
                    @endif
                </div>
        </div>

        {{--//div2--}}
        <div class="col-md-4">

            {{--<form action="{{ route('examinations.store') }}" method="POST">--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

                <div class="form-group @if($errors->has('eye_type')) has-error @endif">
                    <h3>Right Eye</h3>
                    @if($errors->has("eye_type"))
                        <span class="help-block">{{ $errors->first("eye_type") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('vision')) has-error @endif">
                    <label for="vision-field">Vision</label>
                    <select id="vision-field" name="vision1" class="form-control">
                        @foreach($vision as $key=>$value)
                            <option value={{ $key }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @if($errors->has("vision"))
                        <span class="help-block">{{ $errors->first("vision") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('lid')) has-error @endif">
                    <label for="lid-field">Lid</label>
                    <input type="text" id="lid-field" name="lid1" class="form-control" value="{{$reservation->examination[1]["lid"] }}"/>
                    @if($errors->has("lid"))
                        <span class="help-block">{{ $errors->first("lid") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('conjunctiva')) has-error @endif">
                    <label for="conjunctiva-field">Conjunctiva</label>
                    <input type="text" id="conjunctiva-field" name="conjunctiva1" class="form-control"
                           value="{{  $reservation->examination[1]["conjunctiva"]}}"/>
                    @if($errors->has("conjunctiva"))
                        <span class="help-block">{{ $errors->first("conjunctiva") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('cornea')) has-error @endif">
                    <label for="cornea-field">Cornea</label>
                    <input type="text" id="cornea-field" name="cornea1" class="form-control"
                           value="{{  $reservation->examination[1]["cornea"] }}"/>
                    @if($errors->has("cornea"))
                        <span class="help-block">{{ $errors->first("cornea") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('a_c')) has-error @endif">
                    <label for="a_c-field">A_c</label>
                    <input type="text" id="a_c-field" name="a_c1" class="form-control" value="{{  $reservation->examination[1]["a_c"]}}"/>
                   @if($errors->has("a_c"))
                        <span class="help-block">{{ $errors->first("a_c") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('pupil')) has-error @endif">
                    <label for="pupil-field">Pupil</label>
                    <input type="text" id="pupil-field" name="pupil1" class="form-control" value="{{  $reservation->examination[1]["pupil"] }}"/>
                    @if($errors->has("pupil"))
                        <span class="help-block">{{ $errors->first("pupil") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('lens')) has-error @endif">
                    <label for="lens-field">Lens</label>
                    <input type="text" id="lens-field" name="lens1" class="form-control" value="{{  $reservation->examination[1]["lens"] }}"/>
                   @if($errors->has("lens"))
                        <span class="help-block">{{ $errors->first("lens") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('fundus')) has-error @endif">
                    <label for="fundus-field">Fundus</label>
                    <input type="text" id="fundus-field" name="fundus1" class="form-control"
                           value="{{  $reservation->examination[1]["fundus"] }}" />
                   @if($errors->has("fundus"))
                        <span class="help-block">{{ $errors->first("fundus") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('i_o_p')) has-error @endif">
                    <label for="i_o_p-field">I_o_p</label>
                    <input type="text" id="i_o_p-field" name="i_o_p1" class="form-control" value="{{  $reservation->examination[1]["i_o_p"] }}"/>
                     @if($errors->has("i_o_p"))
                        <span class="help-block">{{ $errors->first("i_o_p") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('angle')) has-error @endif">
                    <label for="angle-field">Angle</label>
                    <input type="text" id="angle-field" name="angle1" class="form-control" value="{{  $reservation->examination[1]["angle"] }}"/>
                    @if($errors->has("angle"))
                        <span class="help-block">{{ $errors->first("angle") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('reservation_id')) has-error @endif">
                    {{--<label for="reservation_id-field">Reservation_id</label>--}}
                    <input type="hidden" id="reservation_id-field" name="reservation_id1" class="form-control"
                           value="{{ $reservation->id }}"/>
                    @if($errors->has("reservation_id"))
                        <span class="help-block">{{ $errors->first("reservation_id") }}</span>
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Update</button>

                </div>
         </form>
        </div>
    </div>
