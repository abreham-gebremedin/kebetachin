@extends('layouts.app')

@section('content')
    <h1>Step 1</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
     <form action="/location1" method="POST">
        @csrf
     <input type="text" name="country" class="form-controll" placeholder="Enter name" value="{{ session()->get('location.country') }}">
     <input type="text" name="region" class="form-controll" placeholder="Enter name" value="{{ session()->get('location.region') }}">
     <input type="text" name="city" class="form-controll" placeholder="Enter name" value="{{ session()->get('location.city') }}">

         <button type="submit" class="btn btn-primary">Continue</button>
     </form>
     @endsection