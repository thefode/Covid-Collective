@extends('layout')

@section('content')
    
<div class="row">
    <div class="col-lg-8">

        <p>There are loads of ways to do your part to help everyone out during this crisis.</p>
        
        <h4 class="mt-4">1. Follow the guidance</h4>
        <p>The most important thing to do is follow the governments guidance on how to reduce the spread and flatten the curve.</p>
        <p>
            <a href="https://www.gov.uk/coronavirus">Read the GovUK Guidance &raquo;</a>
        </p>

        <h4 class="mt-4">2. Track your symptoms</h4>
        <p>Report your symptom (or lack of them) dailing using COVID Sympton Tracker app to help track the spread of the coronavirus.</p>
        <p>
            <a href="https://covid.joinzoe.com/">Get the app at covid.joinzoe.com &raquo;</a>
        </p>
        
        <h4 class="mt-4">3. Join a local support group</h4>
        <p>There are support groups all over the country, find and join yours today.</p>
        <p>
            <a href="{{route('groups')}}">Find a support group &raquo;</a>
        </p>
        
        <h4 class="mt-4">4. Lend us a hand</h4>
        <p>This is a one-man project currently, but you can contibute through GitHub.</p>
        <p>
            <a href="https://github.com/mchristie/Covid-Collective">Fork me on GitHub &raquo;</a>
        </p>

    </div>
</div>

@endsection
