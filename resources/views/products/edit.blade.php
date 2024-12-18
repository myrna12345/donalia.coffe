<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif; /* Mengatur font halaman menjadi Times New Roman */
            background: lightgray;
        }
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
        /* Styling untuk judul */
        h1 {
            font-size: 1.5rem; /* Ukuran font judul */
            font-weight: bold;
        }
        /* Styling untuk label */
        label {
            font-weight: bold; /* Membuat teks pada label menjadi tebal */
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <!-- Judul Halaman -->
                        <h1 class="text-center mb-4">Edit Stok Bahan</h1>
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <!-- Pesan error untuk image -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Nama Bahan</label>
                                <input type="text" class="form-control @error('nama_bahan') is-invalid @enderror" name="nama_bahan" value="{{ old('nama_bahan', $product->nama_bahan) }}" placeholder="Masukkan Nama Bahan">
                            
                                @error('nama_bahan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Kategori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori', $product->kategori) }}" placeholder="Masukkan Kategori Bahan">
                            
                                @error('kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Tanggal Masuk</label>
                                <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk" value="{{ old('tanggal_masuk', $product->tanggal_masuk) }}">
                            
                                @error('tanggal_masuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Tanggal Kadaluarsa</label>
                                <input type="date" class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror" name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa', $product->tanggal_kadaluarsa) }}">
                            
                                @error('tanggal_kadaluarsa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Bahan Sering Digunakan</label>
                                <input type="text" class="form-control @error('bahan_sering_digunakan') is-invalid @enderror" name="bahan_sering_digunakan" value="{{ old('bahan_sering_digunakan', $product->bahan_sering_digunakan) }}" placeholder="Masukkan Bahan Sering Digunakan">
                            
                                @error('bahan_sering_digunakan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Bahan Jarang Digunakan</label>
                                <input type="text" class="form-control @error('bahan_jarang_digunakan') is-invalid @enderror" name="bahan_jarang_digunakan" value="{{ old('bahan_jarang_digunakan', $product->bahan_jarang_digunakan) }}" placeholder="Masukkan Bahan Jarang Digunakan">
                            
                                @error('bahan_jarang_digunakan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Harga</label>
                                        <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $product->harga) }}" placeholder="Masukkan Harga Bahan">
                                    
                                        @error('harga')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Jumlah</label>
                                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah', $product->jumlah) }}" placeholder="Masukkan Jumlah Bahan">
                                    
                                        @error('jumlah')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-custom me-1">PERBARUI</button>
                            <button type="reset" class="btn btn-md btn-custom ms-1">ATUR ULANG</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>