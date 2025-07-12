<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $header }}</title>
    @include('Template.head')
    <style>
        body {
            font-size: 20px;
        }
        .nav-pills .nav-link {
            border-radius: 0;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .card {
            margin: 10px;
        }
        .row.justify-content-center {
            gap: 20px; /* Menambah jarak antar kartu */
        }
    </style>
</head>
<body class="hold-transition sidebar-mini sidebar-closed sidebar-collapse">
    <div class="wrapper">

        <!-- Sidebar -->
        @include('Template.left-sidebar')

        <!-- Content Wrapper -->
        <div class="content-wrapper">

            <!-- Card Nama Dapur -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card p-3" style="font-size:25px;">
                        <p><strong>Nama Dapur:</strong> <span id="namaDapur"></span></p>
                        <p><strong>Daftar menu tanggal:</strong> <span id="tanggalMenu"></span></p>
                    </div>

                    <!-- Nav Pills di dalam Card -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#utama" data-toggle="tab">Utama</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#penerimaan" data-toggle="tab">Penerimaan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#ompreng" data-toggle="tab">Ompreng</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- Tab Utama -->
                                        <div class="active tab-pane" id="utama">
                                            <div class="row justify-content-center text-center">
                                                <!-- Karbohidrat -->
                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                    <div class="info-box bg-primary">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-white" style="opacity: 0.7;">Karbohidrat</span>
                                                            <span id="karbohidrat" class="info-box-number text-white" style="font-weight: bold;">-</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Protein -->
                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                    <div class="info-box bg-success">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-white" style="opacity: 0.7;">Protein</span>
                                                            <span id="protein" class="info-box-number text-white" style="font-weight: bold;">-</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Sayur -->
                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                    <div class="info-box bg-warning">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-white" style="opacity: 0.7;">Sayur</span>
                                                            <span id="sayur" class="info-box-number text-white" style="font-weight: bold;">-</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Buah -->
                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                    <div class="info-box bg-danger">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-white" style="opacity: 0.7;">Buah</span>
                                                            <span id="buah" class="info-box-number text-white" style="font-weight: bold;">-</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Susu -->
                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                    <div class="info-box bg-info">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-white" style="opacity: 0.7;">Susu</span>
                                                            <span id="susu" class="info-box-number text-white" style="font-weight: bold;">-</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Penerima Makan Gratis Hari Ini -->
                                            <div class="row mt-4">
                                                <div class="col-12 text-center">
                                                    <h2>Penerima Makan Gratis Hari Ini</h2>
                                                    <span id="timeDisplay"></span>
                                                </div>
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="penerimaTable" class="table table-bordered text-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th>TK - SD Kelas 3</th>
                                                                        <th>SD Kelas 4 - SMA</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2">🔄 Memuat data...</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- End Tab Utama -->

                                        <!-- Tab Penerimaan -->
                                        <div class="tab-pane" id="penerimaan">
                                            <div class="row mt-3">
                                                <div class="col-12 text-center">
                                                    <h2>Barang Datang Hari Ini</h2>
                                                </div>
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <span id="timeDisplay"></span>
                                                            <table id="bahanTable" class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Bahan</th>
                                                                        <th>Jumlah Pesen</th>
                                                                        <th>Jumlah Datang</th>
                                                                        <th>Tanggal dan Jam</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="5">🔄 Memuat data...</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- End Tab Penerimaan -->

                                        <!-- Tab Ompreng -->
                                        <div class="tab-pane" id="ompreng">
                                            <div class="row mt-3">
                                                <div class="col-12 text-center">
                                                    <h2>Ompreng Hari Ini</h2>
                                                </div>
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <span id="timeDisplay"></span>
                                                            <table id="omprengTable" class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Line 1</th>
                                                                        <th>Line 2</th>
                                                                        <th>Line 3</th>
                                                                        <th>Line 4</th>
                                                                        <th>Line 5</th>
                                                                        <th>Line 6</th>
                                                                        <th>Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="omprengTablebody">
                                                                    <tr>
                                                                        <td colspan="7">🔄 Memuat data...</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- End Tab Ompreng -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        @include('Template.footer')

    </div>

    @include('Template.script')

    <script>
        document.addEventListener("DOMContentLoaded", async function () {
    try {
        await fetchAllMenus();
        updateTime();
    } catch (error) {
        console.error("Error initializing:", error);
    }
});

let menuData = [];
let currentMenuIndex = 0;
let tabOrder = ['#utama', '#penerimaan', '#ompreng'];
let currentTabIndex = 0;

// Fungsi untuk mengganti tab otomatis setiap 10 detik
function startTabSwitching() {
    setInterval(() => {
        try {
            currentTabIndex = (currentTabIndex + 1) % tabOrder.length; // Loop tab
            const nextTab = tabOrder[currentTabIndex];
            document.querySelector(`a[href="${nextTab}"]`)?.click();
        } catch (error) {
            console.error("Error switching tab:", error);
        }
    }, 10000); // Ganti tab setiap 10 detik
}

async function fetchAllMenus() {
    try {
        const response = await fetch(`http://127.0.0.1:8000/api/menu-hari-ini`);
        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
        menuData = await response.json();

        if (Array.isArray(menuData) && menuData.length > 0) {
            currentMenuIndex = 0;
            displayAndFetchData(menuData[currentMenuIndex]);
            startTabSwitching(); // Mulai otomatis pindah tab
            rotateMenu(); // Mulai rotasi data dapur
        } else {
            console.error("Data menu tidak ditemukan untuk dapur.");
        }
    } catch (error) {
        console.error("Error Fetch Menu Hari Ini:", error);
    }
}

// Auto Refresh setelah semua menu selesai ditampilkan
function rotateMenu() {
    setTimeout(() => {
        currentMenuIndex++;
        if (currentMenuIndex >= menuData.length) {
            console.log("Semua menu telah ditampilkan. Refresh halaman dalam 1 detik...");
            setTimeout(() => {
                location.reload();
            }, 1000);
            return;
        }

        displayAndFetchData(menuData[currentMenuIndex]);
        rotateMenu(); // Rekursif
    }, 10000); // Ganti data dapur tiap 10 detik
}


// Fungsi untuk menampilkan menu dan mengambil data terkait
function displayAndFetchData(menu) {
    console.log("Menampilkan Menu:", menu);
    updateElement("karbohidrat", menu.karbohidrat);
    updateElement("protein", menu.protein);
    updateElement("sayur", menu.sayur);
    updateElement("buah", menu.buah);
    updateElement("susu", menu.susu);
    updateElement("namaDapur", menu.nomor_dapur);
    updateElement("tanggalMenu", menu.tanggal);

    if (menu.nomor_dapur) {
        fetchPenerimaMakanGratis(menu.nomor_dapur);
        fetchPenerimaanBahan(menu.nomor_dapur);
        fetchHasilOmpreng(menu.nomor_dapur); 
    } else {
        console.error("Nomor dapur tidak ditemukan dalam menu hari ini.");
    }
}

async function fetchPenerimaMakanGratis(nomorDapur) {
    try {
        const response = await fetch(`http://127.0.0.1:8000/api/penerima-makan-gratis?nomor_dapur=${nomorDapur}`);
        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

        const data = await response.json();
        populateTablePenerima(data.filter(item => item.nomor_dapur === nomorDapur));
    } catch (error) {
        console.error("Fetch Error Penerima Makan:", error);
        showError("Gagal mengambil data penerima makan.");
    }
}

async function fetchPenerimaanBahan(nomorDapur) {
    try {
        const response = await fetch(`http://127.0.0.1:8000/api/penerimaan-bahan?nomor_dapur=${nomorDapur}`);
        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

        const data = await response.json();
        populateTableBahan(data.filter(item => item.nomor_dapur === nomorDapur));
    } catch (error) {
        console.error("Fetch Error Penerimaan Bahan:", error);
        showErrorBahan("Gagal mengambil data penerimaan bahan.");
    }
}

async function fetchHasilOmpreng(nomorDapur) {
    try {
        const response = await fetch(`http://127.0.0.1:8000/api/hasil-ompreng?nomor_dapur=${nomorDapur}`);
        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

        const data = await response.json();
        populateTableOmpreng(data.filter(item => item.nomor_dapur === nomorDapur));
    } catch (error) {
        console.error("Fetch Error Hasil Ompreng:", error);
        showErrorOmpreng("Gagal mengambil data ompreng.");
    }
}


function updateElement(id, value) {
    const el = document.getElementById(id);
    if (el) el.innerHTML = value || "-";
}

function updateTime() {
    const timeElement = document.getElementById("timeDisplay");
    if (timeElement) {
        timeElement.innerHTML = new Date().toLocaleTimeString();
        setTimeout(updateTime, 1000);
    }
}

function populateTablePenerima(data) {
    const tableBody = document.querySelector("#penerimaTable tbody");
    if (tableBody) {
        tableBody.innerHTML = "";
        if (!data.length) {
            tableBody.innerHTML = `<tr><td colspan="2" style="text-align: center;">Tidak ada data penerima makan.</td></tr>`;
            return;
        }
        data.forEach(item => {
            const row = document.createElement("tr");
            row.innerHTML = `<td>${item.jumlah_tk_sd_kls3 ? item.jumlah_tk_sd_kls3 + " Anak" : "-"}</td>
                             <td>${item.jumlah_sd_kls4_sma ? item.jumlah_sd_kls4_sma + " Anak" : "-"}</td>`;
            tableBody.appendChild(row);
        });
    }
}

function populateTableBahan(data) {
    const tableBody = document.querySelector("#bahanTable tbody");
    if (tableBody) {
        tableBody.innerHTML = "";
        if (!data.length) {
            tableBody.innerHTML = `<tr><td colspan="4" style="text-align: center;">Tidak ada data bahan yang diterima.</td></tr>`;
            return;
        }
        data.forEach((item, index) => {
            let row = document.createElement("tr");
            row.innerHTML = `<td>${index + 1}</td>
                             <td>${item.nama_bahan || "-"}</td>
                             <td>${item.jumlah ? item.jumlah + " pcs" : "-"}</td>
                              <td>${item.jumlah_datang ? item.jumlah_datang + "" : ""}</td>
                              <td>${item.tanggal_jam ? new Date(item.tanggal_jam).toLocaleString('id-ID', {
                                         year: 'numeric',
                                         month: '2-digit', // 'numeric' untuk angka tanpa leading zero, '2-digit' untuk dengan leading zero
                                         day: '2-digit',
                                         hour: '2-digit',
                                         minute: '2-digit',
                                         hour12: false}) : "-"}</td>`;  // Menggunakan format 24 jam 
            tableBody.appendChild(row);
        });
    }
}

function populateTableOmpreng(data) {
    const tableBody = document.querySelector("#omprengTable tbody");
    if (tableBody) {
        tableBody.innerHTML = "";
        if (!data.length) {
            tableBody.innerHTML = `<tr><td colspan="7" style="text-align: center;">Tidak ada data ompreng.</td></tr>`;
            return;
        }
        data.forEach((item, index) => {
            let row = document.createElement("tr");
            row.innerHTML = `
                <td>${item.line1 || "-"}</td>
                <td>${item.line2 || "-"}</td>
                <td>${item.line3 || "-"}</td>
                <td>${item.line4 || "-"}</td>
                <td>${item.line5 || "-"}</td>
                <td>${item.line6 || "-"}</td>
                <td><strong>${(item.line1 || 0) + (item.line2 || 0) + (item.line3 || 0) + (item.line4 || 0) + 
                              (item.line5 || 0) + (item.line6 || 0)}</strong></td>
            `;
            tableBody.appendChild(row);
        });
    }
}

function showError(message) {
    const tableBody = document.querySelector("#penerimaTable tbody");
    if (tableBody) {
        tableBody.innerHTML = `<tr><td colspan="2" class="text-danger">${message}</td></tr>`;
    }
}

function showErrorBahan(message) {
    const tableBody = document.querySelector("#bahanTable tbody");
    if (tableBody) {
        tableBody.innerHTML = `<tr><td colspan="4" class="text-danger">${message}</td></tr>`;
    }
}

function showErrorOmpreng(message) {
    const tableBody = document.querySelector("#omprengTable tbody");
    if (tableBody) {
        tableBody.innerHTML = `<tr><td colspan="7" class="text-danger">${message}</td></tr>`;
    }
}

    </script>
</body>
</html>