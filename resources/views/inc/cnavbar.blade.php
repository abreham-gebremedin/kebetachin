<nav class=" navbar navbar-expand-lg navbar-light bg-light-nav">
    
    <a href="/" class="brand-link">
        <img style=" width: 100px; left: 15px; max-height: 70px; " src="{{asset("dist/img/AdminLTELogo.png")}}" alt="Kebet.com Logo" class="rounded-circle" style="opacity: .8">
    
    </a>
    <ul class="navbar-nav ml-auto nav-links-btn">
        <li class="nav-item "><a class="nav-link" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}.com</a></li>
        </ul>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
   
    <div class="collapse navbar-collapse" id="navbar1">
        <ul class="navbar-nav ml-auto nav-links-btn">
             <li class="nav-item"><a class="nav-link" href="{{ url('/cproposals') }}">Proposals</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url("/myjobs")}}">My Jobs</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url("/hpayment")}}">My Payments</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url("/contracts")}}">Contracts</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url("/cmessages")}}">Messages</a></li>

            <ul class="navbar-nav ml-auto  nav-links-btn">
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
                        <div class="col-md-4">
                            <img src="/storage/cover_images/2_1576059352.jpg" alt="Alternate Text"
                                class="img-responsive" />
                        </div>
                        <div style="padding:10%">
                            <span> {{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
                            <p class="text-muted small">
                                {{ Auth::user()->email }}</p>

                            <div class="row">
                                <a href="#" class="btn btn-success btn-sm  ">View Profile</a>
                                <a class="nav-item nav-link" class="dropdown-item" href="/home">DashBoard</a>


                                <a class="nav-item nav-link" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                @if (Session::get("usertype")=="client")
                                You Logged as {{Session::get("usertype")}} <br>
                                <a class="btn btn-success btn-block" href="/freelancerlogin">Log as Freelancer</a>
                                @endif
                                @if (Session::get("usertype")=="freelancer")
                                You Logged as {{Session::get("usertype")}} <br>
                                <a class="btn btn-success btn-block" href="/cleintlogin">Log as Cleint</a>

                                @endif



                            </div>
                        </div>
                    </div>
                </li>
                @endguest
            </ul>
        </ul>
    </div>
</nav>
<br><br><br>
