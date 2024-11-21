<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Rekap Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        /* Styles for the dashboard */
        body, table, h1, h2, h3, h4, h5, h6, p, a, div, span {
            font-family: 'Times New Roman', Times, serif;
        }
        .btn-custom, .btn-custom-view, .btn-custom-edit, .btn-custom-delete {
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
        .btn-custom:hover, .btn-custom-view:hover, .btn-custom-edit:hover, .btn-custom-delete:hover {
            background-color: #343a40; /* Sedikit lebih gelap untuk efek hover */
            color: #f8f9fa; /* Warna teks putih lebih terang saat hover */
        }
        table th, table td {
            text-align: center; /* Center align text in table cells */
            vertical-align: middle; /* Center align vertically */
        }
        h1, table, footer {
            text-align: center; /* Rata tengah teks judul, tabel, dan footer */
        }
        table {
            margin: auto; /* Rata tengah tabel */
            width: 80%; /* Mengatur lebar tabel */
        }
        .table th, .table td {
            text-align: center; /* Rata tengah teks di dalam tabel */
        }
        .btn-container {
            display: flex;
            justify-content: flex-start; /* Menjaga tombol di bagian samping kiri */
            margin-bottom: 1rem;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark">
        <a class="navbar-brand ps-3" href="#">Rekap Masuk</a>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="products">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Stok Bahan
                        </a>
                        <a class="nav-link" href="rekap_masuks">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Rekap Masuk
                        </a>
                        <a class="nav-link" href="rekap_keluars">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
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
                    <h1 class="mt-4"><strong>Rekap Masuk Bahan Baku Donalia Coffee and Bakery</strong></h1>
                    <div class="btn-container">
                        <a href="{{ route('rekap_masuks.create') }}" class="btn btn-md btn-custom">TAMBAH PRODUK</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis Transaksi</th>
                                <th>Tanggal Masuk</th>
                                <th>Jumlah Masuk</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($rekapMasuks as $rekap_masuk)
                            <tr>
                                <td>{{ $rekap_masuk->id }}</td>
                                <td>{{ $rekap_masuk->jenis_transaksi }}</td>
                                <td>{{ $rekap_masuk->tanggal_masuk }}</td>
                                <td>{{ $rekap_masuk->jumlah_masuk }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda yakin?');" action="{{ route('rekap_masuks.destroy', $rekap_masuk->id) }}" method="POST">
                                        <a href="{{ route('rekap_masuks.show', $rekap_masuk->id) }}" class="btn btn-sm btn-custom">Lihat</a>
                                        <a href="{{ route('rekap_masuks.edit', $rekap_masuk->id) }}" class="btn btn-sm btn-custom">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-custom">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Rekap Masuk belum tersedia.</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                    {{ $rekapMasuks->links() }}

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>