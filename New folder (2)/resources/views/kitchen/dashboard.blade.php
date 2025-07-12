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
                                    <h1>{{ $header }}</h1>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h2>Menu Hari ini</h2> 
                                                    <div class="row row-cols-2 row-cols-md-5">
                                                        <div class="col">
                                                            <div class="card bg-soft-primary h-100">
                                                                <div class="card-body">
                                                                    <div class="text-center">
                                                                        <img width="100px" src="{{ asset('image/nasi.png') }}" alt=""> 
                                                                        <h5>Karbohidrat</h5>
                                                                    </div> 
                                                                    <h2 class="p-0 m-0 text-center">Nasi Putih</h2>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="col">
                                                            <div class="card bg-soft-primary h-100">
                                                                <div class="card-body">
                                                                    <div class="text-center">
                                                                        <img width="100px" src="{{ asset('image/protein.png') }}" alt=""> 
                                                                        <h5>Protein</h5>
                                                                    </div> 
                                                                    <h2 class="p-0 m-0 text-center">Semur Ayam</h2>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="col">
                                                            <div class="card bg-soft-primary h-100">
                                                                <div class="card-body">
                                                                    <div class="text-center">
                                                                        <img width="100px" src="{{ asset('image/sayur.png') }}" alt=""> 
                                                                        <h5>Sayur</h5>
                                                                    </div> 
                                                                    <h2 class="p-0 m-0 text-center">Tumis Buncis Teri</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="card bg-soft-primary h-100">
                                                                <div class="card-body">
                                                                    <div class="text-center">
                                                                        <img width="100px" src="{{ asset('image/buah.png') }}" alt=""> 
                                                                        <h5>Buah</h5>
                                                                    </div> 
                                                                    <h2 class="p-0 m-0 text-center">Pisang</h2>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="col">
                                                            <div class="card bg-soft-primary h-100">
                                                                <div class="card-body">
                                                                    <div class="text-center">
                                                                        <img width="100px" src="{{ asset('image/susu.png') }}" alt=""> 
                                                                        <h5>Pelengkap</h5>
                                                                    </div> 
                                                                    <h2 class="p-0 m-0 text-center">Susu</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="float-end mt-2"></div> 
                                            <h2>Jumlah Hari Ini</h2> 
                                            <h2>
                                                <span data-plugin="counterup">
                                                    <span>200</span>
                                                </span>
                                            </h2>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="float-end mt-2"></div> 
                                            <h2>Sudah Packing</h2> 
                                            <h2>
                                                <span data-plugin="counterup">
                                                    <span>50</span>
                                                </span>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="row mt-4">
                            <nav class="w-100">
                                <div class="nav nav-tabs" id="product-tab" role="tablist" style="display: flex; justify-content: space-evenly; width: 100%; flex-wrap: nowrap;">
                                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true" style="flex-grow: 1; text-align: center;">Line Nasi</a>
                                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false" style="flex-grow: 1; text-align: center;">Line Sayur</a>
                                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false" style="flex-grow: 1; text-align: center;">Line Protein</a>
                                </div>
                            </nav>
                            <div class="card-body">
                                <div class="card">
                                    <div class="tab-content p-3" id="nav-tabContent">
                                        <div class="tab-pane fade active show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h2>Total</h2>
                                                    <h4>200 Porsi</h4>
                                                </div>
                                                <div>
                                                    <h2>Sudah Selesai</h2>
                                                    <h4>200 Porsi</h4>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <div class="row row-cols-4">
                                                    <div class="col">
                                                        <div class="card bg-primary-edit">
                                                            <div class="card-body">
                                                                <h1 class="text-white">1</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h1>2</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h1>3</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h1>4</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="text-center py-3">NASI PUTIH 200 PORSI</h4>
                                            <div class="table-responsive">
                                                <table class="table table-kitchen">
                                                    <thead>
                                                        <tr>
                                                            <th>Bahan</th>
                                                            <th>Jumlah</th>
                                                            <th>Satuan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Beras</td>
                                                            <td>20</td>
                                                            <td>Kg</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Air</td>
                                                            <td>30</td>
                                                            <td>Liter</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card">
                                                <a href="javascript: void(0);" data-toggle="collapse" aria-expanded="true" aria-controls="accordion-2" class="text-dark not-collapsed" style="overflow-anchor: none;">
                                                    <div class="p-4">
                                                        <div class="media align-items-center">
                                                            <div class="media-body overflow-hidden">
                                                                <h5 class="font-size-16 mb-1">TATA CARA MASAK</h5>
                                                            </div> 
                                                            <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                        </div>
                                                    </div>
                                                </a> 
                                                <div id="accordion-2" data-parent="#addproduct-accordion" class="collapse show" style="">
                                                    <div class="p-4 border-top">
                                                        <h1 class="text-center py-3">TATA CARA MASAK</h1> 
                                                        @include('caramasak.index') <!-- Include the caramasak template here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h2>Total</h2>
                                                    <h4>200 Porsi</h4>
                                                </div>
                                                <div>
                                                    <h2>Sudah Selesai</h2>
                                                    <h4>200 Porsi</h4>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <div class="row row-cols-4">
                                                    <div class="col">
                                                        <div class="card bg-primary-edit">
                                                            <div class="card-body">
                                                                <h1 class="text-white">1</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h1>2</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h1>3</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h1>4</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="text-center py-3">Tumis Buncis Teri 200 PORSI</h4>
                                            <div class="table-responsive">
                                                <table class="table table-kitchen">
                                                    <thead>
                                                        <tr>
                                                            <th>Bahan</th>
                                                            <th>Jumlah</th>
                                                            <th>Satuan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Buncis</td>
                                                            <td>8</td>
                                                            <td>Kg</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bawang Merah</td>
                                                            <td>320</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bawang Putih</td>
                                                            <td>200</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Teri</td>
                                                            <td>160</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Garam</td>
                                                            <td>10</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Royco</td>
                                                            <td>16</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gula Pasir</td>
                                                            <td>24</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cabe Merah Keriting</td>
                                                            <td>200</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Saus Tiram</td>
                                                            <td>16</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card">
                                                <a href="javascript: void(0);" data-toggle="collapse" aria-expanded="true" aria-controls="accordion-2" class="text-dark not-collapsed" style="overflow-anchor: none;">
                                                    <div class="p-4">
                                                        <div class="media align-items-center">
                                                            <div class="media-body overflow-hidden">
                                                                <h5 class="font-size-16 mb-1">TATA CARA MASAK</h5>
                                                            </div> 
                                                            <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                        </div>
                                                    </div>
                                                </a> 
                                                <div id="accordion-2" data-parent="#addproduct-accordion" class="collapse show" style="">
                                                    <div class="p-4 border-top">
                                                        <h1 class="text-center py-3">TATA CARA MASAK</h1> 
                                                        @include('caramasak.index') <!-- Include the caramasak template here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h2>Total</h2>
                                                    <h4>200 Porsi</h4>
                                                </div>
                                                <div>
                                                    <h2>Sudah Selesai</h2>
                                                    <h4>200 Porsi</h4>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <div class="row row-cols-4">
                                                    <div class="col">
                                                        <div class="card bg-primary-edit">
                                                            <div class="card-body">
                                                                <h1 class="text-white">1</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h1>2</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h1>3</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h1>4</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="text-center py-3">AYAM GORENG 200 PORSI</h4>
                                            <div class="table-responsive">
                                                <table class="table table-kitchen">
                                                    <thead>
                                                        <tr>
                                                            <th>Bahan</th>
                                                            <th>Jumlah</th>
                                                            <th>Satuan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Ayam</td>
                                                            <td>10</td>
                                                            <td>Kg</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bawang Merah</td>
                                                            <td>700</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bawang Putih</td>
                                                            <td>400</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pala</td>
                                                            <td>20</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gula Jawa</td>
                                                            <td>200</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kecap Manis</td>
                                                            <td>300</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Garam</td>
                                                            <td>30</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cengkeh</td>
                                                            <td>40</td>
                                                            <td>Gram</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="addproduct-accordion" class="custom-accordion">
                                                <div class="card">
                                                    <a href="javascript: void(0);" data-toggle="collapse" aria-controls="accordion-3" class="text-dark not-collapsed" aria-expanded="true" style="overflow-anchor: none;">
                                                        <div class="p-4">
                                                            <div class="media align-items-center">
                                                                <div class="media-body overflow-hidden">
                                                                    <h5 class="font-size-16 mb-1">TATA CARA MASAK</h5>
                                                                </div> 
                                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                            </div>
                                                        </div>
                                                    </a> 
                                                    <div id="accordion-3" data-parent="#addproduct-accordion" class="collapse show" style="">
                                                        <div class="p-4 border-top">
                                                            <h1 class="text-center py-3">TATA CARA MASAK</h1> 
                                                            <div class="table-responsive">
                                                                <table class="table table-kitchen">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Durasi</th> 
                                                                            <th>Langkah Memasak</th>
                                                                        </tr>
                                                                    </thead> 
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>4 Menit</td> 
                                                                            <td>Panaskan air hingga mendidih</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5 Menit</td> 
                                                                            <td>Rebus ayam setengah matang, tiriskan</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>3 Menit</td> 
                                                                            <td>Tumis bawang merah, bawang putih, pala</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5 Menit</td> 
                                                                            <td>Masukan air</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5 Menit</td> 
                                                                            <td>Masukan cengkeh, gula jawa, kecap manis, garam</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>10 Menit</td> 
                                                                            <td>Masukan ayam yang sudah direbus</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5 Menit</td> 
                                                                            <td>Masak hingga matang</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5 Menit</td> 
                                                                            <td>Pindahkan ke meja serving setelah matang</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card-body -->
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
</body>
</html>