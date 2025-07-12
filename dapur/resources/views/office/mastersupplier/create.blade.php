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
                                    <h3>Tambah Supplier</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('mastersupplier.store') }}" method="POST">
                                        @csrf
                                        
                                        <!-- Nama Supplier -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Nama Supplier</label>
                                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" placeholder="Nama Supplier">
                                            @error('nama_barang')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Jenis Supplier -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Jenis Supplier</label>
                                            <select class="form-control" name="jenis_supplier">
                                                @foreach ($jenisSupplier as $data)
                                                    <option value="{{ $data->id }}">{{ $data->bahan }}</option>
                                                @endforeach
                                            </select>
                                            @error('bahan')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- No Telepon -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">No Telepon</label>
                                            <input type="number" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" placeholder="---">
                                            @error('no_telp')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Alamat Supplier -->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Alamat Supplier</label>
                                            <input type="text" class="form-control @error('alamat_supplier') is-invalid @enderror" name="alamat_supplier" placeholder="Alamat">
                                            @error('alamat_supplier')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Nama PIC --->
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">Nama PIC</label>
                                            <input type="text" class="form-control @error('nama_PIC') is-invalid @enderror" name="nama_PIC" placeholder="PIC">
                                            @error('nama_PIC')
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
