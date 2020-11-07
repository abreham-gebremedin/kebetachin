@section('sidebar')
<div  style="   
float:left;
padding-top:100px;">
<div class=" sidebar card ">
    <div class="card-body" style="border:1px solid #20cca4;box-shadow: -1px 2px 10px 0px rgba(0, 0, 0, 0.5);
    ">
        <div class="row" >
            <ul class="navbar-nav ml-auto nav-links-btn">
                 <li class="nav-item active"><a class="nav-link"  href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="/posts">Posts</a></li>
            </ul>
        </div>

    </div>
</div>

</div>
 
    
@show