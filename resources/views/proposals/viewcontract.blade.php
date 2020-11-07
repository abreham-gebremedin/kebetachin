@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header abbgs text-white">
        <h2>Contract</h2>
    </div>




    <!------ Include the above in your HEAD tag ---------->

    <section class="testimonial " id="testimonial" style="margin:20px">

        <h2 class="pb-6">Contract between {{$contract->company->name}} and
            {{$contract->proposal->freelancer->user->name}} </h2>


        <div class="jumbotron abbr">

           <div class="table-responsive">
            <table class="table table-bordered ">

                <tbody>

                    <tr>
                        <th scope="col">Job Name</th>
                        <td scope="row">{{$contract->proposal->job->name}} </td>
                    </tr>
                    <tr>
                        <th scope="col">Company</th>
                        <td scope="row">{{$contract->company->name}} </td>

                    </tr>
                    <tr>
                        <th scope="col">Hire manager</th>
                        <td scope="row">{{$contract->cleint->user->name}} </td>

                    </tr>
                    <tr>
                        <th scope="col">Frelancer Name</th>
                        <td scope="row">{{$contract->proposal->freelancer->user->name}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Payment Amount</th>
                        <td scope="row">{{$contract->payment_amount}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Proposal Status</th>
                        <td scope="row">{{$contract->proposal->proposal_status_catalog->status_name}}</td>


                    </tr>
                    <tr>
                        <th scope="col">Payment Type</th>
                        <td scope="row">{{$contract->proposal->payment_type->type_name}}</td>

                    </tr>

                    <tr>
                        <th scope="col">Start Date</th>
                        <td scope="row">{{$contract->start_time}} </td>

                    </tr>
                    <tr>
                        <th scope="col">End Date</th>
                        <td scope="row">{{$contract->end_time}} </td>

                    </tr>
                    </tr>
                    <tr>
                        <th scope="col">Date of contract</th>
                        <td scope="row">{{$contract->created_at}} </td>

                    </tr>


                    {{-- @if (Session::get("usertype")=="freelancer" && $proposal->current_proposal_status==1 )
                    <tr>
                        <td> <a class="btn btn-success btn-lg" href="">Edit</a></td>
                    </tr>
                    @endif --}}
                    @if (Session::get("usertype")=="freelancer"&& $contract->proposal->current_proposal_status==3)
                    <tr>
                        <td>
                            <form action="/change/proposalstatus" method="POST" name="form1">
                                @csrf
                                <input type="hidden" value="{{$contract->proposal->id}}" name="id">


                                <label for="">Update Proposal status</label>
                                <select type required class="selectpicker" data-style="btn-success"
                                    data-live-search="true" data-width="100%" data-height="auto" name="proposal_status"
                                    class="custom-scroll">
                                    <option>Select proposal staus</option>


                                    <option data-content="<span class='badge badge-success'>{{'Accept Contract'}}</span>">
                                        6
                                    </option>
                                    <option data-content="<span class='badge badge-success'>{{'Reject Contract'}}</span>">
                                        4
                                    </option>


                                </select>
                                <br>
                                <br>

                                <button type="submit" class="btn btn-success btn-lg" href="">Update Status</button>




                            </form>
                        </td>



                        @endif

                        {{-- @if (Session::get("usertype")=="cleint")
                        @if ($proposal->current_proposal_status==5)

                        <td>
                            <a class="btn btn-success btn-lg float-right" href="/create/{{$proposal->id}}/contract">Make
                        Contract</a>
                        </td>
                    </tr>
                    @endif
                    @endif --}}




                </tbody>
            </table>


           </div>

        </div>



    </section>



</div>
@endsection