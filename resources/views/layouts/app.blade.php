<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- <meta id="token" name="token" content="{ { csrf_token() } }"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">


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
                        {{-- Guide --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Guides
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('guide.index') }}">View all guides</a>
                                <a class="dropdown-item disabled" href="#">Categories to be filled</a>
                            </div>
                        </li>

                        {{-- Courses --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Courses
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item disabled" href="#">Action</a>
                                <a class="dropdown-item disabled" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item disabled" href="#">Something else here</a>
                            </div>
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
                                class="badge badge-info">{{auth()->user()->unreadNotifications->count()}}</span>
                            Notifications</a>
                        @if (auth()->user()->hasGroup('Teacher'))


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Teacher's zone
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('teacher.dashboard-general') }}">My Teacher
                                    Dashboard</a>
                                <a class="dropdown-item" href="{{ route('guide.create') }}">Create guide</a>
                                <a class="dropdown-item disabled" href="#">Create Course</a>
                                <a class="dropdown-item disabled" href="#">Courses</a>
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
            <div class="container p-0 m-0">
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger ">
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                <li class="list-group-item text-danger">
                                    {{$error}}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif


                    </div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->


    <script src="{{ asset('js/app.js') }}"></script>
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