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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vue-datetime.css') }}" rel="stylesheet">
    @toastr_css
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Zip Code Rocks
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> Login <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a href="{{ url('/auth/github') }}" class="btn btn-github"><i class="fa fa-github"></i>Student</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/auth/google') }}" class="btn btn-github"><i class="fa fa-github"></i>Staff</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            @if(Auth::user()->isStaff())
                                <li class="nav-item"><a class="nav-link" href="{{ route('staffportal.students') }}">Students</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('staffportal.assessments.new') }}">New Assessment</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('staffportal.labs') }}">Labs</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('staffportal.exams') }}">Exams</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('staffportal.quizes') }}">Quizes</a></li>
                            @elseif(Auth::user()->isStudent())
                                <li class="nav-item"><a class="nav-link" href="{{ route('studentportal.profile') }}">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('studentportal.labs') }}">Labs</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('studentportal.exams') }}">Exams</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('studentportal.quizes') }}">Quizes</a></li>
                                <li class="nav-item"><a class="nav-link" target="_blank" href="https://github.com/{{ Auth::user()->student->github_username }}/repositories">My Github</a></li>
                            @endif
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
        </nav>

        <main class="py-4">
            @yield('content')
                </main>
    </div>
    @jquery
    @toastr_js
    @toastr_render
</body>
</html>
