

<style>
/* nav bar */
body
{
    font-family: 'Montserrat', sans-serif;
}
.navbar
{
    background-color: #339966;
}
.navbar .brand-navbar img:hover
{
    opacity: 0.7;
}
.navbar ul
{
padding: 0px 30px 0px 0px;
}
.navbar ul li a{
    color: white;
    margin: 10px 0px 0px 10px;
    text-transform: uppercase;
    font-size: 12px;
}
.navbar ul li a .fas{
    padding-right:5px; 
    padding-left:5px; 
}
.navbar ul li a:hover{
    color: black;
}
.navbar ul li.active > a {
    color: black;
    font-weight: bold;
    font-size: 12px;
    border-left: 3px solid #15b000;
    border-radius: 40px;
}
.iconStyle
{
    background-color: black;
    color:white;
}

 
</style>

<style>
/* Footer */
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#footer {
    background: #339966 !important;
}
#footer h5{
	padding-left: 10px;
    border-left: 3px solid #eeeeee;
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:#ffffff;
}
#footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
	padding: 3px 0;
}
#footer ul.social li a i {
    margin-right: 5px;
	font-size:25px;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.social li:hover a i {
	font-size:30px;
	margin-top:-10px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
	color:#ffffff;
}
#footer ul.social li a:hover{
	color:#eeeeee;
}
#footer ul.quick-links li{
	padding: 3px 0;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.quick-links li:hover{
	padding: 3px 0;
	margin-left:5px;
	font-weight:700;
	

}
#footer ul.quick-links li a i{
	margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
	font-weight: 700;
	color:black;
}

@media (max-width:767px){
	#footer h5 {
    padding-left: 0;
    border-left: transparent;
    padding-bottom: 0px;
    margin-bottom: 10px;
}
}
</style>
<nav class="navbar navbar-expand-lg navStyle">
         <h2><a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a></h2>
               
            <a class="brand-navbar" href="#"><img src="{{storage_path('app/public/logo/pp.png')}}" alt="Responsive image" height="60px"></a>
       <button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse" data-target="#mainMenu">
         <span class="navbar-toggler-icon">   
          <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
            </span>
                            </button>
            <div class="collapse navbar-collapse " id="mainMenu">
                <ul class="navbar-nav ml-auto navList">
                    <li class="nav-item active"><a href="#" class="nav-link"><i class="fas fa-home"></i>HOME<span class="sr-only">(current)</span></a></li>
                    <li class="nav-item">
                        <a href="services.html" class="nav-link"><i class="fas fa-cogs"></i>Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="portfolio.html" class="nav-link"><i class="fas fa-briefcase"></i>Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.html" class="nav-link"><i class="fas fa-phone"></i>Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.html" class="nav-link"><i class="fas fa-users"></i>About</a>
                    </li>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

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
                   
                </ul>
            </div>
            
        </nav>
        <div class="container-nav ">
            <ul class="nav nav-bottom nav-fill">
                <li class="nav-item">
                    <a class="nav-link text-dark" terget="_blank" href="https://www.totoprayogo.com"><i class="fas fa-user-circle"></i> <span  >People</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" terget="_blank" href="https://www.totoprayogo.com"><i class="fas fa-file-invoice"></i> <span  >Project</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><i class="fas fa-plus-circle"></i> <span  >New</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><span class="badge badge-danger badge-pill custom-badge">20</span> <i class="fas fa-bell"></i> <span class="d-none d-sm-inline-block d-md-inline-block">Notification</span></a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link text-dark" href="#"><i class="fas fa-cog"></i> <span >Setting</span></a>
                </li>
            </ul>

        </div>


       