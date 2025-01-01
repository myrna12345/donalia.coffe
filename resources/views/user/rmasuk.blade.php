<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <style>
        /* Styling untuk container */
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }

        /* Styling untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Styling untuk judul tabel */
        h1 {
            text-align: center;
        }

        /* Styling untuk navigasi */
        .nav {
            width: 100%;
            background-color: #333;
            overflow: hidden;
        }

        .nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .nav a:hover {
            background-color: #ddd;
            color: black;
        }

        .nav a.active {
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

    <div class="nav">
        <a href="products" class="active">Product</a>
        <a href="masuk">Rekap Masuk</a>
        <a href="keluar">Rekap Keluar</a>
    </div>

    <div class="container">
        <h1>Daftar Produk</h1>

        <table>
            <thead>
                <tr>
                    <th>Jenis Transaksi</th>
                    <th>Tanggal Masuk</th>
                    <th>Jumlah Masuk</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rekap_masuk as $rekap)
                    <tr>
                        <td>{{ $rekap->jenis_transaksi }}</td>
                        <td>{{ \Carbon\Carbon::parse($rekap->tanggal_masuk)->format('d M Y') }}</td>
                        <td>{{ number_format($rekap->jumlah_masuk, 0, ',', '.') }} unit</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>