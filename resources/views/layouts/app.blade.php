<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootsrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
        integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                @if(Auth::check())
                <div class="col-lg-4 py-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('categories')}}">All Category</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('category.create')}}">Create New Category</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('post')}}">All Post</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('post.create')}}">Create New Post</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('post.trashed')}}">All Trashed Post</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('tags')}}">All Tags</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('tags.create')}}">Create Tags</a>
                        </li>
                        @if(Auth::user()->admin)
                        <li class="list-group-item">
                            <a href="{{route('users')}}">All Users</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('users.create')}}">Add Users</a>
                        </li>
                        @endif
                        <li class="list-group-item">
                            <a href="{{route('users.profile')}}">My profile</a>
                        </li>
                        @if(Auth::user()->admin)
                        <li class="list-group-item">
                            <a href="{{route('settings')}}">Site Settings</a>
                        </li>
                        @endif
                    </ul>
                </div>
                @endif
                <div class="col-lg-8 py-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ asset('js/toastr.min.js') }}">
    </script>
    <script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif

    @if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}")
    @endif
    </script>
    @yield('scripts')
</body>

</html>