@extends('layout')

@section('content')



<div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold">{{ $annonce->titre }}</h1>
    <div class="col-lg-6 mx-auto">
        <small class="text-muted">{{ $annonce->created_at }}</small>
        <img src="/storage/{{ $annonce->photo }}" width="500" alt="">

        <p class="lead mb-4">{{ $annonce->contenu }}</p>

    </div>



@endsection
