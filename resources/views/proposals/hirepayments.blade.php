@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header abbgs text-white">
        <h2>Payments</h2>
    </div>




    <!------ Include the above in your HEAD tag ---------->

    <section class="testimonial " id="testimonial" style="margin:20px">

        <h2 class="pb-6">Review your Payments</h2>


        <div class="jumbotron abbr">
            @php
            $count=0;
            @endphp
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Job Name</th>
                        <th scope="col">Bank</th>
                        <th scope="col">Transaction Number</th>
                        <th scope="col">Reciept</th>
                        <th scope="col">Date</th>
 

                    </tr>
                </thead>
                <tbody>
                    @foreach($hpayments as $hpayment)
                    <tr>
                        <td scope="row">{{++$count}}</td>
                        <td scope="row">{{$hpayment->proposals->job->name}}</td>
                        <td scope="row">{{$hpayment->bank_name}}</td>
                        <td scope="row">{{$hpayment->tid}}</td>
                        <td scope="row"> <a href="/storage/attachment/{{$hpayment->reciept_photo}}">Veiw Reciept</a>
                        </td>
                        <td scope="row">{{$hpayment->created_at}}</td>

                       
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>



    </section>



</div>
@endsection