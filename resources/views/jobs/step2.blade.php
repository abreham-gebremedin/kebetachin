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

                    <h2>Please fill with your or your Job Detail</h2>
                    <style>
                        [data-role="dynamic-fields"]>.form+.form {
                            margin-top: 0.5em;
                        }

                        [data-role="dynamic-fields"]>.form [data-role="add"] {
                            display: none;
                        }

                        [data-role="dynamic-fields"]>.form:last-child [data-role="add"] {
                            display: inline-block;
                        }

                        [data-role="dynamic-fields"]>.form:last-child [data-role="remove"] {
                            display: none;
                        }
                    </style>
                    <script>
                        $(function () {
                            // Remove button click
                            $(document).on(
                                'click',
                                '[data-role="dynamic-fields"] > .form [data-role="remove"]',
                                function (e) {
                                    e.preventDefault();
                                    $(this).closest('.form').remove();
                                }
                            );
                            // Add button click
                            $(document).on(
                                'click',
                                '[data-role="dynamic-fields"] > .form [data-role="add"]',
                                function (e) {
                                    e.preventDefault();
                                    var container = $(this).closest('[data-role="dynamic-fields"]');
                                    new_field_group = container.children().filter('.form:first-child')
                                        .clone();
                                    new_field_group.find('input').each(function () {
                                        $(this).val('');
                                    });
                                    container.append(new_field_group);
                                }
                            );
                        });
                    </script>
                    <form id="quickForm" action="/jobpost/next" method="POST">
                        @csrf
                        <div class="row">

                            <div class="form-group   col-sm-6 col-md-6 col-lg-4 bootstrap  ">

                                <label for="">Select Main Kill</label>
                                <select required class="selectpicker" data-style="btn-success" data-live-search="true"
                                    data-width="100%" data-height="auto" name="main_skill_id" class="custom-scroll">
                                    <option disabled selected data-content="<span >{{"select Payment type"}}</span>">
                                        {{""}}</option>

                                    @foreach ($skill as $sk)
                                    <option data-content="<span class='badge badge-success'>{{$sk->skill_name}}</span>">
                                        {{$sk->id}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group   col-sm-6 col-md-6 col-lg-4 bootstrap  ">

                                <label for="">Complexity</label>
                                <select required class="selectpicker" data-style="btn-success" data-live-search="true"
                                    data-width="100%" data-height="auto" name="complexity_id" class="custom-scroll">
                                    <option disabled selected data-content="<span >{{"select complexity level"}}</span>">
                                        {{""}}</option>

                                    @foreach ($complexity as $cx)
                                    <option data-content="<span class='badge badge-success'>{{$cx->complexity_text}}</span>">
                                        {{$cx->id}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group   col-sm-6 col-md-6 col-lg-4 bootstrap  ">

                                <label for="">Additional Skills</label>
                                <select required class="selectpicker" multiple data-style="btn-success" data-live-search="true"
                                    data-width="100%" data-height="auto" name="skill_id[]" class="custom-scroll">
                                         {{""}}</option>

                                    @foreach ($skill as $sk)
                                    <option data-content="<span class='badge badge-success'>{{$sk->skill_name}}</span>">
                                        {{$sk->id}}</option>

                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <br><br>
                        <div data-role="dynamic-fields">
                            <div class="form">

                                <div class="form-group  ">
                                    <label for="country">Screening Question </label>
                                    <textarea name="sq[]" class="form-control abbr"
                                    placeholder="Add Subjective Screening question here......" required
                                    value="{{ session()->get('location.country') }}" cols="20" rows="5"></textarea>


                                </div>
                                     <button class="btn btn-danger" data-role="remove">
                                        <span class="fa fa-remove"></span>X
                                    </button>
                                    <button class="btn btn-success" data-role="add">
                                        <span class="glyphicon glyphicon-plus"></span>
                                        <span>Add another Screnng Question</span>
                                    </button>
                             </div> <!-- /div.form-inline -->
                        </div> <!-- /div[data-role="dynamic-fields"] -->


                         

                        <div class="form-row  float-left">
                            <a class="btn  border border-success abbr btn-lg " data-toggle="tooltip"
                                data-placement="bottom" title="Click submit button to finish registration" href="">
                                <span class="fa fa-arrow-left"></span>Back </a>
                        </div>
                        <div class="form-row float-right">
                            <button type="submit" class="btn  border border-success abbr btn-lg " data-toggle="tooltip"
                                data-placement="bottom" title="Click submit button to finish registration"
                                id="submit_button">Next<span class="fa fa-arrow-right"></span></button>
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