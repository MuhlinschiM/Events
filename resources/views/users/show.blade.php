@extends('layout')

@section('main')
<h1>User info</h1>

<p><strong>Name:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>

<a href="/users">← Back</a>
@endsection
