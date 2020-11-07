@extends('layouts.adminap')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Catagory</h1>
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
                        <h3 class="card-title">new catagory</h3>
                    </div>
                    <div class="card-body">
                        <form id="quickForm" action="'" method="put">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputcatagory_name">Job catagory</label>
                                <input type="text" name="catagory_name" class="form-control form-control-lg"
                                    id="exampleInputPassword1" placeholder="insert catagory">
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
            catagory_name: {
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
            catagory_name: {
                required: "Please provide a category",
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