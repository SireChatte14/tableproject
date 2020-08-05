<div id="app">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-0">
        <img src="{{URL::asset('img/Logo.jpg')}}" alt="Logo" style="width:50px;">
        <div class="navbar-dark" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <button class    = "navbar-toggler" type= "button" data-toggle= "collapse" data-target= "#navbarNavAltMarkup" aria-controls= "navbarNavAltMarkup" aria-expanded= "false" aria-label= "Toggle navigation" >
                    <span class    = "navbar-toggler-icon" ></span>
                </button>
                <div class     = "collapse navbar-collapse" id= "navbarNavAltMarkup" >
                    <div class    = "navbar-nav" > <a class= "nav-item nav-link active" href= "/home" > Home <span class = "sr-only" > (current) </span></a>

                        <a class  = "nav-item nav-link" href="MenuCard" > Speisekarte </a>
                        <a class  = "nav-item nav-link" href="impressum" > Impressum </a>
                        <a class  = "nav-item nav-link" href="datenschutz" > Datenschutz</a>
                        @auth()
                            <a class  = "nav-item nav-link" href="tablebook" > Tischreservierung</a>
                        @endauth
                        @guest
                            <a class  = "nav-item nav-link" href="{{ route('login') }}" >Login</a>
                        @endguest
                        @auth()
                            <a class  = "nav-item nav-link" href="{{ route('logout') }}"

                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                @endauth
                            </form>

                            @can('is-admin')
                                <a class  = "nav-item nav-link" href="adminArea" > Adminbereich</a>
                            @endcan

                            @auth()
                                <div class="container mt-1" style="color:darkgray" >
                                    <i class="fa fa-user  mt-1" style="color:darkgray"></i>
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
            </ul>
        </div>
    </nav>
</div>


