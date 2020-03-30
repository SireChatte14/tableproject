<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset   ="utf-8">
    <meta name      = "viewport" content= "width=device-width, initial-scale=1" >
    <meta name      ="keywords">
    <meta name      ="author" content="Carsten Behmel">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/e9e2ae9c52.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel       ="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel       ="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?famaly=Noto+Sans:400,700' rel='stylesheet' type='txt/css'>
     <!-- Styles -->
    <link href="{{ asset('css/headers.css') }}" rel="stylesheet">
</head>
<header>

    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <img src="{{URL::asset('img/Logo.jpg')}}" alt="Logo" style="width:50px;">
            <div class="navbar-dark" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <button class    = "navbar-toggler" type= "button" data-toggle= "collapse" data-target= "#navbarNavAltMarkup" aria-controls= "navbarNavAltMarkup" aria-expanded= "false" aria-label= "Toggle navigation" >
                          <span class    = "navbar-toggler-icon" ></span>
                        </button>
                          <div class     = "collapse navbar-collapse" id= "navbarNavAltMarkup" >
                           <div class    = "navbar-nav" > <a class= "nav-item nav-link active" href= "/home" > Home <span class = "sr-only" > (current) </span></a>
                               <a class  = "nav-item nav-link" href="{{route('admin.MenuEdit.index')}}" > Speisekarte </a>
                               <a class  = "nav-item nav-link" href="{{route('admin.TableBook.index')}}" > Anfragen  </a>
                               <a class  = "nav-item nav-link" href="{{route('admin.TableEdit.index')}}" > Tische </a>
                               <a class  = "nav-item nav-link" href="{{route('admin.fullcalendar.index')}}" > Reservierungen </a>
                               @auth()
                                   <a class  = "nav-item nav-link" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}
                                   </a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"></form>
                                   @csrf
                                           <div class="container mt-1" style="color:darkgray">
                                               <i class="fa fa-user  mt-1" style="color:darkgray"></i>
                                               {{ Auth::user()->name }} ({{auth()->user()->role()->pluck('name')->implode(",")}})
                                           </div>
                               @endauth
                           </div>
                          </div>
                    </ul>
                </div>
        </nav>
    </div>
</header>
<main class="py-4">
    @yield('content')
</main>

