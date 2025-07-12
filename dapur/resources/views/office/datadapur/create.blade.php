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
                            <h1 class="m-0 text-dark">Tambah Data Dapur</h1>
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
                                    <form action="{{ route('datadapur.store') }}" method="POST">
                                        @csrf


                                        <!-- Nama Dapur-->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Nama Dapur</label>
                                            <input type="text" class="form-control @error('nama_dapur') is-invalid @enderror" name="nama_dapur" step="any" placeholder="Nama Dapur">
                                            @error('nama_dapur')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Alamat Dapur -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Alamat Dapur</label>
                                            <textarea type="text" class="form-control @error('alamat_dapur') is-invalid @enderror" name="alamat_dapur" step="any" placeholder="Alamat Dapur"></textarea>
                                            @error('alamat_dapur')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Nomor Dapur -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Nomor Dapur</label>
                                            <input type="text" class="form-control @error('nomor_dapur') is-invalid @enderror" name="nomor_dapur" step="any" placeholder="---">
                                            @error('nomor_dapur')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Kota -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Kota</label>
                                            <select class="form-control" name="kota">
                                                @foreach ($kota as $data)
                                                    <option value="{{ $data->id }}">{{ $data->kabupaten_kota }}</option>
                                                @endforeach
                                            </select>
                                            @error('kota')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Provinsi -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Provinsi</label>
                                            <select class="form-control" name="provinsi">
                                                @foreach ($provinsi as $data)
                                                    <option value="{{ $data->id }}">{{ $data->provinsi }}</option>
                                                @endforeach
                                            </select>
                                            @error('provinsi')
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
