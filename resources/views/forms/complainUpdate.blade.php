<div class="col-md-12">
  <form action="{{ route('complains.update',$reservation->complain['id']) }}" method="POST">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group @if($errors->has('complain')) has-error @endif">
             <label for="complain-field">Complain</label>
          <input type="text" id="complain-field" name="complain" class="form-control" value={{$reservation->complain['complain']}}/>
             @if($errors->has("complain"))
              <span class="help-block">{{ $errors->first("complain") }}</span>
             @endif
          </div>
          <div class="form-group @if($errors->has('h_of_complain')) has-error @endif">
             <label for="h_of_complain-field">H_of_complain</label>
          <input type="text" id="h_of_complain-field" name="h_of_complain" class="form-control" value={{$reservation->complain['h_of_complain']}}/>
             @if($errors->has("h_of_complain"))
              <span class="help-block">{{ $errors->first("h_of_complain") }}</span>
             @endif
          </div>

          @foreach ($reservation->complain->complainDetail as $detail)
          <div class="form-group @if($errors->has('diagnose')) has-error @endif">
          <label for="diagnose-field">Diagnose</label>
          <input type="text" id="diagnose-field" name="diagnose" class="form-control" value="{{ $detail['diagnose'] }}"/>
             @if($errors->has("diagnose"))
              <span class="help-block">{{ $errors->first("diagnose") }}</span>
             @endif
          </div>
          <div class="form-group @if($errors->has('plan')) has-error @endif">
             <label for="plan-field">Plan</label>
          <input type="text" id="plan-field" name="plan" class="form-control" value="{{ $detail['plan'] }}"/>
             @if($errors->has("plan"))
              <span class="help-block">{{ $errors->first("plan") }}</span>
             @endif
          </div>
          @endforeach
      <div class="well well-sm">
          <button type="submit" class="btn btn-primary">update</button>
      </div>
  </form>
</div>