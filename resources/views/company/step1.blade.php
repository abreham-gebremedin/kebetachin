@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
             <div class="card">
                <div class="card-header abbgs text-white"><h2>Client detail</h2></div>

                <div class="card-body">
                    
                 
<!------ Include the above in your HEAD tag ---------->

<section class="testimonial " id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4  abbg text-white text-center ">
                <div class=" ">
                    <div class="card-body">
                    <i class=" 	glyphicon glyphicon-user" > </i> 
                        <h2 class="py-3">Registration</h2>
                        <p>location....  
                      </p>
                            

                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h2 class="pb-6">Please fill with your or your compony Location</h2>
                
                <form id="quickForm" action="/location1" method="POST">
                    @csrf
                        
                        <div class="form-group ">
                            <label for="country" >Country </label>
                            <input type="text" name="country" class="form-control abbr" placeholder="Enter Country" value="{{ session()->get('location.country') }}">                         
                        </div>
                        <div class="form-group ">
                            <label for="region" >Region </label>
                            <input type="text" name="region" class="form-control abbr" placeholder="Enter Region or state" value="{{ session()->get('location.region') }}">
                        </div>
                        <div class="form-group ">
                            <label for="city" >City </label>
                            <input type="text" name="city" class="form-control abbr" placeholder="Enter city" value="{{ session()->get('location.city') }}">
                        </div>
                         
                    
                        <div class="form-row  float-left">
                            <a class="btn  border border-success abbr btn-lg " data-toggle="tooltip"
                            data-placement="bottom" title="Click submit button to finish registration" href=""> <span class="glyphicon glyphicon-align-left"></span>Back </a>
                       </div>
                    <div class="form-row  float-right">
                        <button type="submit"  class="btn  border border-success abbr btn-lg " data-toggle="tooltip"
                        data-placement="bottom" title="Click submit button to finish registration" id="submit_button">Next</button>
                  </div>

                   
 
                </form>
            </div>
        </div>
    </div>
</section>

                    
                </div>
            </div>
        </div>
 </div>
 <script type="text/javascript">
 
    $('#quickForm').validate({
      rules: {
        country: {
          lettersonly: true,
          required: true,
          minlength: 3,
  
         },
        region: {
          required: true,
          minlength: 3,
        },
        city: {
          required: true,
          minlength: 3,
        },
        terms: {
          required: true
        },
      },
      messages: {
        country: {
          required: "Please enter your country  e.g Ethiopia",
          minlength: " must be at least 3 characters long"
  
         },
        region: {
          required: "Please provide region",
          minlength: "Your password must be at least 3 characters long"
        },
        city: {
          required: "Please provide region",
          minlength: "Your password must be at least 3 characters long"
        },
        terms: "Please accept our terms"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
   
  </script>
@endsection
 