<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Rekap Masuk</title>
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
            background-color: lightgray; /* Menggunakan latar belakang abu-abu */
        }

        /* Optional: Jika ingin menyesuaikan font pada form input */
        .form-control {
            font-family: 'Times New Roman', Times, serif;
        }

        h1 {
            font-size: 1.5rem; /* Ukuran font judul disamakan dengan halaman sebelumnya */
            font-weight: bold; /* Menebalkan teks judul */
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h1 class="text-center">Tambah Data Rekap Masuk</h1>
                        <form action="{{ route('rekap_masuks.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="jenis_transaksi">Jenis Transaksi</label>
                                <input type="text" class="form-control @error('jenis_transaksi') is-invalid @enderror" name="jenis_transaksi" id="jenis_transaksi" required>

                                @error('jenis_transaksi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk" id="tanggal_masuk" required>

                                @error('tanggal_masuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="jumlah_masuk">Jumlah Masuk</label>
                                <input type="number" class="form-control @error('jumlah_masuk') is-invalid @enderror" name="jumlah_masuk" id="jumlah_masuk" required>

                                @error('jumlah_masuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-custom">Simpan</button>
                            <button type="reset" class="btn btn-custom">Atur Ulang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>