@extends('layout')

@section('content')

    <h1>Resources</h1>

    <div class="row">
        
        @foreach($resources as $resource)
            <div class="col-sm-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong>
                                {{$resource->title}}
                            </strong>
                        </h5>
                        <h6 class="card-subtitle mb-2 row">
                            <a class="col-sm 3" href="#">
                                <i class="@icon($resource->category)"></i> &nbsp; {{$resource->category}}
                            </a>
                            <a class="col-sm 3" href="#">
                                <i class="@icon($resource->audience)"></i> &nbsp; {{$resource->audience}}
                            </a>
                            <a class="col-sm 3" href="#">
                                <i class="@icon($resource->cost)"></i> &nbsp; {{$resource->cost}}
                            </a>
                            <a class="col-sm 3" href="#">
                                <i class="@icon($resource->media)"></i> &nbsp; {{$resource->media}}
                            </a>
                        </h6>

                        {{$resource->description}}
                    </div>
                </div>
            </div>
        @endforeach
    
    </div>

@endsection
