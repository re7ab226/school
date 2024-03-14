@include('layouts.header')


@include('layouts.app')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin Lists</h1>
                </div>
                <div class="col-sm-6" style="text-align: right">
                    <a href='{{ url('admin/admin/add') }}' class="btn btn-primary">add new Admin</a>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin Lists</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    @include('flash_msg')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Admin List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th >created by date</th>
                                        <th >Action </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($getRecourd as $value )
<tr>

                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                    <td >{{$value->email}}</td>
                                    <td >{{$value-> created_at}} </td>
                                    <td >
                                        <a href="{{url('admin/admin/edit/'.$value->id)}}" class="btn btn-primary">edit</a>
                                        <a href="{{url('admin/admin/delete/'.$value->id)}}" class="btn btn-danger"> delete</a>

                                     </td>

                                </tr>

                                    @endforeach



                                </tbody>


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>




            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@include('layouts.footer')

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
