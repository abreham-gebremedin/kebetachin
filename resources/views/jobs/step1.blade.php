@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header  abbgs text-white">
            <h2>Post Job</h2>
        </div>

        <div class="card-body">


            <!------ Include the above in your HEAD tag ---------->

            <section class="testimonial " id="testimonial">
                <div class="border border-success justify justify-content ">

                    <h2>Please fill with your or your Job Location</h2>

                    <form id="quickForm" action="/jobpost" method="POST">
                        @csrf

                        <div class="row">
                            <div class="form-group  col-sm-6 col-md-6 col-lg-4 ">
                                <label for="country">Job name </label>

                                <input required type="text" name="name" class="form-control abbr"
                                    placeholder="e.g Article writer"  
                                    value="{{ session()->get('location.country') }}">
                            </div>

                            <div class="form-group   col-sm-6 col-md-6 col-lg-4 bootstrap ">

                                <label for="">Job Catagory</label>
                                <select required class="selectpicker" data-style="btn-success" data-live-search="true"
                                    data-width="100%" data-height="auto" name="job_catagory_id" class="custom-scroll">
                                    <option disabled selected data-content="<span >{{"select Job Catagory"}}</span>">
                                        {{""}}</option>

                                    @foreach ($jobscatlist as $c)
                                    <option
                                        data-content="<span class='badge badge-success'>{{$c->catagory_name}}</span>">
                                        {{$c->id}}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group   col-sm-6 col-md-6 col-lg-3 bootstrap  ">

                                <label for="">Payment Type</label>
                                <select required class="selectpicker" data-style="btn-success" data-live-search="true"
                                    data-width="100%" data-height="auto" name="payment_type_id" class="custom-scroll">
                                    <option disabled selected data-content="<span >{{"select Payment type"}}</span>">
                                        {{""}}</option>

                                    @foreach ($payment_type as $pt)
                                    <option data-content="<span class='badge badge-success'>{{$pt->type_name}}</span>">
                                        {{$pt->id}}</option>

                                    @endforeach
                                </select>
                            </div>
                            


                        </div>
                        <div class="row">

                            <div class="form-group col-12">
                                <label for="overview">Job Description</label>
                                <textarea required id="comment" name="description" cols="100" rows="8"
                                    class="form-control "></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group  col-sm-6 col-md-6 col-lg-4 ">
                                <label for="country">Payment Amount</label>
                                <div class="input-group-prepend">
                                    <input type="number" name="payment_amount" class="form-control abbr"
                                        placeholder="e.g 500" required value="{{ session()->get('location.country') }}">

                                    <span class="input-group-text">ETB</span>

                                </div>
                            </div>
                            
                            <div class="form-group  col-sm-6 col-md-6 col-lg-4 ">
                                <label for="country">Number of Freelancer </label>
                                <div class="input-group-prepend">
                                    <input type="number" min="1" name="number_of_frelance" class="form-control abbr"
                                        placeholder="e.g 500" required value="{{ session()->get('location.country') }}">

                                    <span class="input-group-text">ETB</span>

                                </div>
                            </div>
                           
                            <div class="form-group   col-sm-6 col-md-6 col-lg-4 bootstrap  ">

                                <label for="">Expected Duration</label>
                                <select required class="selectpicker" data-style="btn-success" data-live-search="true"
                                    data-width="100%" data-height="auto" name="expected_duration_id" class="custom-scroll">
                                    <option disabled selected data-content="<span >{{"select Payment type"}}</span>">
                                        {{""}}</option>

                                    @foreach ($payment_type as $pt)
                                    <option data-content="<span class='badge badge-success'>{{$pt->type_name}}</span>">
                                        {{$pt->id}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row  float-left">
                            <a class="btn  border border-success abbr btn-lg " data-toggle="tooltip"
                                data-placement="bottom" title="Click submit button to finish registration" href="">
                                <span class="fa fa-arrow-left"></span>Back </a>
                        </div>
                        <div class="form-row  float-right">
                            <button type="submit" class="btn  border border-success abbr btn-lg " data-toggle="tooltip"
                                data-placement="bottom" title="Click submit button to finish registration"
                                id="submit_button">Next</button>
                        </div>



                    </form>
                </div>
            </section>


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