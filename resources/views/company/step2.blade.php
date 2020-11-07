@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header abbgs text-white">
                <h2>Client detail</h2>
            </div>

            <div class="card-body">


                <!------ Include the above in your HEAD tag ---------->

                <section class="testimonial " id="testimonial">
                    <div class="container">
                        <div class="row ">
                            <div class="col-md-4  abbg text-white text-center ">
                                <div class=" ">
                                    <div class="card-body">
                                        <i class="fa fa-user"> </i>
                                        <h2 class="py-3">Registration</h2>
                                        <p>Client. a person or a compony....
                                        </p>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 py-5 border">
                                <h2 class="pb-6">Please fill with your compony details</h2>

                                <form id="quickForm" action="/company2" method="POST">
                                    @csrf

                                    <div class="form-group ">
                                        <i class="far fa-comments"></i>
                                        <label for="name">Company Name</label>
                                        <input type="text" name="name" class="form-control abbr"
                                            placeholder="Enter Company name"
                                            value="{{ session()->get('company.name') }}">


                                    </div>
                                    <div class="form-row">
                                        <div class="form-group ">
                                            <label for="overview">Company Overview</label>
                                            <textarea required id="comment" name=" overview" cols="100" rows="8"
                                                class="form-control abbr"></textarea>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                    
                                    </div>

                                    <div class="form-row  float-right">
                                        <button type="submit"   class="btn  border border-success abbr "
                                            data-toggle="tooltip">Next</button>
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
        name: {
          lettersonly: true,
          required: true,
          minlength: 3,
  
         },
        
      },
      messages: {
        name: {
          required: "Please enter your professional name  e.g Article writer",
          minlength: " must be at least 3 characters long"
  
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