<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
        .btn-custom {
            background-color: #495057; /* Warna abu-abu tua */
            color: white; /* Teks berwarna putih */
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            text-transform: uppercase; /* Mengubah teks tombol menjadi huruf kapital */
            text-decoration: none;
            display: inline-block;
            margin: 2px;
        }
        .btn-custom:hover {
            background-color: #343a40; /* Warna sedikit lebih gelap saat hover */
            color: #f8f9fa; /* Teks lebih terang */
        }
    </style>
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>Detail Produk: {{ $product->nama_bahan }}</h3>
                        <hr/>
                        <p><strong>Nama Bahan:</strong> {{ $product->nama_bahan }}</p>
                        <p><strong>Kategori:</strong> {{ $product->kategori }}</p>
                        <p><strong>Harga:</strong> {{ "Rp " . number_format($product->harga,2,',','.') }}</p>
                        <p><strong>Jumlah:</strong> {{ $product->jumlah }}</p>
                        <p><strong>Tanggal Masuk:</strong> {{ $product->tanggal_masuk }}</p>
                        <p><strong>Tanggal Kadaluarsa:</strong> {{ $product->tanggal_kadaluarsa }}</p>
                        <p><strong>Bahan Sering Digunakan:</strong> {{ $product->bahan_sering_digunakan }}</p>
                        <p><strong>Bahan Jarang Digunakan:</strong> {{ $product->bahan_jarang_digunakan }}</p>
                        <a href="/products" class="btn btn-custom mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>