@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header abbgs text-white">
        <h2>Contract</h2>
    </div>




    <!------ Include the above in your HEAD tag ---------->

    <section class="testimonial " id="testimonial" style="margin:20px">

        <h2 class="pb-6">Review Contract</h2>


        <div class="jumbotron abbr">
            @php
            $count=0;
            @endphp
            <table class="table table-bordered table-responsive-md table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Job Name</th>
                        <th scope="col">Company</th>
                        <th scope="col">Hire manager</th>
                        <th scope="col">Frelancer Name</th>

                       
                        

                        <th scope="col">View</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($contracts as $contract)

                    <tr>
                        <td scope="row">{{++$count}}</td>
                        <td scope="row">{{$contract->proposal->job->name}}</td>
                        <td scope="row">{{$contract->company->name}} </td>
                        <td scope="row">{{$contract->cleint->user->name}} </td>

                        <td scope="row">{{$contract->proposal->freelancer->user->name}}</td>
           
                        <td><a class="btn btn-success btn-lg" href='/view/{{$contract->id}}/contract'><span
                                    class="fa fa-eye"></span> View</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>



    </section>



</div>
@endsection