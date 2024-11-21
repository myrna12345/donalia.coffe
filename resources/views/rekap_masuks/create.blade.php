<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Rekap Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-custom {
            background-color: #495057; /* Warna abu-abu tua */
            color: #ffffff; /* Warna teks putih */
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            text-transform: uppercase;
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
<body>
    <div class="container mt-5">
        <h1>Tambah Data Rekap Masuk</h1>
        <form action="{{ route('rekap_masuks.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="jenis_transaksi">Jenis Transaksi</label>
                <input type="text" class="form-control" name="jenis_transaksi" id="jenis_transaksi" required>
            </div>

            <div class="form-group mb-3">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" required>
            </div>

            <div class="form-group mb-3">
                <label for="jumlah_masuk">Jumlah Masuk</label>
                <input type="number" class="form-control" name="jumlah_masuk" id="jumlah_masuk" required>
            </div>

            <!-- Tombol simpan dengan kelas btn-custom -->
            <button type="submit" class="btn btn-custom">Simpan</button>

            <!-- Tombol atur ulang dengan kelas btn-custom -->
            <button type="reset" class="btn btn-custom">Atur Ulang</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>