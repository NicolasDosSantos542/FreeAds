@extends('layout')

@section('content')

    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1>Mon Compte</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4"></p>

            <p>Le mien à moi que j'ai.</p>
         
            <form action="/modification-name" method="post">
                {{csrf_field()}}
                <p><input type="text" name="name" placeholder="{{ auth()->user()->name }}" value="{{ old('name') }}">
                    <input type="submit" value="Modifier"></p>
                @if($errors->has('name'))
                    <p>{{ $errors->first('name') }}</p>
                @endif


            </form>
            <form action="/modification-email" method="post">
                {{csrf_field()}}

                <p><input type="email" name="email" placeholder="{{ auth()->user()->email }}" value="{{ old('email') }}">
                    <input type="submit" value="Modifier"></p>
                @if($errors->has('email'))
                    <p>{{ $errors->first('email') }}</p>
                @endif
            </form>
            <form action="/modification-password" method="post">
                {{csrf_field()}}

                <p><input type="password" name="password" placeholder="Nouveau mot de passe"></p>
                @if($errors->has('password'))
                    <p>{{ $errors->first('password') }}</p>
                @endif

                <p><input type="password" name="password_confirmation" placeholder="Mot de passe (confirmation)"></p>
                @if($errors->has('password_confirmation'))
                    <p>{{ $errors->first('password_confirmation') }}</p>
                @endif

                <p><input type="submit" value="Modifier"></p>
            </form>

        </div>

@endsection
