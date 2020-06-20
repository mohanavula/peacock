<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Peacock') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts 
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    -->
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <header class="bg-yellow-500">
            <div class="flex px-4 py-3 items-center justify-between ">
              <div class="">
                <h2 class="text-xl text-gray-700 font-semibold">Word<span class="text-gray-900 font-bold">Z</span></h2>
              </div>
              <div>
                <button @click="isOpen = !isOpen" type="buton" class="block text-white focus:text-yellow-100 focus:outline-none">
                  <svg class="ham hamRotate ham8 h-8 w-8 fill-current" viewBox="0 0 100 100"  onclick="this.classList.toggle('active')">
                    <g>
                      <path
                            class="line top"
                            d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20" />
                      <path
                            class="line middle"
                            d="m 30,50 h 40" />
                      <path
                            class="line bottom"
                            d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20" />
                    </g>
                  </svg>
                </button>
              </div>
            </div>
            <div :class="isOpen ? 'block' : 'hidden'" class="px-4 pb-3 text-left">
              <a href="#" class="block text-gray-700 font-light hover:font-semibold">Easy</a>
              <a href="#" class="block text-gray-700 font-light hover:font-semibold">Medium</a>
              <a href="#" class="block text-gray-700 font-light hover:font-semibold">Advanced</a>
            </div>
          </header>



        <!-- top navbar -->
        <nav id="header" class="w-full z-30 py-1 bg-yellow-600 shadow-lg border-b border-yellow-800">
            <div class="w-full flex items-center justify-between mt-0 px-6 py-2">
            <label for="menu-toggle" class="cursor-pointer sm:hidden block">
                <svg class="fill-current text-gray-200" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>
            <input class="hidden" type="checkbox" id="menu-toggle">
            
            <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
                <nav>
                    <ul class="md:flex items-center justify-between text-base text-gray-600 pt-4 md:pt-0">
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" href="#">Home</a></li>
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" href="#">Products</a></li>
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" href="#">About</a></li>
                    </ul>
                </nav>
            </div>
            
            <div class="order-2 md:order-3 flex flex-wrap items-center justify-end mr-0 md:mr-4" id="nav-content">
                <div class="auth flex items-center w-full md:w-full">
                    <button class="bg-transparent text-gray-800  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">Sign in</button>
                    <button class="bg-blue-600 text-gray-200  p-2 rounded  hover:bg-blue-500 hover:text-gray-100">Sign up</button>
                </div>
            </div>
            </div>
        </nav>

        <nav class="w-full z-30 py-1 bg-yellow-600 shadow-lg border-b border-yellow-800">
            <div class="w-full flex items-center justify-between mt-0 px-6 py-2">
                <a class="text-gray-800 uppercase" href="{{ url('/') }}">
                    {{ config('app.name', 'Peacock') }}
                </a>

                <div class="flex items-center">
                    <!-- Left Side Of Navbar -->
                    <ul class="ml-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="text-gray-800 hover:text-gray-200">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
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
</body>
</html>
