<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
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

    <h2 style="text-align: center;">Laporan Data Supplier</h2>
    <p style="text-align: center;">Periode: {{ $start_date }} - {{ $end_date }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Jenis Supplier</th>
                <th>No Telepon</th>
                <th>Alamat Supplier</th>
                <th>Nama PIC</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $index => $supplier)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->bahan->bahan ?? 'Tidak Ada' }}</td>
                    <td>{{ $supplier->no_telp }}</td>
                    <td>{{ $supplier->alamat_supplier }}</td>
                    <td>{{ $supplier->nama_PIC }}</td>
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
