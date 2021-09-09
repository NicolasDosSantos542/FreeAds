@extends('layout')

@section('content')



    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold">{{ $annonce->titre }}</h1>

        <div class="col-lg-6 mx-auto">
            <small class="text-muted">{{ $annonce->created_at }}</small>
            <img src="/storage/{{ $annonce->photo }}" width="500" alt="">
            <p class="lead mb-4">prix : {{ $annonce->prix }} €</p>

            <p class="lead mb-4">{{ $annonce->contenu }}</p>

        </div>

    </div>
    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1>Modifier</h1>


        @if (auth()->check())
            <form action="/changeAnnonce/{{ $annonce->id }}" method="post" enctype='multipart/form-data'>
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
                        <button class="button is-link" type="submit">Modifier</button>
                    </div>
                </div>
            </form>
        @endif

    </div>

@endsection
