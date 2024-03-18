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
                            <h1>Edit Subject</h1>

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
                                            <label> Class Name</label>
                                            <input type="text"value='{{$getRecord->name}}' class="form-control" placeholder="Name"required
                                                name="name">
                                        </div>
                                        <div class="form-group">
                                            <label> type</label>
                                         <select name="type"class="form-control">
                                            <option {{ ($getRecord->type == 'theory') ? 'selected' : '' }} value="theory">theory</option></option>
                                            <option {{ ($getRecord->type == 'Practice') ? 'selected' : '' }} value="Practice"> Practice</option>
                                         </select>
                                    </div>
                                              <div class="form-group">
                                            <label > status</label>
                                         <select name="status"class="form-control">
                                            <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Active</option>
                                            <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1"> In Active</option>
                                         </select>
                                    </div>

                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">update</button>
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
