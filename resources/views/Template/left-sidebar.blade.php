<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('image/logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Aplikasi Dapur</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ strtoupper(auth()->user()->name) }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                
                
                

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (auth()->user()->level == "admin" )
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Presensi Per Karyawan</p>
                            </a>
                        </li>
                        @endif
                        @if (auth()->user()->level == "admin")
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Presensi Keseluruhan</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ Request::is('resep*') || Request::is('mastermenu*') || Request::is('master_satuan*') || Request::is('master_bahan*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (auth()->user()->level == "pengadaan" || "admin")
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Request::is('resep*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Resep</p>
                            </a>
                        </li>
                        @endif
                        @if (auth()->user()->level == "pengadaan" || "admin")
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Request::is('mastermenu*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan menu</p>
                            </a>
                        </li>
                        @endif
                        @if (auth()->user()->level == "pengadaan" || "admin")
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Request::is('master_satuan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Satuan</p>
                            </a>
                        </li>
                        @endif
                        @if (auth()->user()->level == "pengadaan" || "admin")
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Request::is('master_bahan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Bahan</p>
                            </a>
                        </li>
                        @endif
                        
                    </ul>
                </li>

                @if (auth()->user()->level == "admin")
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Setting Admin
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                            <a href="{{ route('users_crud.index') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('template.dashboard_ybb') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard Ybb</p>
                            </a>
                        </li>
                       
                       
                    </ul>
                </li>
                @endif
                @if (auth()->user()->level == "pengadaan" || "admin")
                        
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Pengadaan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                       
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        
                       
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PO</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Supplier</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tingkatan Sekolah</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Sekolah</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Dapur</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bahan Masak</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Stok Gudang</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menu Bahan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Api Logs</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan Dapur</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan PO</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
