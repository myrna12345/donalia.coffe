<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Rekap Keluar</title>
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
        .btn-custom {
            background-color: #3a3a3a;
            color: white !important;
            border: 1px solid #ccc;
        }
        .btn-custom:hover {
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
        .btn-custom-view, .btn-custom-edit, .btn-custom-delete {
            background-color: #3a3a3a;
            color: white !important;
            border: 1px solid #ccc;
        }
        .btn-custom-view:hover, .btn-custom-edit:hover, .btn-custom-delete:hover {
            background-color: #5a5a5a;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark sb-topnav">
        <a class="navbar-brand ps-3" href="#">Rekap Keluar</a>
    </nav>
    
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="products">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Stok Bahan
                        </a>
                        <a class="nav-link" href="rekap_masuks">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Rekap Masuk
                        </a>
                        <a class="nav-link" href="rekap_keluars">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
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
                    <div class="title-container">
                        <h1 class="mt-2 text-center-title"><strong>Rekap Keluar Bahan Baku Donalia Coffe and Bakery</strong></h1>
                    </div>

                    <a href="{{ route('rekap_keluars.create') }}" class="btn btn-md btn-custom mb-3" style="margin-top: 15px;">TAMBAH PRODUK</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NAMA PRODUK</th>
                                <th scope="col">KATEGORI</th>
                                <th scope="col">HARGA</th>
                                <th scope="col">STOK</th>
                                <th scope="col" style="width: 20%">MENU</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rekap_keluars as $rekap_keluar)
                                <tr>
                                    <td>{{ $rekap_keluar->id }}</td>
                                    <td>{{ $rekap_keluar->title }}</td>
                                    <!-- Menggunakan strip_tags untuk menghilangkan tag HTML -->
                                    <td>{{ strip_tags($rekap_keluar->description) }}</td>
                                    <td>{{ "Rp " . number_format($rekap_keluar->price, 2, ',', '.') }}</td>
                                    <td>{{ $rekap_keluar->stock }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('rekap_keluars.destroy', $rekap_keluar->id) }}" method="POST">
                                            <a href="{{ route('rekap_keluars.show', $rekap_keluar->id) }}" class="btn btn-sm btn-custom-view">LIHAT</a>
                                            <a href="{{ route('rekap_keluars.edit', $rekap_keluar->id) }}" class="btn btn-sm btn-custom-edit">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-custom-delete">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-custom">
                                    Data Produk belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $rekap_keluars->links() }}
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto" style="color: black;">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; ciaa </div>
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
    <script src="js/scripts.js"></script>
</body>
</html>