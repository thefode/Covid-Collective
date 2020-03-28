@extends('layout')

@section('content')

    <p>This is some blurb about support groups.</p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">City</th>
                <th scope="col">Area</th>
                <th scope="col">Contact</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->city }}</td>
                    <td>{{ $group->area }}</td>
                    <td>
                        @if($group->facebook)
                            <a href="{{$group->facebook}}" class="btn btn-light group-link">
                                    <i class="fab fa-facebook-square icon facebook"></i> Facebook
                            </a>
                        @endif
                        &nbsp;
                        @if($group->whatsapp)
                            <a href="{{$group->whatsapp}}" class="btn btn-light group-link">
                                    <i class="fab fa-whatsapp-square icon whatsapp"></i> WhatsApp
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
