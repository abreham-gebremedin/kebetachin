@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header abbgs text-white">
                <h2>User Profile</h2>
            </div>

            <div class="card-body">


                <!------ Include the above in your HEAD tag ---------->

                <section class="testimonial " id="testimonial">
                    <div class="container">
                        <div class="row ">
                            <div class="col-md-4  abbg text-white text-center ">
                                <div class=" ">
                                    <div class="card-body">
                                        <i class=" 	glyphicon glyphicon-user"> </i>
                                        <h2 class="py-3">Registration</h2>
                                        <p>freelancer. a person who works as a writer, designer, performer, or the like,
                                            selling work or services by the hour, day, job, etc., rather than working on
                                            a regular salary basis for one employer.
                                        </p>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 py-5 border">
                                <h2 class="pb-6">Please fill with your details</h2>

                                <form id="quickForm" method="POST" action="/freelance1">
                                    @csrf

                                    <div class="form-group ">
                                        <input type="text" style="width:80%" class="form-control abbr" name="proname"
                                            class="@error('proname') is-invalid @enderror">
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror


                                    </div>
                                    <div class="form-row">
                                        <div class="form-group ">
                                            <textarea class="overview" required id="overview" name=" overview" cols="100" rows="8"
                                                class="form-control abbr"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-row  float-right">
                                        <button type="submit"  class="btn  border border-success abbr "
                                            data-toggle="tooltip" data-placement="bottom"
                      
                                            id="submit_button">Next</button>
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
<!-- jQuery -->

 
<script type="text/javascript">
 
  $('#quickForm').validate({
    rules: {
      proname: {
        lettersonly: true,
        required: true,
        minlength: 3,

       },
      overview: {
        required: true,
        minlength: 40,
      },
      terms: {
        required: true
      },
    },
    messages: {
      proname: {
        required: "Please enter your professional name  e.g Article writer",
        minlength: " must be at least 3 characters long"

       },
      overview: {
        required: "Please provide a description",
        minlength: "Your password must be at least 40 characters long"
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