<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Cara Masak</title>
</head>
<body>
    <div>
        <div>
            <h3>
                <a href="{{ route('caramasak.create') }}" class="btn btn-primary btn-sm">
                    Tambah Cara Masak
                </a>
            </h3>
        </div>
        <div>
            <table id="tb_list_master_cara_masak" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Durasi</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data akan di-load oleh DataTables -->
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#tb_list_master_cara_masak').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('caramasak.index') }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'id_menu', name: 'id_menu' },
                    { data: 'durasi', name: 'durasi' },
                    { data: 'keterangan_menu', name: 'keterangan_menu' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>

    <script src="{{ asset('AdminLte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
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
</body>
</html>
