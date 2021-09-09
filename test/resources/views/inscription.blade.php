@extends('layout')

@section('content')
    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold">S'inscrire</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4"></p>

            <form action="/inscription" method="post">
                {{csrf_field()}}
                <p><input type="text" name="name" placeholder="votre nom" value="{{ old('name') }}"></p>
                @if($errors->has('name'))
                    <p>{{ $errors->first('name') }}</p>
                @endif
                <p><input type="email" name="email" placeholder="Email" value="{{ old('email') }}"></p>
                @if($errors->has('email'))
                    <p>{{ $errors->first('email') }}</p>
                @endif
                <p><input type="password" name="password" placeholder="Mot de passe"></p>
                @if($errors->has('password'))
                    <p>{{ $errors->first('password') }}</p>
                @endif

                <p><input type="password" name="password_confirmation" placeholder="Mot de passe (confirmation)"></p>
                @if($errors->has('password_confirmation'))
                    <p>{{ $errors->first('password_confirmation') }}</p>
                @endif

                <p><input type="submit" value="M'inscrire"></p>
            </form>
        </div>


@endsection
