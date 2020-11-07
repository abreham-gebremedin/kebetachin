@extends('layouts.app')

@section('content')
 
              <div class="card">
                <div class="card-header abbgs text-white"><h2>User Detail</h2></div>

                 
                     
                 
<!------ Include the above in your HEAD tag ---------->

<section class="testimonial " id="testimonial" style="margin:20px">
 
    <h2 class="pb-6">User Profile</h2>

             <div class="jumbotron abbr">
              <h2>{{$freelancer->proname}}</h2>
           <p><strong class="text-uppercase text-success">Name:-</strong> <strong>{{Auth::user()->name}}</strong></p>
            <p><strong class="text-uppercase text-success">overview:-</strong> {{$freelancer->overview}}</p>
            <p><strong class="text-uppercase text-success">payment type:-</strong> <strong>{{ $payment_type->type_name}}</strong></p>
      
        </div>

        <h2 class="pb-6">Job Catagory</h2>
               <div class="jumbotron abbr">
             @foreach ($jobscatlist as $jcl)
               
                          <label for="" class="badge badge-success"> {{$jcl->catagory_name}}</label>
                        
                

               
            @endforeach
          </div>
         
              
             <h2 class="pb-6">Certification Detail</h2>
            <div class="abbr  jumbotron">
              <table class="table table-primary table-responsive">
                <tr>
                  <th>Certification Name</th>
                  <th>Provider</th>
                  <th>Ceritification Link</th>
                  <th>Description</th>
                  <th>Date Earned</th>
                  <th>Attachment</th>

                  </tr>  
                         
             <?php
               foreach($cer as $cert) { 
                 # code...
                 echo("<tr>");
                  echo("<td>");
                 echo($cert->certification_name );
                 echo("</td>");
                 echo("<td>");
                 echo($cert->provider );
                 echo("</td>");
                 echo("<td>");
                 echo($cert->certification_link );
                 echo("</td>");
                 echo("<td>");
                 echo($cert->description );
                 echo("</td>");
                 echo("</td>");
                 echo("<td>");
                 echo($cert->date_earned );
                 echo("</td>");
                 
                 echo("<td>");
            ?>
            <img width="20%" src="/storage/attachment/{{$cert->attachment}}" alt="hhhh">
            <?php
                 
                 
                 echo("</tr>");

             }
            ?>
              </table>
           </div>
           <h2 class="pb-6">Location</h2>
           <div class="jumbotron abbr">
          <p><strong class="text-uppercase text-success">Country:-</strong> <strong>{{$location->country}}</strong></p>
          <p><strong class="text-uppercase text-success">Region:-</strong>  <strong>{{$location->region}}</strong></p>
          <p><strong class="text-uppercase text-success">City:-</strong> <strong>{{$location->city}}</strong></p>
    
       </div>


       <h2 class="pb-6">Skills</h2>
       <div class="jumbotron abbr">
     @foreach ($skillslist as $skl)
       
                  <label for="" class="badge badge-success"> {{$skl->skill_name}}</label>
                
        

       
    @endforeach
  </div>
  <div class="form-row " >
                         
 
</section>

                    
      
        </div>
 @endsection
 