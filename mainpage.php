<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if the user is not an admin
$isAdmin = ($_SESSION['username'] === 'admin123');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style/bootstrap-5.3.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/regular.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/solid.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/brands.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style/custom/mainpage.css">

</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="path_to_your_logo.png" alt="Logo" class="logo">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#masterMenu">
                    <i class="fas fa-cogs"></i> Master
                </a>
                <div class="collapse" id="masterMenu">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="#">
                                <i class="far fa-circle"></i> Pengangkutan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="#">
                                <i class="far fa-circle"></i> Pelayaran
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="#">
                                <i class="far fa-circle"></i> Forwarding
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="#">
                                <i class="far fa-circle"></i> Customer
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="#">
                                <i class="far fa-circle"></i> Perkiraan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="#">
                                <i class="far fa-circle"></i> Inventaris
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#transactionMenu">
                    <i class="fas fa-exchange-alt"></i> Transaction
                </a>
                <div class="collapse" id="transactionMenu">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="emkl/emkl_index.php">
                                <i class="far fa-circle"></i> EMKL
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="#">
                                <i class="far fa-circle"></i> Dokumen
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="#">
                                <i class="far fa-circle"></i> Data Kapal
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="#">
                                <i class="far fa-circle"></i> Tutup EMKL
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="#">
                                <i class="far fa-circle"></i> Invoice
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="#">
                                <i class="far fa-circle"></i> Cetak FPS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="#">
                                <i class="far fa-circle"></i> Jurnal Umum
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" data-bs-toggle="collapse" href="#pelunasanMenu">
                                <i class="far fa-circle"></i> Pelunasan
                            </a>
                            <div class="collapse" id="pelunasanMenu">
                                <ul class="nav flex-column">
                                <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Hutang
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Piutang
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Giro
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#laporanMenu">
                    <i class="fas fa-file-alt"></i> Laporan
                </a>
                <div class="collapse" id="laporanMenu">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" data-bs-toggle="collapse" href="#laptransaksiMenu">
                                <i class="far fa-circle"></i> Lap. Transaksi
                            </a>
                            <div class="collapse" id="laptransaksiMenu">
                                <ul class="nav flex-column">
                                <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> EMKL
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Invoice
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" data-bs-toggle="collapse" href="#lapkeuanganMenu">
                                <i class="far fa-circle"></i> Lap. Keuangan
                            </a>
                            <div class="collapse" id="lapkeuanganMenu">
                                <ul class="nav flex-column">
                                <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Buku Besar
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Laba / Rugi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Neraca
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" href="#">
                                <i class="far fa-circle"></i> Lap. Jurnal
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" data-bs-toggle="collapse" href="#laphutangpiutangMenu">
                                <i class="far fa-circle"></i> Lap. Hutang Piutang
                            </a>
                            <div class="collapse" id="laphutangpiutangMenu">
                                <ul class="nav flex-column">
                                <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Status Hutang Piutang
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Tagihan Jatuh Tempo
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Giro
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Kartu Hutang Piutang
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font_sidebar" data-bs-toggle="collapse" href="#lapumumMenu">
                                <i class="far fa-circle"></i> Lap. Umum
                            </a>
                            <div class="collapse" id="lapumumMenu">
                                <ul class="nav flex-column">
                                <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Customer List
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Kode Perkiraan
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font_sidebar_small" href="#">
                                            <i class="far fa-circle"></i> Inventaris
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#utilityMenu">
                    <i class="fas fa-wrench"></i> Utility
                </a>
                <div class="collapse" id="utilityMenu">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="far fa-circle"></i> Utility 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="far fa-circle"></i> Utility 2
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php if ($isAdmin) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="adminpage.php">
                        <i class="fas fa-user"></i> Admin Page
                    </a>
                </li>
            <?php endif; ?>
            <li class="nav-item mt-auto">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->

    <!-- Page content -->
    <div class="content">

        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Main Page</h1>
                        <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>2023 &copy; BETA APP</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.content -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="bootstrap-5.3.0/dist/js/bootstrap.min.js"></script>
    
</body>

</html>
