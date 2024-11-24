<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Stok Bahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-custom {
            background-color: #495057; /* Warna abu-abu tua */
            color: white;
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
            background: lightgray; /* Menggunakan latar belakang abu-abu */
        }

        /* Optional: Jika ingin menyesuaikan font pada form input */
        .form-control {
            font-family: 'Times New Roman', Times, serif;
        }

        /* Styling untuk heading */
        h1 {
            font-size: 1.5rem; /* Ukuran font judul lebih kecil */
            font-weight: bold; /* Menebalkan teks judul */
        }

        .form-group label {
            font-weight: bold; /* Menebalkan label form */
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h1 class="text-center">Tambah Stok Bahan</h1>
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Nama Bahan -->
                            <div class="form-group mb-3">
                                <label for="nama_bahan">Nama Bahan</label>
                                <input type="text" class="form-control @error('nama_bahan') is-invalid @enderror" name="nama_bahan" value="{{ old('nama_bahan') }}" required placeholder="Masukkan Nama Bahan">
                                @error('nama_bahan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kategori -->
                            <div class="form-group mb-3">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori') }}" required placeholder="Masukkan Kategori Bahan">
                                @error('kategori')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal Masuk -->
                            <div class="form-group mb-3">
                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required>
                                @error('tanggal_masuk')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal Kadaluarsa -->
                            <div class="form-group mb-3">
                                <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                                <input type="date" class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror" name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa') }}" required>
                                @error('tanggal_kadaluarsa')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Bahan Sering Digunakan -->
                            <div class="form-group mb-3">
                                <label for="bahan_sering_digunakan">Bahan Sering Digunakan</label>
                                <input type="text" class="form-control @error('bahan_sering_digunakan') is-invalid @enderror" name="bahan_sering_digunakan" value="{{ old('bahan_sering_digunakan') }}" required placeholder="Masukkan Informasi Bahan Sering Digunakan">
                                @error('bahan_sering_digunakan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Bahan Jarang Digunakan -->
                            <div class="form-group mb-3">
                                <label for="bahan_jarang_digunakan">Bahan Jarang Digunakan</label>
                                <input type="text" class="form-control @error('bahan_jarang_digunakan') is-invalid @enderror" name="bahan_jarang_digunakan" value="{{ old('bahan_jarang_digunakan') }}" required placeholder="Masukkan Informasi Bahan Jarang Digunakan">
                                @error('bahan_jarang_digunakan')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Harga dan Jumlah -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="harga">Harga</label>
                                        <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required placeholder="Masukkan Harga Bahan">
                                        @error('harga')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah') }}" required placeholder="Masukkan Jumlah Bahan">
                                        @error('jumlah')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Simpan dan Atur Ulang -->
                            <button type="submit" class="btn btn-md btn-custom me-1">Simpan</button>
                            <button type="reset" class="btn btn-md btn-custom ms-1">Atur Ulang</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>