<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- <meta id="token" name="token" content="{ { csrf_token() } }"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/home') }}">
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
                        <li class="nav-item ">
                            <a href="{{route('home.get-started')}}"
                                class="nav-link disabled {{Request::is('get-started') ? 'active' : ''}}">Get started</a>
                        </li>
                        {{-- Guide & Courses --}}
                        <li class="nav-item ">
                            <a href="{{ route('asset.index') }}" class="nav-link">Guides & Courses</a>
                        </li>
                        <li class="nav-item"><a href="{{route('home.faq')}}"
                                class="nav-link disabled {{Request::is('faq') ? 'active' : ''}}">FAQ</a></li>
                        <li class="nav-item"><a href="{{route('home.contact')}}"
                                class="nav-link {{Request::is('contact') ? 'active' : ''}}">Contact</a></li>
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
                        <a href="{{ route('member.dashboard') }}"
                            class="nav-link {{Request::is('member/dashboard*') ? 'active' : ''}}">My dashboard</a>
                        <a href="{{ route('notifications.index') }}"
                            class="nav-link {{Request::is('notifications') ? 'active' : ''}}"><span
                                class="badge badge-naucma">{{auth()->user()->unreadNotifications->count()}}</span>
                            Notifications</a>
                        @if (auth()->user()->hasGroup('Teacher'))


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Teacher's zone
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('teacher.dashboard') }}">My Teacher
                                    Dashboard</a>
                                <a class="dropdown-item" href="{{ route('asset.create','guide') }}">Create guide</a>
                                <a class="dropdown-item" href="{{ route('asset.create','course') }}">Create Course</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item disabled" href="#">My teacher profile</a>
                            </div>
                        </li>
                        @endif
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
        <main class="">
            @if (session()->has('success') || session()->has('errors'))
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('success'))
                        <script>
                            $.notify({
                                // options
                                message: '{{session()->get('success')}}' ,
                                icon: 'fa fa-check'
                            },{
                                // settings
                                type: 'success'
                            });
                        </script>
                        @endif
                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <script>
                            $.notify({
                                // options
                                message: '{{$error}}' ,
                                icon: 'fa fa-exclamation-circle'
                            },{
                                // settings
                                type: 'danger'
                            });
                        </script>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script>
        window.AuthUser = '{!! auth()->user() !!}'

        window.__auth = function () {
            try {
                return JSON.parse(AuthUser)
            } catch (error) {
                return null
            }
        } 
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    </script>
    @yield('scripts')
</body>

</html>