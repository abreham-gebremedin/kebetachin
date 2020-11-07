@include('layouts.header')
<body>
  
    @if (Session::get("usertype")=="client")
    @include('inc.cnavbar')
      @endif
    @if (Session::get("usertype")=="freelancer")
    @include('inc.fnavbar')                                    
    @endif
    @if (Session::get("usertype")=="")
    @include('inc.navbar')                                    
    @endif
    <div class="container">
        
        @include('inc.messages')
         <div class="row">
          
          <div class="col-sm-12 col-md-12 col-lg-12 ">
 
      
            @yield('content')
           </div>
          
         </div>
    </div>
   
 

        @include('layouts.footer')

</body>
</html>