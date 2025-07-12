<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>{{ $header }}</title>
    @include('Template.head')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('Template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Template.left-sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark" id="currentTime">Starter Page</h1>
                        </div><!-- /.col -->
                        
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h1 >{{ $header }}</h1>
                        </div>
                        <!-- /.card-header -->
                        
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="pt-2 px-3"><h3 class="card-title">Data rantang dan ompreng</h3></li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="ompreng-tab" data-toggle="pill" href="#ompreng-tab-content" role="tab" aria-controls="ompreng-tab-seting" aria-selected="true">Ompreng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="rantang-tab" data-toggle="pill" href="#rantang-tab-content" role="tab" aria-controls="rantang-tab-seting" aria-selected="false">Rantang</a>
                                    </li>
                                    
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="ompreng-tab-content" role="tabpanel" aria-labelledby="ompreng-tab-seting">
                                    <table id="dt_ompreng" class="table table-bordered table-striped" cellspacing="0" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>No</th>
                                            <th>Kode Ompreng</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        
                                        
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="rantang-tab-content" role="tabpanel" aria-labelledby="rantang-tab-seting">
                                    <table id="dt_rantang" class="table table-bordered table-striped" cellspacing="0" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>No</th>
                                            <th>Kode Rantang</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        
                                        
                                        </table>
                                    </div>
                                    
                                    </div>
                                </div>
                                <!-- /.card -->
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3">Data detail</h3>
                                    
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="row">
                                        <!-- small box -->
                                        <div class="col-lg-3 col-md-3">
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>{{$jumlah_ompreng}}</h3>

                                                    <p>Jumlah Ompreng</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-bag"></i>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- small box -->

                                        <!-- small box -->
                                        <div class="col-lg-3 col-md-3">
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>{{$jumlah_rantang}}</h3>

                                                    <p>Jumlah Rantang</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-bag"></i>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- small box -->
                                        </div>

                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                                </div>
                            </div>

                        
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('Template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    @include('Template.script')
    <script>
        $(document).ready(function() {
            $('#dt_ompreng').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{url('ompreng/dt_ompreng')}}",
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex',  orderable: false, searchable: false},
                    {data: 'id', name: 'id'},
                    {data: 'kode', name: 'kode'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        
            $('dt_rantang').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{url('ompreng/dt_rantang')}}",
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'id', name: 'id'},
                    {data: 'kode', name: 'kode'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                'columnDefs': [
                    {
                    'targets': 0,
                    'checkboxes': {
                    'selectRow': true
                    }
                    }
                ],
                'select': {
                    'style': 'multi'
                },
            });
            
        });

        

        

    </script>
</body>
</html>
