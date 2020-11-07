@extends('layouts.app')

@section('content')
<style>
    .widget {
        margin: 0 0 25px 0;
        display: block;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }

    .widget .widget-heading {
        padding: 7px 15px;
        -webkit-border-radius: 2px 2px 0 0;
        -moz-border-radius: 2px 2px 0 0;
        border-radius: 2px 2px 0 0;
        text-transform: uppercase;
        text-align: center;
        background: rgb(4, 138, 64);
        color: white;
    }

    .widget .widget-body {
        padding: 10px 15px;
        font-size: 36px;
        font-weight: 300;
        background: rgb(155, 101, 2);
    }
</style>
<style>
    header {
      padding: 154px 0 50px;
    }
    .killimanjaro-header{
        background-color:green;
    }
    
    @media (min-width: 992px) {
      header {
        padding: 156px 0 100px;
      }
    }
    
h1{
text-transform: capitalize !important;
}

    </style>
        <header class="killimanjaro-header text-white">
          <div class="container text-center">
              <h1 class="text-white ">Kebet.com |Ethiopia</h1>
            <h1  class="text-white">Do any job at home ,Hire the best freelancers for any job, online in Ethiopia for Ethiopian</h1>
            <p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>
          </div>
        </header>
<div class="row">
<h1 class="float-right"  >Search jobs By categories</h1>

</div>
@if (!empty($homejobcategory))
<div class="row">
 
@foreach ($homejobcategory as $jobc)
    
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="widget">
            <div class="widget-heading clearfix">
                <div class="pull-left">{{$jobc->catagory_name}}</div>
             </div>
            <div class="widget-body clearfix text-white">
                <div class="pull-left number">
                    @if ($jobc->jobs->count()==0)
                        No 
                    @else
                    {{$jobc->jobs->count()}} 
                    @endif
                </div>
                <div class="pull-left">
                    &nbsp;  Jobs here...
                </div>
            </div>
        <a class="btn btn-success btn-block" href="">view...</a>

       </div>

    </div>

@endforeach
</div>


@else
No jobs
@endif
@endsection