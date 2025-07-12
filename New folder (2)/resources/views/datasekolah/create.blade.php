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
                            <h1 class="m-0 text-dark">Tambah Data Sekolah</h1>
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
                                    <form action="{{ route('datasekolah.store') }}" method="POST">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Nama Sekolah</label>
                                            <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" name="nama_sekolah" step="any" placeholder="Nama Sekolah">
                                            @error('nama_sekolah')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Jenjang Sekolah -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Jenjang Sekolah</label>
                                            <select class="form-control" name="jenjang_sekolah">
                                                @foreach ($jenjang_sekolah as $data)
                                                    <option value="{{ $data->id }}">{{ $data->jenjang_sekolah }}</option>
                                                @endforeach
                                            </select>
                                            @error('jenjang_sekolah')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Gramasi Nasi -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Jumlah Siswa</label>
                                            <input type="number" class="form-control @error('jumlah_siswa') is-invalid @enderror" name="jumlah_siswa" step="any" placeholder="---">
                                            @error('jumlah_siswa')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Gramasi Sayur -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Alamat Sekolah</label>
                                            <textarea type="text" class="form-control @error('alamat_sekolah') is-invalid @enderror" name="alamat_sekolah" step="any" placeholder="Alamat_ Sekolah"></textarea>
                                            @error('alamat_sekolah')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">ID Dapur</label>
                                            <select class="form-control" name="id_dapur">
                                                @foreach ($id_dapur as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nomor_dapur }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_dapur')
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

</body>
</html>
