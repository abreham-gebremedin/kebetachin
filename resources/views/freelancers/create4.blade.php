@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="card">
        <div class="card-header abbgs text-white">
            <h2>Education or Certification information</h2>
        </div>




        <!------ Include the above in your HEAD tag ---------->

        <section class="testimonial " id="testimonial" style="margin:20px">
            <div class="container">
                <div class="row ">

                    <form id="quickForm" method="POST" action="/freelancer3" enctype="multipart/form-data">
                        @csrf

                        <link rel="stylesheet"
                            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">


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
                        <div>
                            <div class="container">

                                <div class="row">
                                    <div class="col-md-10">


                                        <div data-role="dynamic-fields">
                                            <div class="form">
                                                <h2 class="pb-6">Please fill with Certification details</h2>
                                                <div class="abbr">

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-md-4 col-form-label text-md-right">certification
                                                            name<span class="abbc">*</span></label>

                                                        <div class="col-md-8 form-group ">
                                                            <input required type="text" class="form-control"
                                                                name="certification_name[]"
                                                                placeholder="certification name" name="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-md-4 col-form-label text-md-right">Provider<span
                                                                class="abbc">*</span></label>

                                                        <div class="col-md-8 form-group ">
                                                            <input required type="text" class="form-control" name="provider[]"
                                                                id="field-value"
                                                                placeholder="Provider e.g Addis Ababa University ">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-md-4 col-form-label text-md-right">Certification
                                                            Link</label>

                                                        <div class="col-md-8 form-group ">
                                                            <input type="text" class="form-control"
                                                                name="certification_link[]" id="field-name"
                                                                placeholder="Certification link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-form-label text-md-right">Date earned
                                                            <span class="abbc">*</span></label>
                                                        <div class="col-md-8 form-group ">
                                                            <input required type="date" class="form-control" min="1000-01-01"
                                                                name="date_earned[]" max="3000-12-31" id="field-value"
                                                                placeholder="Date earned"> <br>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-form-label text-md-right">Description
                                                            <span class="abbc">*</span></label>

                                                        <div class="col-md-8 form-group ">
                                                            <textarea required type="text" class="form-control"
                                                                name="description[]"
                                                                placeholder="Write a description about your certefication"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-form-label text-md-right">Upload Your
                                                            File <span class="abbc">*</span></label>

                                                        <div class="col-md-8 form-group files">
                                                            <input type="file" class="form-control" multiple=""
                                                                name="attachment[]">
                                                        </div>
                                                    </div>



                                                </div>
                                                <button class="btn btn-danger float-right" data-role="remove">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </button><br><br>
                                                <button class="btn btn-success float-md-right" data-role="add">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                    <span>Add another certefication</span>
                                                </button>
                                            </div> <!-- /div.form-inline -->
                                        </div> <!-- /div[data-role="dynamic-fields"] -->
                                    </div> <!-- /div.col-md-12 -->
                                </div> <!-- /div.row -->
                            </div>


                        </div>
                        <div class="form-row ">

                            <button type="submit" class="btn btn-lg border border-success " data-toggle="tooltip"
                                data-placement="bottom" title="Click submit button to finish registration"
                                id="submit_button">Next</button>
                        </div>

                        <!------ Include the above in your HEAD tag ---------->


                    </form>
                </div>
            </div>

        </section>



    </div>
</div>
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