@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header abbgs text-white">
        Review your Proposals    </div>




    <!------ Include the above in your HEAD tag ---------->

    <section class="testimonial jumbotron abbr " id="testimonial" style="margin:20px">

            @php
            $count=0;
        @endphp
            <table id="example1" class="table table-bordered table-responsive-sm">
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
                @foreach($fproposal as $cp)
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
    </section>

    <script>
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthChange": true,

           "Placeholder": "Search records"
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
 