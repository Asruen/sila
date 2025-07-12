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
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Tambah Data Inventori</h1>
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
                                    <h3>Tambah Data</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('pengajuandapur.store') }}" method="POST">
                                        @csrf

                                        <!-- Kode Barang -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Nomor Dapur</label>
                                            <input type="text" class="form-control @error('nomor_dapur') is-invalid @enderror" name="nomor_dapur" step="any" placeholder="Nomor Dapur">
                                            @error('nomor_dapur')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Jenis Barang -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" onchange="updateKeterangan()">
                                                <option value="Pending">Pending</option>
                                                <option value="Acc">Acc</option>
                                                <option value="Batal">Batal</option>
                                            </select>
                                            @error('status')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Keterangan -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Keterangan</label>
                                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" placeholder="Keterangan">
                                            @error('keterangan')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-warning">Reset</button>

                                    </form>
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

    <!-- Required Scripts -->
    @include('Template.script')

    <script>
    function updateKeterangan() {
        let status = document.getElementById("status").value;
        let keteranganInput = document.getElementById("keterangan");

        if (status === "Pending" || status === "Acc") {
            keteranganInput.value = status; // Set otomatis sesuai status
            keteranganInput.readOnly = true; // Buat input jadi tidak bisa diketik
        } else {
            keteranganInput.value = ""; // Kosongkan jika "Batal"
            keteranganInput.readOnly = false; // Buat input bisa diketik
        }
    }
    </script>

</body>
</html>
