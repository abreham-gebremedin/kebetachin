@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header abbgs text-white">
        <h2>Job Detail Review</h2>
    </div>




    <!------ Include the above in your HEAD tag ---------->

    <section class="testimonial " id="testimonial" style="margin:20px">

        <h2 class="pb-6">Job</h2>


        <div class="jumbotron abbr">
            <table class="table table-responsive-md table-responsive-sm">
                <thead>
                    <th>
                        <strong class="text-uppercase text-success  ">Clent:-</strong> 

                    </th>
                    <th>
                     <strong class="text-uppercase text-success">Job:-</strong> 

                   </th>
                </thead>
                <tr>
                    <td><strong>{{Auth::user()->name}}</strong></td>
                    <td><strong>{{$job->name}}</strong></td>
                </tr>
                

            </table>


             
                  <table class="table table-bordered">
                    <strong class="text-uppercase text-success ">Job overview:-</strong><br>
           
                    {{$job->description}}
                  </table>

            <table class="table table-responsive-md table-responsive-sm ">
                <thead>
                    <th>
                        <strong class="text-uppercase text-success">Payment Ttpe:-</strong>                    </th>
  
                    <th> 
                        <strong class="text-uppercase text-success"> Payment Amount:-</strong>  
                    </th>
                     <th> 
                        <strong class="text-uppercase text-success">Job Catagory:-</strong>                       </th>
                                 
                </thead>
              
                <tr>
                     
                    <td> <strong>{{$job->payment_type->type_name}}</strong></td>
                    <td><strong>{{$job->payment_amount}}</strong></td>
                
                   
                    <td><strong>{{$job->job_catagory->catagory_name}}</strong></td>
                </tr>
             
            </table>
            <table class="table table-bordered">
                <thead>
                    <th> 
                         <strong class="text-uppercase text-success">Main SKill Needed:-</strong> 
                    </th>
                    <th>
                         <strong class="text-uppercase text-success">Expected Number of Freelancers:-</strong>
                    </th>
                    <th>
                        <strong class="text-uppercase text-success">Expected Duration:-</strong>
                    </th>
                </thead>
                <tr>
                    <td><strong>{{$job->skill->skill_name}}</strong></td>
                 
            
                
                     <td> <strong>{{$job->number_of_frelance}}</strong></td>
                
           
                    <td> <strong>{{$job->expected_duration->duration_text}}</strong></td>
                </tr>
            </table>
            <table class="table">
                <thead>
                    <th>
                        <strong class="text-uppercase text-success">Complexity:-</strong>  
                    </th>
  
                    <th> 
                        <strong class="text-uppercase text-success">Other skills:-</strong>                   
                     </th>
                                      
                </thead>
                <tr>
                    <td>
                        
                        <strong >{{$job->complexity->complexity_text}}</strong>
                            
                       
                    </td> 
                    <td>@foreach ($job->other_skills as $otherskill)
                        <strong class="badge badge-success">{{$otherskill->skill_name}}</strong>
                    
                        @endforeach
                    </td>
                </tr>
            
            </table>

            <table class="table">
            <thead>
                <th><strong class="text-uppercase text-success">Screeninig Questions</strong>  </th>
            </thead>
            @php
                $qn=0;
            @endphp
            @foreach ($job->screninig_questions as $screninig_question)
             <tr>
                 <td>  <strong >{{"Question  "}}&nbsp&nbsp{{++$qn.":-"}}&nbsp&nbsp &nbsp{{$screninig_question->question}}</strong>
                 </td>
             </tr>
                    
            @endforeach
            </table>
   


        </div>



    </section>



</div>
@endsection