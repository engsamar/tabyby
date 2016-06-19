

<div class="row">
        <div class="col-md-12">
            <form action="{{ route('medical_histories.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="patient_id" value="{{ $reservation->user["id"] }}">
                <input type="hidden" name="res_id" value="{{ $reservation->id}}">
                <div class="form-group @if($errors->has('type')) has-error @endif">
                    <label for="type-field">Type</label>
                    <select id="type-field" name="type" class="form-control">
                        @foreach($medicalHistoryType as $key=>$type)
                            <option value={{ $key }}>{{ $type }}</option>
                        @endforeach
                    </select>
                    @if($errors->has("type"))
                        <span class="help-block">{{ $errors->first("type") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <input type="text" id="description-field" name="description" class="form-control" value="{{ old("description") }}"/>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>

                
                <div class="form-group @if($errors->has('begin_at')) has-error @endif">
                    <label for="begin_at-field">Begin_at</label>
                    <input type="date" id="begin_at-field" name="begin_at" class="form-control"
                           value="{{ old("begin_at") }}"/>
                    @if($errors->has("begin_at"))
                        <span class="help-block">{{ $errors->first("begin_at") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <input type="text" id="description-field" name="description" class="form-control" value="{{ old("description") }}"/>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>

        </div>
    </div>

    <script src="/js/jquery-ui.min.js"></script>
   <link rel="stylesheet" href="/css/jquery-ui.css">

<script type="text/javascript">

$("input[name='begin_at']").datepicker({
    dateFormat: "yy/mm/dd",
    minDate: "-3500w",
    maxDate: "-1d"
});

</script>