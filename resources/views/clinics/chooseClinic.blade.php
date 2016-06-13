@extends('adminLayout')
@section('content')
    <label for="sel1"><h3>Select Your Clinic</h3></label>
    <select name="sel1" id="sel1" class="form-control">
        <option>Select Your Current Clinic</option>
        @foreach($clinics as $clinic)
            <option value="{{ $clinic->id }}">{{ $clinic->name }}</option>
        @endforeach
    </select>
@endsection