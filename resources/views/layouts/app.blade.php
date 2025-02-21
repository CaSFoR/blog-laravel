<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ config('app.direction') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="icon" href="https://t3.ftcdn.net/jpg/04/92/58/22/360_F_492582289_wWmdu7AY85LuWF0PcLbxk0ftFnuQGumE.jpg" data-el-id="favicon">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


     <!--Scripts -->
    @vite(['resources/sass/app.scss'])


    @livewireStyles

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/blogs/blog-5/assets/css/blog-5.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito Sans';
            background-color: #f9f9f900;

        }

        .card-body{
            background-color: #fff;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            padding: 6px 12px;
            cursor: pointer;
        }

        .spinner {
            box-sizing: border-box;
            width: 17px;
            height: 17px;
            border: 2px solid #fff;
            border-radius: 50%;
            animation: lds-ring 1.2s cubic-bezier(0.5, 0.5, 0.5, 0.5) infinite;
            border-color: #000 #000 #000 transparent;
        }

        @keyframes lds-ring {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .balanced {
            max-inline-size: 50ch;
            text-wrap: balance;
        }
    </style>
</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container">
                <a class="navbar-brand" href="{{ env('APP_URL') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a href="{{ env('APP_URL') }}" class="nav-link">{{ __('Home') }}</a></li>
                        @auth
                        @if (auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}" class="nav-link">{{ __('Dashboard')}}</a>
                        </li>
                        @endif

                        @if (auth()->user()->isAuther())
                        <li class="nav-item">
                            <a href="{{ route('my-articles') }}" class="nav-link">{{ __('My Blogs')}}</a>
                        </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ route('favorite.index') }}" class="nav-link">{{ __('My Favorite')}}</a>
                        </li>
                        @endauth
                        <li class="nav-item">
                            <a href="{{ route('contact.index') }}" class="nav-link">{{ __('Contact Us')}}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-primary rounded-1" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                            <li class="nav-item dropdown">
                                @php
                                $userAvatar = Auth::user()->avatar ? asset(Auth::user()->avatar) :
                                'https://static.vecteezy.com/system/resources/previews/018/765/757/original/user-profile-icon-in-flat-style-member-avatar-illustration-on-isolated-background-human-permission-sign-business-concept-vector.jpg';
                                @endphp
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ $userAvatar }}" alt="user avatar"
                                        class="rounded-circle border avatar-auto object-fit-cover" width="36" height="36">
                                    {{ Auth::user()->username }}
                                </a>
                            
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ auth()->user()->isAdmin() ? route('editInfo') : route('dashboard') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                            
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
            
        </nav>



        @yield('content')

    </div>



    <footer class="text-center text-white">

        <div class="text-center p-3  text-black" style="background-color: rgba(0, 0, 0, 0.2);">
            &copy; 2020
            <a class="text-black text-decoration-none" href="{{ env('APP_URL') }}">WaleedAlharbi.com</a>
        </div>
  

    </footer>
       


    @yield('script')
    @livewireScripts

     
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>