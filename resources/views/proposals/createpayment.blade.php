@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header abbgs text-white">
        <h2>Payment Information</h2>
    </div>




    <!------ Include the above in your HEAD tag ---------->

    <section class="testimonial " id="testimonial" style="margin:20px">

        <h2 class="pb-6">Submit Payment Information</h2>


        <div class="jumbotron abbr">

            <form action="/make/payment" method="POST" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered">

                    <tbody>

                        <tr>
                            <th scope="col">Bank name</th>
                            <td scope="row">
                                <input type="text" class="form-control" name="bank_name"
                                    placeholder="insert here bank name">
                            </td>

                        </tr>

                        <tr>
                            <th scope="col">Transaction Id </th>
                            <td scope="row">
                                <input type="text" class="form-control" name="tid"
                                    placeholder="insert here Transaction Number">
                            </td>

                        </tr>                        
                        </tr>
                        <tr>
                            <th scope="col">Receipt photo</th>
                            <td scope="row">
                                <div class="form-group files ">
                                    <input type="file" class="form-control"   name="reciept_photo">
                                </div>
                            </td>

                        </tr>
                        
                        
                        <tr>
                            <td></td>
                            <td>

                                <button class="btn btn-success btn-lg float-right">Submit</button>
                            </td>

                        </tr>


                    </tbody>
                </table>

            </form>

        </div>



    </section>



</div>
@endsection