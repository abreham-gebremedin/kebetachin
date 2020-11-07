@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header abbgs text-white">
        <h2>Payment</h2>
    </div>

    <!------ Include the above in your HEAD tag ---------->

    <section class="testimonial " id="testimonial" style="margin:20px">

        <h2 class="pb-6">deposit your payment to kebet.com</h2>


        <div class="jumbotron abbr">

            <form id="quickForm" action="/pay" method="POST">
                @csrf
                <table class="table table-bordered">

                    <tbody>

                        
                        <tr>
                            <th scope="col">Job Name</th>
                            <td scope="row">
                                <div class="form-group   ">
                                    <input type="hidden"   name="ItemName" value="{{$pid}}" />{{$proposal->job->name}}
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <th scope="col">Payment Amount</th>
                            <td scope="row">
                                
                                <input type="hidden"   name="UnitPrice" value="{{$hashids->encode($proposal->payment_amount) }}">{{$proposal->payment_amount }} ETB
                            <input type="hidden" value="{{$hashids->encode(1)}}" name="Quantity" />
                            </td>

                        </tr>
                   

                        {{-- <tr>
                            <th scope="col"></th>
                            <td scope="row">
                                <div class="form-group   ">
                                    <input type="hidden" name="DeliveryFee" value="0.5" />
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <th scope="col">Receipt photo</th>
                            <td scope="row">
                                <div class="form-group files ">
                                    <input type="hidden" name="Discount" value="0" />
                                </div>
                            </td>

                        </tr> --}}

                        {{-- <tr>
                            <th scope="col">Receipt photo</th>
                            <td scope="row">
                                <div class="form-group">
                                    <input type="hidden" name="Tax1" value="1.50" />
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <th scope="col">Receipt photo</th>
                            <td scope="row">
                                <div class="form-group files ">
                                    <input type="hidden" name="Tax2" value="0" />
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <th scope="col">Receipt photo</th>
                            <td scope="row">
                                <div class="form-group files ">
                                    <input type="hidden" name="HandlingFee" value="0">
                                </div>
                            </td>

                        </tr> --}}


                        <tr>
                            <td></td>
                            <td>

                                <button type="submit" value="submit" class="btn btn-success"
                                    style="font-size: 0.9em;">Pay with YenePay</button>
                            </td>

                        </tr>


                    </tbody>
                </table>

            </form>


        </div>



    </section>



</div>
<script>
$('#quickForm').validate({
    rules: {
      name: {
        lettersonly: true,
        required: true,
        minlength: 3,

       },
      
    },
    messages: {
      name: {
        required: "Please enter your professional name  e.g Article writer",
        minlength: " must be at least 3 characters long"

       },
       
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
 
</script>
@endsection