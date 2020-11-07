@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header abbgs text-white">
        <h2>Proposals</h2>
    </div>




    <!------ Include the above in your HEAD tag ---------->

    <section class="testimonial " id="testimonial" style="margin:20px">

        <h2 class="pb-6">Review freelancer's proposal</h2>


        <div class="jumbotron abbr">
            @php
                $count=0;
            @endphp
            <table class="table table-bordered table-responsive-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Job Name</th>
                    <th scope="col">Frelancer Name</th>
                    <th scope="col">Proposal Status</th>
                    <th scope="col">View</th>
        
                </tr>
                </thead>
                <tbody>
                @foreach($cleintproposal as $cp)
                
                    <tr>
                        <td scope="row">{{++$count}}</td>
                   <td scope="row">{{$cp->freelancer->user->name}}</td> 
                        <td scope="row">{{$cp->job->name}}</td>
                         <td scope="row">{{$cp->proposal_status_catalog->status_name}}</td>
                         <td><a class="btn btn-success btn-lg" href='/view/{{$hashids->encode($cp->id)}}/proposal'><span class="fa fa-eye"></span> View</a></td>
        
                     </tr>
                @endforeach
                </tbody>
            </table>


        </div>



    </section>



</div>
@endsection
 