<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Gaya untuk tombol SIMPAN */
        .btn-simpan {
            background-color: #6c757d; /* Abu-abu */
            color: white; /* Teks putih */
            border: none;
        }

        .btn-simpan:hover {
            background-color: #5a6268; /* Abu-abu gelap saat hover */
        }

        /* Gaya untuk tombol ATUR ULANG */
        .btn-atur-ulang {
            background-color: #6c757d; /* Abu-abu */
            color: white; /* Teks putih */
            border: none;
        }

        .btn-atur-ulang:hover {
            background-color: #5a6268; /* Abu-abu lebih gelap saat hover */
        }
    </style>
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('rekap_masuks.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Nama Bahan -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Bahan</label>
                                <input type="text" 
                                       class="form-control @error('nama_bahan') is-invalid @enderror" 
                                       name="nama_bahan" 
                                       value="{{ old('nama_bahan') }}" 
                                       placeholder="Masukkan Nama Bahan">
                                <!-- Error message untuk nama_bahan -->
                                @error('nama_bahan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Tanggal Masuk -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tanggal Masuk</label>
                                <input type="date" 
                                       class="form-control @error('tanggal_masuk') is-invalid @enderror" 
                                       name="tanggal_masuk" 
                                       value="{{ old('tanggal_masuk') }}">
                                <!-- Error message untuk tanggal_masuk -->
                                @error('tanggal_masuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Jumlah Masuk -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Jumlah Masuk</label>
                                <input type="number" 
                                       class="form-control @error('jumlah_masuk') is-invalid @enderror" 
                                       name="jumlah_masuk" 
                                       value="{{ old('jumlah_masuk') }}" 
                                       placeholder="Masukkan Jumlah Masuk">
                                <!-- Error message untuk jumlah_masuk -->
                                @error('jumlah_masuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Tombol Submit dan Reset -->
                            <button type="submit" class="btn btn-md btn-simpan me-3">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-atur-ulang">ATUR ULANG</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
