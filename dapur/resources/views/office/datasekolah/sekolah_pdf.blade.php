<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sekolah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 200px;
            text-align: right;
        }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Laporan Data Sekolah</h2>
    <p style="text-align: center;">Periode: {{ $start_date }} - {{ $end_date }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Sekolah</th>
                <th>Jenjang Sekolah</th>
                <th>Jumlah Siswa</th>
                <th>Alamat Sekolah</th>
                <th>Nomor Dapur</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sekolah as $index => $sekolah)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sekolah->nama_sekolah }}</td>
                    <td>{{ $sekolah->tingkatanSekolah->jenjang_sekolah ?? 'Tidak Ada' }}</td>
                    <td>{{ $sekolah->jumlah_siswa }}</td>
                    <td>{{ $sekolah->alamat_sekolah }}</td>
                    <td>{{ $sekolah->id_dapur }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Disetujui oleh,</p>
        <br><br>
        <p>Kepala Dapur</p>
    </div>

</body>
</html>
