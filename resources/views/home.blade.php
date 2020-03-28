@extends('layout')

@section('content')

    <p>Welcome to the Covid Collective, a central place to find the help and resources you need during the Covid-19 crisis.</p>

    <p>
        <a class="btn btn-light btn-lg btn-block" href="{{route('groups')}}">
            <i class="fas fa-users"></i>
            &nbsp;
            Find a support group near you
        </a>
    </p>

    <p>
        <a class="btn btn-light btn-lg btn-block" href="{{route('resources')}}">
            <i class="fas fa-file"></i>
            &nbsp;
            Find resources to help you
        </a>
    </p>
    
@endsection
