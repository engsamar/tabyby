<div class="row">
        <div class="col-md-12">
            <form action="{{ route('exam_glasses.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div style="width:50%">
                    <table>
                        <tr>
                            <th></th>
                            <th>Sph.</th>
                            <th>Cyl</th>
                            <th>Axis</th>
                            <th>Sph.</th>
                            <th>Cyl</th>
                            <th>Axis</th>
                        </tr>
                        @for($i=0;$i<6;$i++)
                            @if($i==2)
                                <tr>
                                    <td><h5>Note</h5></td>
                                    <td><textarea id="note" name="note" class="form-control"></textarea></td>
                                </tr>

                    </table>
                    <table>
                        <tr>
                            <th></th>
                            <th>Sph.</th>
                            <th>Cyl</th>
                            <th>Axis</th>
                            <th>Sph.</th>
                            <th>Cyl</th>
                            <th>Axis</th>
                        </tr>
                        <tr>
                            <td><h5>{{ $examGlassType[$i]  }}</h5></td>
                            <td><input type="text" id="sphr-field" name="sphr{{ $i }}" class="form-control"
                                       value="{{ old("sphr") }}"/></td>
                            <td><input type="text" id="cylr-field" name="cylr{{ $i }}" class="form-control"
                                       value="{{ old("cylr") }}"/></td>
                            <td><input type="text" id="axisr-field" name="axisr{{ $i }}" class="form-control"
                                       value="{{ old("axisr") }}"/></td>
                            <td><input type="text" id="sphl-field" name="sphl{{ $i }}" class="form-control"
                                       value="{{ old("sphl") }}"/></td>
                            <td><input type="text" id="cyll-field" name="cyll{{ $i }}" class="form-control"
                                       value="{{ old("cyll") }}"/></td>
                            <td><input type="text" id="axisl-field" name="axisl{{ $i }}" class="form-control"
                                       value="{{ old("axisl") }}"/></td>
                        </tr>
                        @else
                            <tr>
                                <td><h5>{{ $examGlassType[$i]  }}</h5></td>
                                <td><input type="text" id="sphr-field" name="sphr{{ $i }}" class="form-control"
                                           value="{{ old("sphr") }}"/></td>
                                <td><input type="text" id="cylr-field" name="cylr{{ $i }}" class="form-control"
                                           value="{{ old("cylr") }}"/></td>
                                <td><input type="text" id="axisr-field" name="axisr{{ $i }}" class="form-control"
                                           value="{{ old("axisr") }}"/></td>
                                <td><input type="text" id="sphl-field" name="sphl{{ $i }}" class="form-control"
                                           value="{{ old("sphl") }}"/></td>
                                <td><input type="text" id="cyll-field" name="cyll{{ $i }}" class="form-control"
                                           value="{{ old("cyll") }}"/></td>
                                <td><input type="text" id="axisl-field" name="axisl{{ $i }}" class="form-control"
                                           value="{{ old("axisl") }}"/></td>
                            </tr>
                        @endif
                        @endfor
                    </table>
                    {{--</div>--}}
                    {{--<div class="form-group @if($errors->has('reservation_id')) has-error @endif">--}}
                    <input type="hidden" id="reservation_id-field" name="reservation_id" class="form-control"
                           value="{{ $reservation->id }}"/>
                    @if($errors->has("reservation_id"))
                        <span class="help-block">{{ $errors->first("reservation_id") }}</span>
                    @endif
                    {{--</div>--}}
                    {{--<div class="well well-sm">--}}
                    <button type="submit" class="btn btn-primary">Create</button>
                    
                    {{--</div>--}}
                </div>
            </form>


        </div>
    </div>