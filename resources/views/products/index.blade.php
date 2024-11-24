<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Stok Bahan</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url('{{ asset("assets/img/background.jpg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: #d3d3d3;
            color: black;
            font-family: 'Times New Roman', Times, serif;
        }
        .sb-sidenav, .sb-topnav {
            background-color: #3a3a3a;
        }
        .sb-sidenav .sb-sidenav-menu-heading,
        .sb-sidenav .nav-link,
        .sb-sidenav-footer,
        .sb-topnav .navbar-brand,
        .sb-topnav .nav-link {
            color: white;
        }
        .btn-custom, .btn-custom-view, .btn-custom-edit, .btn-custom-delete {
            background-color: #3a3a3a;
            color: white !important;
            border: 1px solid #ccc;
        }
        .btn-custom:hover, .btn-custom-view:hover, .btn-custom-edit:hover, .btn-custom-delete:hover {
            background-color: #5a5a5a;
        }
        .alert-custom {
            background-color: white !important;
            color: black !important;
            border: 1px solid #ccc;
        }
        .title-container {
            background-color: #f4f4f4;
            padding: 5px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .text-center-title {
            color: black;
            font-size: 18px;
            margin: 0;
        }
        table {
            background-color: rgba(255, 255, 255, 0.8);
            border-collapse: collapse;
            width: 100%;
            color: black;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            color: black;
        }
        th {
            background-color: #007bff;
        }
        tr:nth-child(even) {
            background-color: rgba(245, 245, 245, 0.9);
        }
        tr:hover {
            background-color: rgba(200, 200, 255, 0.5);
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark sb-topnav">
        <a class="navbar-brand ps-3" href="#">Stok Bahan</a>
    </nav>
    
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="{{ route('products.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Stok Bahan
                        </a>
                        <a class="nav-link" href="{{ route('rekap_masuks.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
                            Rekap Masuk
                        </a>
                        <a class="nav-link" href="{{ route('rekap_keluars.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-dolly"></i></div>
                            Rekap Keluar
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    User Name
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- Title Section -->
                    <div class="title-container">
                        <h1 class="mt-2 text-center-title"><strong>Stok Bahan Baku Donalia Coffee and Bakery</strong></h1>
                    </div>

                    <!-- Add Product Button -->
                    <a href="{{ route('products.create') }}" class="btn btn-md btn-custom mb-3" style="margin-top: 15px;">TAMBAH PRODUK</a>

                    <!-- Table Wrapper -->
                    <div class="table-wrapper">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nama Bahan</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Tanggal Kadaluarsa</th>
                                    <th scope="col">Bahan Sering Digunakan</th>
                                    <th scope="col">Bahan Jarang Digunakan</th>
                                    <th scope="col" style="width: 20%">Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->nama_bahan }}</td>
                                        <td>{{ $product->kategori }}</td>
                                        <td>{{ "Rp " . number_format($product->harga, 2, ',', '.') }}</td>
                                        <td>{{ $product->jumlah }}</td>
                                        <td>{{ $product->tanggal_masuk }}</td>
                                        <td>{{ $product->tanggal_kadaluarsa }}</td>
                                        <td>{{ $product->bahan_sering_digunakan }}</td>
                                        <td>{{ $product->bahan_jarang_digunakan }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-custom-view">LIHAT</a>
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-custom-edit">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-custom-delete">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center alert alert-custom">Data Produk belum Tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $products->links() }}
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto" style="color: black;">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; ciaa</div>
                        <div>
                            <a href="#" style="color: black;">Privacy Policy</a> &middot;
                            <a href="#" style="color: black;">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
