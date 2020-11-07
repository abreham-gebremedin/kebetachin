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


                            <form method="POST" action="/freelancer2" enctype="multipart/form-data">
                                @csrf



                                <section>
                                    <h2>Please select one or more Job catagorirs</h2>


                                    <div class="bootstrap" class="form-group  ">
                                        <script>
                                            $('select').selectpicker();

                                            $('select').multiselect({
                                                columns: 4,
                                                placeholder: 'Select Languages',
                                                search: true,
                                                selectAll: true
                                            });
                                        </script>
                                        <select required class="selectpicker" data-style="btn-success" multiple
                                            data-live-search="true" data-width="100%" data-height="auto"
                                            name="jobscat[]" class="custom-scroll">

                                            @foreach ($jc as $c)
                                            <option
                                                data-content="<span class='badge badge-success'>{{$c->catagory_name}}</span>">
                                                {{$c->id}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </section>
                                <br>
                                <br>

                                <br>
                                <br>
                                <section>
                                    <h2>Please select Payment Type</h2>

                                    <div class="outerDivFull">
                                        Per Hour
                                        <div class="switchToggle">
                                            <input type="radio" name="payment_type_id" value="1">
                                            <label for="switch">Toggle</label>
                                        </div>
                                        Fixed
                                        <div class="switchToggle">
                                            <input type="radio" name="payment_type_id" value="2" class="abbg">
                                            <label for="switch1">Toggle</label>
                                        </div>


                                </section>
                        </div>


                        <div class="form-row  float-left">
                            <button type="button" class="btn  border border-success abbr " data-toggle="tooltip"
                                data-placement="bottom" title="Click submit button to finish registration"
                                id="submit_button">Next</button>
                        </div>

                        <div class="form-row " style="margin:2px">
                            <button type="submit" class="btn  border border-success abbr " data-toggle="tooltip"
                                data-placement="bottom" title="Click submit button to finish registration"
                                id="submit_button">Next</button>
                        </div>


                        </form>
                    </div>
            </div>
            </section>


        </div>
    </div>
</div>
@endsection