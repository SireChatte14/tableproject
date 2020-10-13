<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset   ="utf-8">
    <meta name      ="viewport" content= "width=device-width, initial-scale=1" >
    <meta name      ="keywords">
    <meta name      ="author" content="Carsten Behmel">
    <meta name="referrer" content="strict-origin-when-cross-origin" />
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
    <link href="{{ asset('css/Event.css')}}" rel="stylesheet">
</head>
<header>
    <div id="app">
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-dark p-4">
                        <a class= "nav-item nav-link active" href= "/home" style="font-size: 20px;font-family:SansSerif, cursive;color: palegoldenrod "> Home <span class = "sr-only" > (current) </span></a>
                               <a class  = "nav-item nav-link " href="{{route('admin.Opening.index')}}" style="font-size: 20px;font-family:SansSerif, cursive;color: palegoldenrod "> Opening Hours </a>
                               <a class  = "nav-item nav-link " href="{{route('admin.MenuEdit.index')}}" style="font-size: 20px;font-family:SansSerif, cursive;color: palegoldenrod "> Speisekarte </a>
                               <a class  = "nav-item nav-link" href="{{route('admin.TableBook.index')}}" style="font-size: 20px;font-family:SansSerif, cursive;color: palegoldenrod "> Anfragen  </a>
                               <a class  = "nav-item nav-link" href="{{route('admin.TableEdit.index')}}" style="font-size: 20px;font-family:SansSerif, cursive;color: palegoldenrod "> Tische </a>
                               <a class  = "nav-item nav-link" href="{{route('admin.Event.index')}}" style="font-size: 20px;font-family:SansSerif, cursive;color: palegoldenrod " > Reservation </a>
                               <a class  = "nav-item nav-link" href="{{route('admin.User.index')}}" style="font-size: 20px;font-family:SansSerif, cursive;color: palegoldenrod "> User</a>
                               <a class  = "nav-item nav-link" href="{{route('admin.fullcalendar.index')}}" style="font-size: 20px;font-family:SansSerif, cursive;color: palegoldenrod "> Calendar</a>
                               @auth()
                                   <a class  = "nav-item nav-link" href="{{ route('logout') }}"style="font-size: 20px;font-family:SansSerif, cursive;color: palegoldenrod "

                                      onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}
                                   </a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                       @csrf
                                       @endauth
                                   </form>

                                   @auth()
                                       <div class="container mt-1" style="font-size: 20px;font-family:SansSerif, cursive;color: palegoldenrod " >
                                           <i class="fa fa-user  mt-1" style="color:palegoldenrod "></i>
                                           {{ Auth::user()->name }} ({{auth()->user()->role()->pluck('name')->implode(",")}})
                                       </div>
                                   @else
                                       <div class="container mt-1" style="color:darkgray">
                                           <i class="fa fa-user  mt-1" style="color:darkgray"></i>
                                           Gast
                                       </div>
                                   @endauth
                           </div>
                          </div>
                <nav class="navbar navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
    </div>
<main class="py-4">
    @yield('content')
</main>

</header>
