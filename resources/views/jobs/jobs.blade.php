@extends('layouts.app')

@section('content')
<div class="row">
    @if (Session::get("usertype")=="client")
    <div class="form-group">
        <a class="btn btn-success btn-lg float-right" href="{{url('/jobpost')}}">Post new Job</a>
    </div>
    @endif
</div>
@if (!empty($jobs))
    
@php
$divid=0;
@endphp
@foreach ($jobs as $job)
@php
++$divid;
@endphp
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-12">
                    <h2>{{$job->name}}</h2>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 ">
                            <p><strong>JOB CATAGORY: </strong> <span
                                    class="badge badge-success">{{$job->job_catagory->catagory_name}}.</span> </p>


                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 ">

                            <p><strong>Main Skill Needed: </strong>
                                <span class="badge badge-success">{{$job->skill->skill_name}}</span>

                            </p>

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 ">

                            <p><strong>Payment Amount: </strong>
                                <span class="badge badge-success">{{$job->payment_amount}} ETB</span>

                            </p>

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 ">

                            <p><strong>EXPECTED DURATION:- </strong><span class="badge badge-success">
                                    {{$job->expected_duration->duration_text}}</span>


                            </p>

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 ">
                            <p><strong>Additional Skills: </strong>

                                @foreach ($job->other_skills as $otherskill)
                                <span class="badge badge-success">{{$otherskill->skill_name}}</span>

                                @endforeach
                            </p>
                        </div>

                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <button class="btn btn-success btn-block" data-toggle="collapse"
                                data-target="#demo{{$divid}}">Job Description</button>

                        </div>

                        <hr>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <a  @if(Session::get("usertype")=="client")
                            href="/job-a-detail/{{$hashids->encode($job->id)}}"
                            @else
                            href="/job-f-detail/{{$hashids->encode($job->id)}}"
                            @endif
                            
                                 class="btn btn-success btn-block"><span
                                    class="fa fa-forward"></span> View Job Detail </a>

                        </div>
                        <hr>
                        <div id="demo{{$divid}}" class="collapse col-12">
                            {{$job->description}}
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<br><br><br>
<hr>
@endforeach
<div class="float-right">
    {{$jobs->links()}}
</div>

@else
    No jobs
@endif
@endsection