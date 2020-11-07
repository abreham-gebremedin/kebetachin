@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header abbgs text-white">
        <h2>Proposal</h2>
    </div>




    <!------ Include the above in your HEAD tag ---------->

    <section class="testimonial " id="testimonial" style="margin:20px">

        <h2 class="pb-6">view Proposal</h2>


        <div class="jumbotron abbr">

            <form action="/make/contract" method="POST">
                @csrf
                <table class="table table-bordered">

                    <tbody>
    
                        <tr>
                            <th scope="col">Job Name</th>
                            <td scope="row">{{$proposal->job->name}}</td>
                        </tr>
    
                        <tr>
                            <th scope="col">Frelancer Name</th>
                            <td scope="row">{{$proposal->freelancer->user->name}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Company</th>
                            <td scope="row">{{$proposal->job->hire_manager->company->name}}</td>
                        </tr>
    
    
                        <tr>
                            <th scope="col">Payment Type</th>
                            <td scope="row">{{$proposal->payment_type->type_name}}</td>
    
                        </tr>
                        <tr>
                            <th scope="col">Payment Amount</th>
                            <td scope="row">{{$proposal->payment_amount }} ETB</td>
    
                        </tr>
                        <tr>
                            <th scope="col">Start Date</th>
                            <td> <input type="date" class="form-control" min="1000-01-01" name="start_date"
                                    max="3000-12-31" id="field-value" placeholder="Date earned"></td>
    
                        </tr>
                        <tr>
                            <th scope="col">End Date</th>
                            <td> <input type="date" class="form-control" min="1000-01-01" name="end_date"
                                    max="3000-12-31" id="" placeholder="end date"></td>
    
                        </tr>
                        <tr>
                            <td>
    
                                <button class="btn btn-success btn-block text-light text-lg" data-toggle="collapse"
                                    data-target="#readcontract">Read and Accept contract term! <span class="fa fa-arrow-down"></span>
                                    <span class="fa fa-arrow-down"></span></button>
                            </td>
                            <td>
    
                                <button class="btn btn-success btn-block">Next</button>
                            </td>
    
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="readcontract" class="collapse col-12">
                                    In addition to actually removing records from your database, Eloquent can also
                                    "soft delete" models. When models are soft deleted, they are not actually
                                    removed from your database. Instead, a deleted_at attribute is set on the model
                                    and inserted into the database. If a model has a non-null deleted_at value,
                                    the model has been soft deleted. To enable soft deletes for a model
                                    , use the Illuminate\Database\Eloquent\SoftDeletes trait on the model:
                                    {"id":1,"job_id":21,"freelancer_id":11,"payment_type_id":2,"payment_amount":7,"
                                    current_proposal_status":1,"client_grade":null,"client_comment":null,"freelancer_grade"
                                    :null,"freelancer_comment":null,"proposalfile":"proposalfile-1588525269.JPG",
                                    "created_at":"2020-05-03T17:01:09.000000Z","updated_at":
                                    "2020-05-06T19:01:43.000000Z","job":{"id":21,"name":"
                                    Software Development","hire_manager_id":1,"expected_duration_id":1,
                                    "complexity_id":1,"description":"sddsdsdsds","main_skill_id":1,"payment_type_id":2
                                    ,"payment_amount":"12.00","qualification":null,"number_of_frelance":13,
                                    "attachmentid":null,"job_catagory_id":1,"created_at":"2020-04-24T18:58:30.000000Z"
                                    ,"updated_at":"2020-04-24T18:58:30.000000Z","hire_manager":
                                    {"id":1,"user_account_id":2,"locationid":25,"company_id":15,"created_at":null,
                                    "updated_at":null,"company":{"id":15,"name":"H general trading","overview":
                                    "hjsbdfjhsdbfjhdfbj","lid":25,"updated_at":"2020-04-18T09:56:28.000000Z",
                                    "created_at":"2020-04-18T09:56:28.000000Z"}}},"freelancer":{"id":11,"userid":2,"overview":"khkjhjkhjkhjkhjkhjkhjkhj","lid":27,"payment_type_id":1,"proname":"Web developer","created_at":"2020-05-03T17:14:31.000000Z","updated_at":"2020-05-03T17:14:31.000000Z"},"payment_type":{"id":2,"type_name":"Fixed price","created_at":null,"updated_at":null}}
                                </div>
                            </td>
                        </tr>
    
                    </tbody>
                </table>
    
            </form>

        </div>



    </section>



</div>
@endsection