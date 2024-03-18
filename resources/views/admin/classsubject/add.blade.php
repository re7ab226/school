@include('layouts.header')
@include('layouts.app')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Assign </h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <form method="post" action="">
                                    {{ csrf_field() }}
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label> name</label>
                                            <select name="class_id"class="form-control">
                                                <option value="">select</option>
                                                @foreach ($getclass as $class)
                                                    <option value="{{ $class->id }}"> {{ $class->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Subject name
                                            </label>
                                            @foreach ($getsubject as $subjects)
                                                <div style="font-weight: normal">
                                                    <input type='checkbox' value="{{ $subjects->id }}"
                                                    name="subjects_id[]">{{ $subjects->name }}</input>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label> status</label>
                                            <select name="status"class="form-control">
                                                <option value="0">Active</option>
                                                <option value="1"> In Active</option>

                                            </select>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                </form>
                            </div>
                            <!-- /.card -->





                            <!-- /.card -->

                        </div>
                        <!--/.col (left) -->

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


</body>



@include('layouts.footer')

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
