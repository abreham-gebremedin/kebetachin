@extends('layouts.app')

@section('content')
 
              <div class="card">
                <div class="card-header abbgs text-white"><h2>Clent Detail Review</h2></div>

                 
                    
                 
<!------ Include the above in your HEAD tag ---------->

<section class="testimonial " id="testimonial" style="margin:20px">
    <form action="/store" method="post" >
        @csrf
    <h2 class="pb-6">User Profile</h2>
           

             <div class="jumbotron abbr">
                 <table class="table ">
                     <tr>
                         <td><strong class="text-uppercase text-success  ">Clent:-</strong> </td>
                         <td><strong>{{Auth::user()->name}}</strong></td>
                     </tr>
                     <tr>
                        <td><strong class="text-uppercase text-success">Compony:-</strong> </td>
                        <td><strong>{{$company->name}}</strong></td>
                    </tr>
           
                 </table>

                 <table class="table">
                    <p><strong class="text-uppercase text-success form-control-plaintext">Compony overview:-</strong> {{$company->overview}}</p>

                     <tr>
                         <td><strong class="text-uppercase text-success">Country:-</strong> </td>
                         <td><strong>{{$location->country}}</strong></td>
                     </tr>
                     <tr>
                        <td><strong class="text-uppercase text-success">Region:-</strong> </td>
                        <td><strong>{{$location->region}}</strong></td>
                    </tr>
                    <tr>
                        <td><strong class="text-uppercase text-success">City:-</strong></td>
                        <td> <strong>{{$location->city}}</strong></td>
                    </tr>         
              </table>
         
            
      
        </div>

        
  <div class="form-row " >
                         
    <button type="submit"  class="btn btn-lg border border-success " data-toggle="tooltip"
data-placement="bottom" title="Click submit button to finish registration" id="submit_button">Register</button>
</div>
  </form>
</section>

                    
      
        </div>
 @endsection
 