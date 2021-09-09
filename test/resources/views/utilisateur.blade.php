@extends('layout')

@section('content')

    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1>{{ $utilisateur->email }}</h1>

        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4"></p>

            @if (auth()->check() AND auth()->user()->id === $utilisateur->id)
                <form action="/annonces" method="post" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="titre" placeholder="Titre">
                        </div>
                        @if($errors->has('titre'))
                            <p class="text-danger">{{ $errors->first('titre') }}</p>
                        @endif
                        <div class="col">
                            <input type="number" class="form-control" name="prix" placeholder="prix (euros)">
                        </div>

                    </div>
                    <div class="control">
                        <input type="file" class="" name="photo"> </input>
                    </div>
                    @if($errors->has('titre'))
                        <p class="text-danger">{{ $errors->first('photo') }}</p>
                    @endif
                    <div class="">
                        <label class="">annonce</label>
                        <div class="control">
                    <textarea class="" name="annonce" rows="5" cols="59"
                              placeholder="Qu'avez-vous à donner / vendre / troquer ?"></textarea>
                        </div>
                        @if($errors->has('annonce'))
                            <p class="text-danger">{{ $errors->first('annonce') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <div class="control">
                            <button class="button is-link" type="submit">Publier</button>
                        </div>
                    </div>
                </form>
            @endif

        </div>

        <div class="album py-5 bg-light">
            <div class="container-fluid">

                <div class="row">
                    @foreach($annonces as $annonce)

                        @include('partials.annonce-item', ['annonce'=>$annonce, 'auth'=>true])

                    @endforeach

                </div>
            </div>
        </div>

@endsection
