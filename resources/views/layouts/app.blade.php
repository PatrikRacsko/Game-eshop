<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>All Points Gaming</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    .page-footer
{
    bottom: 0;
    width: 100%;
    background-color: #343a40;
    color: white;
}
    </style>
<body>
        
    <div id="app">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <a href="{{ url('/') }}" class="navbar-brand">ALL POINTS GAMING</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="navbar-nav ml-auto">        
                                @guest
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link"><span class="fas fa-sign-in-alt"></span> {{ __('Prihlasenie') }}</a>
                                </li>
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="nav-link"><span class="fas fa-user-plus"></span> {{ __('Registracia') }}</a>
                                    @endif
                                </li>
                                <li class="nav-item">
                                <a href="{{ route('product.shoppingCart') }}" class="nav-link"><i class="fas fa-shopping-cart"></i>
                                             Košík
                                        <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                            </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('product.shoppingCart') }}" class="nav-link"><span class="fas fa-shopping-cart"></span>
                                         Košík
                                         <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                        </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            Odhlásiť sa
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
@yield('scripts')
<footer class="page-footer font-small footer-dark pt-4">
        <h1 class="display-4 text-center">ALL POINTS GAMING - HOME FOR GAMERS</h1>
        <div class="footer-copyright text-center py-3">Patrik Racsko © 2018</div>
</footer>
</html>
