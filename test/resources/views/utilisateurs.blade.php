@extends('layout')

@section('content')
    <h1>Les utilisateurs : </h1>
    <ul class="list-group">
        @foreach($utilisateurs  as $utilisateur)
            <li class="list-group-item"><a class="btn" href="/utilisateurs/{{ $utilisateur->email }}">{{ $utilisateur->email }} </a></li>

        @endforeach
    </ul>

@endsection
