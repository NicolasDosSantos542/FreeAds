<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
            integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
            integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
            crossorigin="anonymous"></script>


</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="btn btn-outline-light me-2 {{ request()->is('/') ? 'active' : '' }} ">Accueil</a>
                </li>
                @if(auth()->check())
                    <li><a href="/utilisateurs/{{ auth()->user()->email}}"
                           class="btn btn-outline-light {{ request()->is('/utilisateurs/'. auth()->user()->email) ? 'active' : '' }}">mes annonces</a>
                    </li>
                @endif


            </ul>

            {{--  <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                  <input type="search" class="form-control form-control-dark" placeholder="Search...">
              </form>--}}

            <div class="text-end">
                @if( auth()->check())
                    <a href="/mon-compte"
                       class="btn btn-outline-light me-2 {{ request()->is('mon-compte') ? 'active' : '' }}">Mon
                        compte</a>
                    <a href="/deconnexion"
                       class="btn btn-outline-light {{ request()->is('deconnexion') ? 'active' : '' }}">Se
                        déconnecter</a>
                @else
                    <a href="/connexion"
                       class="btn btn-outline-light me-2 {{ request()->is('connexion') ? 'active' : '' }}">Connexion</a>
                    <a href="/inscription"
                       class="btn btn-outline-light {{ request()->is('inscription') ? 'active' : '' }}">inscription</a>
                @endif

            </div>
        </div>
    </div>
</header>

@include('flash::message')

@yield('content')

</body>
</html>
