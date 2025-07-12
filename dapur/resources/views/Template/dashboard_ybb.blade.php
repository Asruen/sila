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
                        <p><strong>Nama Dapur:</strong> <span id="namaDapur">Kitchen 1</span></p>
                        <p><strong>Daftar menu tanggal:</strong> <span id="tanggalMenu">10/3/2025</span></p>
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
                                                            <span id="karbohidrat" class="info-box-number text-white" style="font-weight: bold;">Nasi</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Protein -->
                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                    <div class="info-box bg-success">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-white" style="opacity: 0.7;">Protein</span>
                                                            <span id="protein" class="info-box-number text-white" style="font-weight: bold;">Ayam Goreng</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Sayur -->
                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                    <div class="info-box bg-warning">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-white" style="opacity: 0.7;">Sayur</span>
                                                            <span id="sayur" class="info-box-number text-white" style="font-weight: bold;">Lodeh</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Buah -->
                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                    <div class="info-box bg-danger">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-white" style="opacity: 0.7;">Buah</span>
                                                            <span id="buah" class="info-box-number text-white" style="font-weight: bold;">Melon</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Susu -->
                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                    <div class="info-box bg-info">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-white" style="opacity: 0.7;">Susu</span>
                                                            <span id="susu" class="info-box-number text-white" style="font-weight: bold;">Susu Sapi</span>
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
                                                            <table id="bahanTable" class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Bahan</th>
                                                                        <th>Jumlah Pesan</th>
                                                                        <th>Jumlah Datang</th>
                                                                        <th>Tanggal Jam</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="6">🔄 Memuat data...</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- End Tab Penerimaan -->

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
                await fetchMenuHariIni();
                await fetchPenerimaMakanGratis();
                await fetchPenerimaanBahan();  // Ambil data bahan
                updateTime();
            } catch (error) {
                console.error("Error initializing:", error);
            }
        });

        // Auto-switch tab setiap 10 detik
        setInterval(() => {
            try {
                let activeTab = document.querySelector('.nav-pills .nav-link.active');
                if (activeTab) {
                    let nextTab = activeTab.getAttribute('href') === '#utama' ? '#penerimaan' : '#utama';
                    document.querySelector(`a[href="${nextTab}"]`)?.click();
                }
            } catch (error) {
                console.error("Error switching tab:", error);
            }
        }, 10000);

        async function fetchMenuHariIni() {
            try {
                const response = await fetch("http://127.0.0.1:8000/api/menu-hari-ini", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({
                        "nomor_dapur": "D123",
                        "tanggal": new Date().toISOString().split("T")[0]
                    })
                });

                if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

                const data = await response.json();
                console.log("Data Menu Hari Ini:", data);

                updateElement("karbohidrat", data.karbohidrat);
                updateElement("protein", data.protein);
                updateElement("sayur", data.sayur);
                updateElement("buah", data.buah);
                updateElement("susu", data.susu);

                // Update nama dapur dan tanggal
                document.getElementById("namaDapur").textContent = data.nomor_dapur; // Update nama dapur
                document.getElementById("tanggalMenu").textContent = data.tanggal; // Update tanggal
            } catch (error) {
                console.error("Error Fetch Menu Hari Ini:", error);
            }
        }

        // Ambil data penerima makan gratis
        async function fetchPenerimaMakanGratis() {
            try {
                console.log("Mengambil Data Penerima Makan...");

                const response = await fetch("http://127.0.0.1:8000/api/penerima-makan-gratis", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({
                        "nomor_dapur": "D123",
                        "tanggal": new Date().toISOString().split("T")[0]
                    })
                });

                if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

                const data = await response.json();
                console.log("Data Penerima Makan:", data);

                populateTablePenerima(data);
            } catch (error) {
                console.error("Fetch Error Penerima Makan:", error);
                showError("Gagal memuat data penerima makan.");
            }
        }

        async function fetchPenerimaanBahan() {
            try {
                console.log("Mengambil Data Penerimaan Bahan...");

                const response = await fetch("http://127.0.0.1:8000/api/penerimaan-bahan", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({
                        "nomor_dapur": "D123",
                        "tanggal": new Date().toISOString().split("T")[0]
                    })
                });

                if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

                const data = await response.json();
                console.log("Data Penerimaan Bahan:", data);

                // Cek apakah data adalah objek dan bukan array
                if (data && typeof data === 'object') {
                    populateTableBahan([data]); // Mengubah objek menjadi array
                } else {
                    showErrorBahan("Tidak ada data bahan yang diterima.");
                }
            } catch (error) {
                console.error("Fetch Error Penerimaan Bahan:", error);
                showErrorBahan("Gagal memuat data penerimaan bahan.");
            }
        }

        // Perbarui waktu real-time
        function updateTime() {
            const timeElement = document.getElementById("timeDisplay");
            if (!timeElement) {
                console.warn("Elemen #timeDisplay tidak ditemukan!");
                return;
            }
            timeElement.innerHTML = new Date().toLocaleTimeString();
            setTimeout(updateTime, 1000);
        }

        // Perbarui elemen HTML dengan data
        function updateElement(id, value) {
            const el = document.getElementById(id);
            if (!el) {
                console.warn(`Elemen #${id} tidak ditemukan.`);
                return;
            }
            el.innerHTML = value || "-";
        }

        // Masukkan data ke tabel penerima makan
        function populateTablePenerima(data) {
            console.log("Memasukkan Data ke Tabel Penerima Makan:", data);

            const tableBody = document.querySelector("#penerimaTable tbody");
            if (!tableBody) {
                console.warn("Elemen #penerimaTable tidak ditemukan!");
                return;
            }

            tableBody.innerHTML = ""; // Kosongkan tabel sebelum isi ulang

            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${data.jumlah_a ? data.jumlah_a + " Anak" : "-"}</td>
                <td>${data.jumlah_b ? data.jumlah_b + " Anak" : "-"}</td>
            `;
            tableBody.appendChild(row);
        }

        function populateTableBahan(data) {
            console.log("Memasukkan Data ke Tabel Penerimaan Bahan:", data); // Debugging

            const tableBody = document.querySelector("#bahanTable tbody");
            if (!tableBody) {
                console.warn("Elemen #bahanTable tidak ditemukan!");
                return;
            }

            tableBody.innerHTML = ""; // Kosongkan tabel sebelum isi ulang

            data.forEach((item, index) => {
                let row = document.createElement("tr");
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.bahan || "-"}</td>
                    <td>${item.jumlah ? item.jumlah + " kg" : "-"}</td>
                    // <td>${item.jumlah_datang ? item.jumlah_datang + " kg" : "-"}</td>
                    // <td>${$item->tanggal_jam)->format('d-m-Y''H:i:s')}
                    <td>${item.nama_supplier || "-"}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Tampilkan error jika gagal mengambil data penerima makan
        function showError(message) {
            const tableBody = document.querySelector("#penerimaTable tbody");
            if (tableBody) {
                tableBody.innerHTML = `<tr><td colspan="2" class="text-danger">${message}</td></tr>`;
            }
        }

        // Tampilkan error jika gagal mengambil data bahan
        function showErrorBahan(message) {
            const tableBody = document.querySelector("#bahanTable tbody");
            if (tableBody) {
                tableBody.innerHTML = `<tr><td colspan="4" class="text-danger">${message}</td></tr>`;
            }
        }
    </script>
</body>
</html>