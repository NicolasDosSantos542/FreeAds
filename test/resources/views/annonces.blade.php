@extends('layout')

@section('content')

<h1>Toutes les annonces</h1>


    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($annonces as $annonce)
                @include('partials.annonce-item', ['annonce'=>$annonce, 'auth'=>false])
                @endforeach

            </div>
        </div>
    </div>
@endsection
