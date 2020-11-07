@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header abbgs text-white">
        <h2 class="pb-6">Review your Payments</h2>
    </div>




    <!------ Include the above in your HEAD tag ---------->

    <section class="testimonial jumbotron abbr " id="testimonial" style="margin:20px">



             @php
            $count=0;
            @endphp
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Job Name</th>
                        <th scope="col">Client</th>
                        <th scope="col">Freelancer</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Yenepay Transaction code</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
 

                    </tr>
                </thead>
                <tbody>
                    @foreach($hpayments as $hpayment)
                    <tr>
                        <td scope="row">{{++$count}}</td>
                        <td scope="row">{{$hpayment->proposals->job->name}}</td>
                        <td scope="row">{{$hpayment->hiremanagerl_id}}</td>
                        <td scope="row">{{$hpayment->proposals->freelancer->user->name}}</td>
                        <td scope="row">{{$hpayment->TotalAmount }}</td>
                        <td scope="row">{{$hpayment->yenepayTransactionCode }}</td>
                        <td scope="row">{{$hpayment->status}}</td> 
                        <td scope="row">{{$hpayment->created_at}}</td>

                       
                    </tr>
                    @endforeach
                </tbody>
            </table>


 


    </section>
    <script type="text/javascript">
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthChange": true,
           "Placeholder": "Search records",
          });
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        </script>


</div>
    

@endsection