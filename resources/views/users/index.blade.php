@extends('layout')

@section('main')
<h1>Users list</h1>

<ul>
    @foreach ($users as $user)
        <li>
            <a href="{{ url('/users/'.$user->id) }}">
                {{ $user->name }} — {{ $user->email }}
            </a>
        </li>
    @endforeach
</ul>
@endsection
