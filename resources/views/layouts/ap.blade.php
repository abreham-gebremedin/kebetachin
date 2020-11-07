@include('layouts.header')
<body>
    

    @include('inc.navbar')
    <div class="container">
        
        @include('inc.messages')
         <div class="row">
          
          <div class="col-sm-10 col-md-10 col-lg-10 ">
 
      
            @yield('content')
           </div>
           <div  class="col-sm-0 col-md-0 col-lg-2">
            @include('inc.sidebar')
           </div>
         </div>
    </div>
   
    <script>
        CKEDITOR.replace(jQuery('ckeditor'));
    </script>
        @include('layouts.footer')

</body>
</html>