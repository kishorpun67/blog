<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{route('index')}}"><h2>Blog Website<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Session::get('page')=='index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('index')}}">Home
                    </a>
                    </li> 
                    @auth
                        <li class="nav-item {{ Session::get('page')=='post' ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('post')}}">Post</a>
                        </li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            
                            <li class="nav-item">
                                <button class="header-button " style="border: none; outline:none; background-color:#f8f9fa; " >Logout</button>
                            </li>
                        </form>
                    
                       
                    @else   
                        <li class="nav-item {{ Session::get('page')=='register' ? 'active' : '' }}">
                            <a class="nav-link" href="{{route("register")}}">SignUp
                            </a>
                        </li> 
                        <li class="nav-item {{ Session::get('page')=='login' ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('login')}}">Signin
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
  </header>