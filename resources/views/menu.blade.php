@php
    $current = Route::currentRouteName();
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light pl-0">
    {{-- <a class="navbar-brand" href="#">Navbar</a> --}}

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto nav-pills">

            @php
                $pages = [
                    'home' => 'Home',
                    'groups' => 'Groups',
                    'resources' => 'Resources',
                    'volunteer' => 'Volunteer',
                    'waysToHelp' => 'Ways to Help'
                ];
            @endphp
            @foreach($pages as $route => $title)

                <li class="nav-item mr-lg-3 @if($current === $route) active @endif">
                    <a class="nav-link @if($current === $route) text-primary font-weight-bold @endif"
                        href="{{ route($route) }}"
                    >
                        {{$title}}
                    </a>
                </li>

            @endforeach
            
            {{-- 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            --}}
        </ul>
        {{-- 
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        --}}
    </div>
</nav>
