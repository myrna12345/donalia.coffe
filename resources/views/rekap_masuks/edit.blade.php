<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Rekap Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styles for the button */
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

        /* Mengatur font menjadi Times New Roman untuk seluruh body */
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        /* Optional: Jika ingin menyesuaikan font pada form input */
        .form-control {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Data Rekap Masuk</h1>
        <form action="{{ route('rekap_masuks.update', $rekap_masuk->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="jenis_transaksi">Jenis Transaksi</label>
                <input type="text" class="form-control" name="jenis_transaksi" id="jenis_transaksi" value="{{ old('jenis_transaksi', $rekap_masuk->jenis_transaksi) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk', $rekap_masuk->tanggal_masuk) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="jumlah_masuk">Jumlah Masuk</label>
                <input type="number" class="form-control" name="jumlah_masuk" id="jumlah_masuk" value="{{ old('jumlah_masuk', $rekap_masuk->jumlah_masuk) }}" required>
            </div>

            <button type="submit" class="btn btn-custom">Perbarui</button>
            <a href="{{ route('rekap_masuks.index') }}" class="btn btn-custom">Atur Ulang</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>