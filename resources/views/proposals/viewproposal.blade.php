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

            <table class="table table-bordered table-responsive-sm">

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
                        <th scope="col">Frelancer Locatin</th>
                        <td scope="row">{{$proposal->freelancer->location->country}}, Region =>
                            {{$proposal->freelancer->location->region}} , City=>
                            {{$proposal->freelancer->location->city}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Proposal Status</th>
                        <td scope="row">{{$proposal->proposal_status_catalog->status_name}}</td>


                    </tr>
                    <tr>
                        <th scope="col">Payment Type</th>
                        <td scope="row">{{$proposal->payment_type->type_name}}</td>

                    </tr>
                    <tr>
                        <th scope="col">Payment Amount</th>
                        <td scope="row">{{$proposal->payment_amount }} ETB</td>

                    </tr>
                    @if ($proposal->proposalfile !="")
                    <tr>
                        <th scope="col">Proposal File</th>
                        <td scope="row"> <a href="/storage/attachment/{{$proposal->proposalfile}}">Download file</a>
                        </td>

                    </tr>
                    @endif
                    @if (Session::get("usertype")=="freelancer" && $proposal->current_proposal_status==1 )
                    <tr>
                        <td> <a class="btn btn-success btn-lg" href="">Edit</a></td>
                    </tr>
                    @endif
                    @if (Session::get("usertype")=="client")
                    <tr>
                        <td>
                            <form action="/change/proposalstatus" method="POST" name="form1">
                                @csrf
                                <input type="hidden" value="{{$proposal->id}}" name="id">


                                <label for="">Update Proposal status</label>
                                <select type required class="selectpicker" data-style="btn-success"
                                    data-live-search="true" data-width="100%" data-height="auto" name="proposal_status"
                                    class="custom-scroll">
                                    <option>Select proposal staus</option>

                                    @foreach ($status as $pst)
                                    <option
                                        data-content="<span class='badge badge-success'>{{$pst->status_name}}</span>">
                                        {{$pst->id}}</option>

                                    @endforeach
                                </select>
                                <br>
                                <br>

                                <button type="submit" class="btn btn-success btn-lg" href="">Update Status</button>




                            </form>
                        </td>



                        @endif
                        {{Session::get("usertype")}}
                        @if (Session::get("usertype")=="client"&& $proposal->current_proposal_status==5)
                         

                        <td>
                            <a class="btn btn-success btn-lg float-right" href="/create/{{$hashids->encode($proposal->id)}}/contract">Make
                                Contract</a>
                        </td>
                    </tr>
             

                    @endif




                </tbody>
            </table>


        </div>



    </section>



</div>
@endsection