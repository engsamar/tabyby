@extends('layout')
@section('css')

@endsection
@section('content')
<!-- Page Title -->
    <article class="page-title">
    	<div class="auto-box">
        	<div class="row clearfix">
            	
                <div class="col-lg-6 col-xs-6">
                	<span class="page-name">{{ Auth::user()->username }}</span><span>/Reservation</span>
                </div>
                
                <div class="col-lg-6 col-xs-6 text-right">
              
                </div>
                
                
            </div>
        </div>
    </article>

    <!-- How We Help -->
        <section class="how-we-help">
        <div class="auto-box">
            <div class="row clearfix">
      <div class="col-lg-6 col-xs-6">
      @if(! $reservations->count())
                 <a class="btn btn-primary pull-right" href="{{ route('reservations.create') }}"> New Reservation</a>
        @endif
                </div>
                </div>
                </div>
                </section>
    <section class="how-we-help">
        <div class="auto-box">
            <div class="row clearfix">
              
                <!-- Steps -->
                <div class="col-md-6 col-sm-12 pull-left ">
                    <h4 class="spaced-blue">Reserved</h4>
                    @if($reservations->count())
                    @foreach($reservations as $key => $reservation)
                    <div class="step">
                        <div class="number img-circle ">{{$key+1}}</div>
                        <div class="description">
                            <h3 class="small-title">Reservation No.{{$reservation->id}}</h3>
                            <p>Clinic {{$reservation->clinic->name}} at {{$reservation->date}} on  {{$reservation->appointment}}</p>
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Cancel Reservation ? Are you sure?')) { return true } else {return false };">
                      <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <a class="btn btn-xs btn-warning btn-group" role="group" href="{{ route('reservations.edit', $reservation->id) }}"><i class="glyphicon glyphicon-edit"></i> Postpone</a>
                     <button type="submit" class="btn btn-xs btn-danger">Cancel Reservation <i class="glyphicon glyphicon-trash"></i></button>
                     </form>
                        </div>
                    </div>
                     @endforeach
                    {!! $reservations->render() !!}
                   
                    @endif
                </div>
                <!-- Steps End -->
              <div class="row clearfix">
                 <!-- Steps -->
                <div class="col-md-6 col-sm-12 pull-right ">
                    <h4 class="spaced-blue">Cancelled</h4>
                    @if($cancel_reservations->count())
                    @foreach($cancel_reservations as $key => $reservation)
                    <div class="step">
                        <div class="number img-circle ">{{$key+1}}</div>
                        <div class="description">
                            <h3 class="small-title">Reservation No.{{$reservation->id}}</h3>
                            <p>Clinic {{$reservation->clinic->name}} at {{$reservation->date}} on  {{$reservation->appointment}}</p>
                        </div>
                    </div>
                     @endforeach
                    {!! $cancel_reservations->render() !!}
                   
                    @endif
                </div>
                <!-- Steps End -->
            </div>
            </div>
        </div>
    </section>
@endsection