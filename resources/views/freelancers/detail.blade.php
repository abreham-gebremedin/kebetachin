@extends('layouts.app')

@section('content')
 
              <div class="card">
                <div class="card-header abbgs text-white"><h2>User Profile</h2></div>

                 
                    
                 
<!------ Include the above in your HEAD tag ---------->

<section class="testimonial " id="testimonial" style="margin:20px">
   <form method="POST" action="/freelancer5">
    @csrf
    <h2 class="pb-6">User Profile</h2>

             <div class="jumbotron abbr">
              <h2>{{$freelancer->proname}}</h2>
           <p><strong class="text-uppercase text-success">Name:-</strong> <strong>{{Auth::user()->name}}</strong></p>
            <p><strong class="text-uppercase text-success">overview:-</strong> {{$freelancer->overview}}</p>
            <p><strong class="text-uppercase text-success">payment type:-</strong> <strong>{{ $freelancer->payment_type->type_name}}</strong></p>
      
        </div>

        <h2 class="pb-6">Job Catagory</h2>
               <div class="jumbotron abbr">
             @foreach ($freelancer->Frelance_job_catagory as $jcl)
               
                          <label for="" class="badge badge-success"> {{$jcl->jobCatagory->catagory_name}}</label>
                        
                

               
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
            @foreach ($freelancer->education as $education)
            <tr>
            <td>{{$education->certification_name}}</td>
            <td>{{$education->provider}}</td>
            <td>{{$education->certification_link}}</td>
            <td>{{$education->description}}</td>
            <td>{{$education->date_earned}}</td>

            <td><a href="{{$education->attachment}}" class="fa fa-download" >certificate</a></td>
            
            </tr>
                            
            @endforeach 
            
              </table>
           </div>
           <h2 class="pb-6">Location</h2>
           <div class="jumbotron abbr">
          <p><strong class="text-uppercase text-success">Country:-</strong> <strong>{{$freelancer->location->country}}</strong></p>
          <p><strong class="text-uppercase text-success">Region:-</strong>  <strong>{{$freelancer->location->region}}</strong></p>
          <p><strong class="text-uppercase text-success">City:-</strong> <strong>{{$freelancer->location->city}}</strong></p>
    
       </div>


       <h2 class="pb-6">Skills</h2>
       <div class="jumbotron abbr">
     @foreach ($freelancer->has_skills as $skl)
       
                  <label for="" class="badge badge-success"> {{$skl->skill->skill_name}}</label>
                
        

       
    @endforeach
  </div>
  
  </form>
</section>

                    
      
        </div>
 @endsection
 