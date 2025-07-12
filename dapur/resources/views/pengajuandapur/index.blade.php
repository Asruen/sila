<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $header }}</title>
    @include('Template.head')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('Template.navbar')

        <!-- Main Sidebar Container -->
        @include('Template.left-sidebar')

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">{{ $header }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <a href="{{ route('pengajuandapur.create')}}" class="btn btn-primary btn-sm">
                                            Tambah Data
                                        </a>
                                        <br><br>
                                        <form action="{{ url('/export-pengajuandapur') }}" method="GET" class="d-flex">
                                            <input type="date" name="start_date" class="form-control form-control-sm mx-1" required>
                                            <input type="date" name="end_date" class="form-control form-control-sm mx-1" required>
                                            <button type="submit" class="btn btn-success btn-sm">Excel</button>
                                        </form>
                                    </h3>
                                </div>

                                <div class="card-body">
                                    <table id="tbl_list_data_pengajuan_dapur" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor Dapur</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data akan di-load oleh DataTables -->
                                        </tbody>
                                    </table>

                                    <!-- Modal for Batal -->
                                    <div class="modal fade" id="batalModal" tabindex="-1" role="dialog" aria-labelledby="batalModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="batalModalLabel">Alasan Pembatalan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea id="batalReason" class="form-control" rows="3" placeholder="Masukkan alasan pembatalan..."></textarea>
                                                    <input type="hidden" id="batalId">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="button" class="btn btn-danger" id="confirmBatal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        @include('Template.footer')

    </div>

    @include('Template.script')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#tbl_list_data_pengajuan_dapur').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('pengajuandapur.index') }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'nomor_dapur', name: 'nomor_dapur' },
                    { data: 'status', name: 'status' },  // FIX typo
                    { data: 'keterangan', name: 'keterangan' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

            // Handle ACC action
            $(document).on('click', '.btn-acc', function () {
                var id = $(this).data('id');
                Swal.fire({
                    title: "Konfirmasi ACC",
                    text: "Apakah Anda yakin ingin menyetujui pengajuan ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Setujui!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        updateStatus(id, "acc", "Disetujui");
                    }
                });
            });

            // Handle Batal action
            $(document).on('click', '.btn-batal', function () {
                var id = $(this).data('id');
                $('#batalId').val(id);
                $('#batalModal').modal('show');
            });

            // Confirm Batal
            $('#confirmBatal').click(function () {
                var id = $('#batalId').val();
                var reason = $('#batalReason').val();
                if (reason.trim() === "") {
                    Swal.fire("Error", "Alasan pembatalan harus diisi!", "error");
                    return;
                }

                $('#batalModal').modal('hide');
                updateStatus(id, "batal", reason);
            });

            function updateStatus(id, status, keterangan) {
                $.ajax({
                    url: '{{ route('pengajuandapur.updateStatus') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        status: status,
                        keterangan: keterangan
                    },
                    beforeSend: function () {
                        Swal.fire({
                            title: "Memproses...",
                            text: "Silakan tunggu...",
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function (response) {
                        Swal.fire("Berhasil!", response.message, "success");
                        $('#tbl_list_data_pengajuan_dapur').DataTable().ajax.reload();
                    },
                    error: function (xhr) {
                        Swal.fire("Gagal!", "Terjadi kesalahan. Coba lagi.", "error");
                    }
                });
            }
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
