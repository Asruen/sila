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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">
                                    <a href="{{ route('resep.create') }}" class="btn btn-primary btn-sm">
                                        Tambah Data
                                    </a>
                                    <br><br>
                                    <form action="{{ url('/export-resep') }}" method="GET" class="d-flex">
                                        <input type="date" name="start_date" class="form-control form-control-sm mx-1" required>
                                        <input type="date" name="end_date" class="form-control form-control-sm mx-1" required>
                                        <button type="submit" class="btn btn-success btn-sm">Excel</button>
                                    </form>
                                </h3>
                            </div>
                        <div class="card-body">
                            <table id="tbl_list_master_menu" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Menu</th>
                                    <th>Komponen Sehat</th>
                                    
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        
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
  
    @include('Template.script')
   
    <script type="text/javascript">
    $(document).ready(function () {
    $('#tbl_list_master_menu').DataTable({
            
            ajax: '{{ url()->current() }}',
            columns: [
                 { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_resep', name: 'nama_resep' },
                { data: 'nama_komponen', name: 'nama_komponen' },
                
                
                {data: 'action', name: 'action', orderable: false, searchable: false}, // Aksi (tombol)


            ]
        });
    });
    </script>
     <script src="{{ asset('AdminLte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
     <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
            
    </script>
    
    <!-- jQuery -->
</body>
</html>
