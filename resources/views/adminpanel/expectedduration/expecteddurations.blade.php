@extends('layouts.adminap')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Job Duration</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->


                <!-- Form Element sizes -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">new expected duration</h3>
                    </div>
                    <div class="card-body">
                        <form id="quickForm" action="/expecteddurations/create" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputcatagory_name">expected job duration</label>
                                <input type="text" name="duration_text" class="form-control form-control-lg"
                                    id="exampleInputPassword1" placeholder="insert Expexted job Duration">
                            </div>

                            <button type="submit" class="btn btn-block btn-success  ">Save</button> <br>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
                <!-- general form elements disabled -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Expected durations</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                    <th style="width: 10px">#</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach ($expecteddurations as $ed)
                                    <tr>
                                        <td style="width: 10px">{{++$i}}</td>
                                        <td>{{$ed->duration_text}}</td>
                                        <td>
                                           <div class="row">
                                           <a  href="/expecteddurations/u/{{$ed->id}}" type="button" class="btn btn-success text-white"><span class="fa fa-edit"></span>Edit</a>
                                           <form action="expecteddurations/d/{{$ed->id}}" method="get">
                                                 @csrf
                                                <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span>  Delet</button>
                                            </form>
                                           </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th style="width: 10px">#</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- general form elements disabled -->

                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->


</section>



<script>
    $('#quickForm').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            duration_text: {
                required: true,
            },
            terms: {
                required: true
            },
        },
        messages: {
            email: {
                required: "Please enter a email address",
                email: "Please enter a vaild email address"
            },
            duration_text: {
                required: "Please provide a duraion",
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


<script>
    $(function () {
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
    });
</script>



<!-- jQuery -->
<!-- Bootstrap 4 -->
<!-- Select2 -->
<!-- Page script -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })



        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()


        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>
<!-- /.content -->
@endsection