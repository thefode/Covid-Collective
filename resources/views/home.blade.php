@extends('layout')

@section('content')

    <p>
        Welcome to the Covid Collective, a central place to find the help and resources you need during the Covid-19 crisis.
    </p>

    <p>
        This is still very much a work in progress, if you'd like to help us please email <a href="mailto:hello@covid-collective.co.uk">hello@covid-collective.co.uk</a>.
    </p>

    <div class="row">

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Support Groups</h5>
                    <p class="card-text">
                        Support groups all over the country are helping their neighbours during these hard times.
                    </p>
                    <a href="{{route('groups')}}" class="btn btn-primary">Support Groups</a>
                </div>
            </div>
        </div>
        
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Resources</h5>
                    <p class="card-text">
                        Browse our list of online resources to help you through this hard time.
                    </p>
                    <a href="{{route('resources')}}" class="btn btn-primary">Resources</a>
                </div>
            </div>
        </div>
        
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Volunteer</h5>
                    <p class="card-text">
                        Find people or charities in need of support and lend them a hand.
                    </p>
                    <a href="{{route('volunteer')}}" class="btn btn-primary">Volunteer</a>
                </div>
            </div>
        </div>

    </div>

{{--     
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
     --}}
@endsection
