 <div class="row">
     @foreach($reservation->examination as $exam)
        <div class="col-md-4">
            <form action="{{ route('examinations.update', $exam ['id']) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <?php   
                    $eyeType=['right','left'];
                    $vision=['6/6','6/9','6/12','6/18','6/24','6/36','6/60','5/60','4/60','3/60','2/60','1/60','H.M','PL','No_Pl'];
                ?>

                <div class="form-group @if($errors->has('eye_type')) has-error @endif">
                     
                         @if($exam['eye_type'] == 0) 
                            <input type="text" id="eye_type-field" name="eye_type" class="form-control" value="{{"Right Eye"}}"/>
                        @else 
                             <input type="text" id="eye_type-field" name="eye_type" class="form-control" value="{{"Left Eye"}} "/>
                        @endif 
                       
                    <select id="eye_type-field" name="eye_type" class="form-control">
                        @foreach($eyeType as $key=>$types)
                            @if($exam['eye_type']==$key)
                                <option selected value={{ $types[$exam['eye_type']] }}>{{ $types }}</option>
                            @else
                                <option value={{ $key }}>{{ $types }}</option>
                            @endif

                        @endforeach
                    </select>
                    @if($errors->has("eye_type"))
                        <span class="help-block">{{ $errors->first("eye_type") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('vision')) has-error @endif">
                       <label for="vision-field">Vision</label>
                        <select id="vision-field" name="vision" class="form-control">
                            @foreach($vision as $key=>$types)
                                @if($exam['vision']==$key)
                                    <option selected value={{ $types[$exam['eye_type']] }}>{{ $types }}</option>
                                  @else
                                    <option value={{ $key }}>{{ $types }}</option>
                                @endif

                            @endforeach
                        </select>
                        @if($errors->has("vision"))
                        <span class="help-block">{{ $errors->first("vision") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('lid')) has-error @endif">
                       <label for="lid-field">Lid</label>
                    <input type="text" id="lid-field" name="lid" class="form-control" value="{{$exam['vision']}}"/>
                       @if($errors->has("lid"))
                        <span class="help-block">{{ $errors->first("lid") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('conjunctiva')) has-error @endif">
                       <label for="conjunctiva-field">Conjunctiva</label>
                    <input type="text" id="conjunctiva-field" name="conjunctiva" class="form-control" value="{{ $exam['conjunctiva'] }}"/>
                       @if($errors->has("conjunctiva"))
                        <span class="help-block">{{ $errors->first("conjunctiva") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cornea')) has-error @endif">
                       <label for="cornea-field">Cornea</label>
                    <input type="text" id="cornea-field" name="cornea" class="form-control" value="{{ $exam['cornea'] }}"/>
                       @if($errors->has("cornea"))
                        <span class="help-block">{{ $errors->first("cornea") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('a_c')) has-error @endif">
                       <label for="a_c-field">A_c</label>
                    <input type="text" id="a_c-field" name="a_c" class="form-control" value="{{ $exam['a_c'] }}"/>
                       @if($errors->has("a_c"))
                        <span class="help-block">{{ $errors->first("a_c") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('pupil')) has-error @endif">
                       <label for="pupil-field">Pupil</label>
                    <input type="text" id="pupil-field" name="pupil" class="form-control" value="{{ $exam['pupil'] }}"/>
                       @if($errors->has("pupil"))
                        <span class="help-block">{{ $errors->first("pupil") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('lens')) has-error @endif">
                       <label for="lens-field">Lens</label>
                    <input type="text" id="lens-field" name="lens" class="form-control" value="{{ $exam['lens'] }}"/>
                       @if($errors->has("lens"))
                        <span class="help-block">{{ $errors->first("lens") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fundus')) has-error @endif">
                       <label for="fundus-field">Fundus</label>
                    <input type="text" id="fundus-field" name="fundus" class="form-control" value="{{ $exam['fundus'] }}"/>
                       @if($errors->has("fundus"))
                        <span class="help-block">{{ $errors->first("fundus") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('i_o_p')) has-error @endif">
                       <label for="i_o_p-field">I_o_p</label>
                    <input type="text" id="i_o_p-field" name="i_o_p" class="form-control" value="{{ $exam['i_o_p'] }}"/>
                       @if($errors->has("i_o_p"))
                        <span class="help-block">{{ $errors->first("i_o_p") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('angle')) has-error @endif">
                       <label for="angle-field">Angle</label>
                    <input type="text" id="angle-field" name="angle" class="form-control" value="{{ $exam['angle'] }}"/>
                       @if($errors->has("angle"))
                        <span class="help-block">{{ $errors->first("angle") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('reservation_id')) has-error @endif">
                    <input type="text" id="reservation_id-field" name="reservation_id" class="form-control" value="{{ $exam['reservation_id'] }}"/>
                       @if($errors->has("reservation_id"))
                        <span class="help-block">{{ $errors->first("reservation_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
        @endforeach
    </div>