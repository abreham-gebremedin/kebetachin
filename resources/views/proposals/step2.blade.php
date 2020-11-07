@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header abbgs text-white">
        <h2>Submit Proposal</h2>
    </div>




    <!------ Include the above in your HEAD tag ---------->

    <section class="testimonial " id="testimonial" style="margin:20px">

        <h2 class="pb-6">Upload your Proposal</h2>
        

        <div class="jumbotron abbr">
            <form  action={{ url('submit/proposalnext') }}   method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
     
        <div class="form-group   col-sm-6 col-md-6 col-lg-3 bootstrap  ">

            <label for="">Payment Ttpe</label>
            <select required class="selectpicker" data-style="btn-success" data-live-search="true"
                data-width="100%" data-height="auto" name="payment_type_id" class="custom-scroll">
                <option disabled selected data-content="<span >{{"select Payment type"}}</span>">
                    {{""}}</option>

                @foreach ($payment_type as $pt)
                <option data-content="<span class='badge badge-success'>{{$pt->type_name}}</span>">
                    {{$pt->id}}</option>

                @endforeach
            </select>
        </div>
        <div class="form-group  col-sm-6 col-md-6 col-lg-4 ">
            <label for="country">Payment Amount</label>
            <div class="input-group-prepend">
                <input type="number" name="payment_amount" class="form-control abbr"
                    placeholder="e.g 500" required value="{{ session()->get('location.country') }}">

                <span class="input-group-text">ETB</span>

            </div>
        </div>
    </div>
    <div class="form-group row">
        <label >Upload Your Proposal File here  <span class="abbc">*</span></label>     
              
       <div class="form-group files ">
           <input type="file" class="form-control"   name="proposalfile">
       </div>
   </div>

   
   <button type="submit" class="btn btn-lg btn-success float-right" >Save</button>


       </form>
        </div>



    </section>



</div>
@endsection