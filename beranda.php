<?php
$iphonelist = array(
    array("Iphone 14 Pro Max", "Warna Biru - Memory 128 Gb", 16125000, "iphone14promax.jpg"),
    array("Iphone 11", "Warna Putih - Memory  128 GB", 5000000, "iphone11.jpg"),
    array("Iphone 12 Pro", "Warna Black - Memory 256 GB", 10500000, "iphone12pro.jpg"),
    array("iphone 14 Pro", "Warna Biru - Memory 128 GB", 14122500, "iphone14pro.jpg"),
    array("iphone 11 Pro", "Warna Gray - Memory 128  GB", 6000000, "iphone11pro.jpg"),
    array("iphone 12 Pro Max", "Warna White - Memory 256 GB", 11500000, "iphone12promax.jpg"),
);
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IPhone Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            font-size: 18px;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: transform 0.2s ease-in-out;
        }

        .btn-dark {
            background-color: #343a40;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-dark:hover {
            background-color: #23272b;
        }

        .banner {
            height: 500px;
            object-fit: cover;
        }

        .card {
            height: auto;
            /* Biarkan ukuran card menyesuaikan konten */
        }

        .card-img-top {
            width: 100%;
            height: auto;
            object-fit: contain;
            background-color: #f8f8f8;
        }

        .card-img-top {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .card-body {
            padding: 10px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="beranda.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transaksi.php">Transaksi</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="container-fluid p-0">
        <img src="img/banner.jpg" class="img-fluid w-100 banner" alt="Banner">
    </div>

    <!-- Daftar Produk -->
    <div class="container my-5">
        <div class="row">
            <h2 class="fw-bold mb-4 text-start">Daftar Iphone SMK ISfi </h2>
            <!-- $iphonelist dipecah menjadi satu persatu, $index tempat utk menampung nomor array nya,
                 $data utk menampung data yang ada di array -->
            <?php foreach ($iphonelist as $index => $data) { ?>

                <div class="col-4">
                    <div class="card h-100 shadow border-0">
                        <img src="img/<?= $data[3] ?>" class="card-img-top" alt="<?= $data[0] ?>" style=" object-fit: cover;">
                        <div class="card-body">
                            <h5 class="fw-bold"><?= $data[0] ?></h5>
                            <p class="text-muted small"><?= $data[1] ?></p>
                            <p class="fw-bold text-danger">Rp <?= number_format($data[2], 0, ',', '.') ?></p>
                        </div>
                        <div class="card-footer bg-white border-0 text-center">
                            <!-- mengirimkan id sesuai index yang dipilih -->
                            <a href="transaksi.php?id=<?= $index ?>" class="btn btn-dark w-100">Pilih</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>