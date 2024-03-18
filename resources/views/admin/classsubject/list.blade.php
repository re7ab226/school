@include('layouts.header')
@include('layouts.app')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="card card-primary">
                    <form method="get" action="">
                        <div class="card-header">
                            <h3 class="card-title">Assign search</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>class name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="class_name"
                                        value="{{ Request::get('class_name') }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>subject name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="school_subjects_name"
                                        value="{{ Request::get('school_subjects_name') }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Date </label>
                                    <input type="date" class="form-control" name="created_at"
                                        placeholder="Enter date" value="{{ Request::get('created_at') }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-primary "
                                        style="margin-top: 30px">Search</button>
                                    <a href="{{ url('admin/classsubject/list') }}" type="submit"
                                        class="btn btn-success  " style="margin-top: 30px">Clear</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assign Lists </h1>
                </div>
                <div class="col-sm-6" style="text-align: right">
                    <a href='{{ url('admin/classsubject/add') }}' class="btn btn-primary">add new Assign </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Assign Lists</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('flash_msg')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Assign List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th> class Name </th>
                                        <th> subject Name </th>
                                        <th>status</th>
                                        <th>created by</th>
                                        <th>created by Date</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <thead>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->class_name }}</td>
                                            <td>{{ $value->school_subjects_name }}</td>
                                            <td>
                                                @if ($value->status == 0)
                                                    active
                                                @else
                                                    InActive
                                                @endif
                                            </td>
                                            <td>{{ $value->created_by_name }} </td>
                                            <td>{{ $value->created_at }} </td>
                                            <td>
                                                <a href="{{ url('admin/classsubject/edit/' . $value->id) }}"
                                                    class="btn btn-primary">edit</a>
                                                <a href="{{ url('admin/classsubject/delete/' . $value->id) }}"
                                                    class="btn btn-danger"> delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </thead>
                            </table>
                            <div style="padding: 10px; float:right;">

                                {!! $getRecord->appends(Illuminate\support\facades\Request::except('page'))->links()!!}
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
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
