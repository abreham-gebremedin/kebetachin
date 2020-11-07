@extends('layouts.app')

@section('content')

 


    <!------ Include the above in your HEAD tag ---------->

    <section class="testimonial " id="testimonial"  >

        

             
            @php
            $count=0;
            @endphp
            <div class="card abbr">
                <div class="card-header abbgs text-white ">
                  <h3 class="card-title">Review Contract</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th  >#</th>
                        <th  >Job Name</th>
                        <th >Company</th>
                        <th >Hire manager</th>
                        <th >Frelancer Name</th>
                        <th >View Contract</th>


                    </tr>
                    </thead>
                    <tbody>
                        @foreach($contracts as $contract)
                    <tr>
                      <td>2</td>
                      <td>Internet
                        Explorer 4.0
                      </td>
                      <td>Win 95+</td>
                      <td> 4</td>
                      <td>X</td>
                      <td>X</td>
                    </tr>
                    

                   
                      <tr>
                        <td >{{++$count}}</td>
                        <td >{{$contract->proposal->job->name}}</td>
                        <td >{{$contract->company->name}} </td>
                        <td >{{$contract->cleint->user->name}} </td>

                        <td>{{$contract->proposal->freelancer->user->name}}</td>
           
                        <td><a class="btn btn-success btn-lg" href='/view/{{$hashids->encode($contract->id)}}/contract'><span
                                    class="fa fa-eye"></span> View</a></td>

                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th  >#</th>
                        <th  >Job Name</th>
                        <th >Company</th>
                        <th >Hire manager</th>
                        <th >Frelancer Name</th>
                        <th >View Contract</th>

                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
           
            <!-- /.col -->
           
          <!-- /.row -->
        </section>
        <!-- /.content -->
       
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



    </section>



</div>
@endsection