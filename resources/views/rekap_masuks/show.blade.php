<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Rekap Masuk - Donalia Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
        .btn-custom {
            background-color: #495057; /* Warna abu-abu tua */
            color: white; /* Warna teks putih */
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            text-transform: uppercase; /* Mengubah teks tombol menjadi huruf kapital */
            text-decoration: none;
            display: inline-block;
            margin: 2px;
        }

        .btn-custom:hover {
            background-color: #343a40; /* Sedikit lebih gelap untuk efek hover */
            color: #f8f9fa; /* Warna teks putih lebih terang saat hover */
        }
    </style>
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>Detail Rekap Masuk: {{ $rekap_masuk->nama_bahan }}</h3>
                        <hr/>
                        <p><strong>Jenis Transaksi:</strong> {{ $rekap_masuk->jenis_transaksi }}</p>
                        <p><strong>Tanggal Masuk:</strong> {{ $rekap_masuk->tanggal_masuk }}</p>
                        <p><strong>Jumlah Masuk:</strong> {{ $rekap_masuk->jumlah_masuk }}</p>
                        <a href="/rekap_masuks" class="btn btn-custom mt-3">KEMBALI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>