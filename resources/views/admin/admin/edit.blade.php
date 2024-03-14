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
                            <h1>Edit Admin</h1>

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
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Name"
                                                name="name" value="{{$getRecourd->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" class="form-control" name="email"
                                            value="{{$getRecourd->email}}"  placeholder="Enter email">
                                           <div style="color: red">
                                            {{$errors->first('email')}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control" name="password"
                                                placeholder="Password">
                                                <p> Do you want to change password</p>
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
