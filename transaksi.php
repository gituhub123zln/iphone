<?php
// Daftar produk dalam bentuk array dengan nama, deskripsi, harga, dan gambar
$iphonelist = array(
    array("Iphone 14 Pro Max", "Warna Biru - Memory 128 Gb", 16125000, "iphone14promax.jpg"),
    array("Iphone 11", "Warna Putih - Memory  128 GB", 5000000, "iphone11.jpg"),
    array("Iphone 12 Pro", "Warna Black - Memory 256 GB", 10500000, "iphone12pro.jpg"),
    array("iphone 14 Pro", "Warna Biru - Memory 128 GB", 14122500, "iphone14pro.jpg"),
    array("iphone 11 Pro", "Warna Gray - Memory 128  GB", 6000000, "iphone11pro.jpg"),
    array("iphone 12 Pro Max", "Warna White - Memory 256 GB", 11500000, "iphone12promax.jpg"),
);

// Mengambil parameter ID produk dari URL dan memastikan itu adalah angka
$id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : 0;
// Memeriksa apakah ID yang diberikan sesuai dengan indeks dalam array
// Jika valid, produk dipilih dari array berdasarkan ID.
// Jika ID tidak valid, produk pertama dipilih secara default.
if ($id >= 0 && $id < count($iphonelist)) {
    $paket = $iphonelist[$id];
} else {
    $paket = $iphonelist[0]; // Default ke produk pertama jika ID tidak valid
}

// Inisialisasi variabel transaksi
$no_transaksi = "";
$nama_cus = "";
$tanggal = "";
$jumlah_produk = 1;
$tambahan = 0;
$total_harga = 0;
$pembayaran = 0;
$kembalian = 0;

// Mengecek apakah ada data yang dikirim dari form menggunakan metode POST.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $harga = isset($_POST['harga']) ? (int)$_POST['harga'] : 0;
    $no_transaksi = $_POST['no_transaksi'];
    $nama_cus = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $tambahan = isset($_POST['tambahan']) ? (int) $_POST['tambahan'] : 0;
    $jumlah_produk = isset($_POST['jumlah_produk']) ? (int)$_POST['jumlah_produk'] : 1;
    $total_harga = $_POST['total_harga'];
    $pembayaran = isset($_POST['pembayaran']) ? (int)$_POST['pembayaran'] : 0;

    // ketika tombol hitung ditekan
    if (isset($_POST['hitung'])) {
        $total_harga = ($harga * $jumlah_produk) + $tambahan; // Menghitung total harga dengan tambahan
    }


    // Menghitung kembalian jika tombol hitung kembalian ditekan
    if (isset($_POST['hitung_kembalian'])) {
        $kembalian = $pembayaran - $total_harga;
    }

    // Menampilkan pesan sukses dan mengarahkan ke halaman beranda jika transaksi disimpan
    if (isset($_POST['simpan'])) {
        echo "<script>
                alert('Transaksi berhasil disimpan!');
                window.location.href = 'beranda.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Transaksi Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar bg-dark navbar-dark shadow">
        <div class="container-fluid">
            <div class="d-flex">
                <a class="nav-link text-light mx-2 fs-6 py-1 px-2" href="beranda.php">Home</a>
                <a class="nav-link text-light mx-2 fs-6 py-1 px-2" href="transaksi.php">Transaksi</a>
            </div>
            <a class="nav-link text-light mx-2 fs-6 py-1 px-2" href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center fw-bold">Transaksi</h2>
                        <form method="POST">
                            <!-- Input Nomor Transaksi -->
                            <div class="mb-3">
                                <label class="form-label">No. Transaksi</label>
                                <input type="number" class="form-control" name="no_transaksi" value="<?= $no_transaksi; ?>" required>
                            </div>
                            <!-- Input Tanggal Transaksi -->
                            <div class="mb-3">
                                <label class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" name="tanggal" value="<?= $tanggal; ?>" required>
                            </div>
                            <!-- Input Nama Customer -->
                            <div class="mb-3">
                                <label class="form-label">Nama Customer</label>
                                <input type="text" class="form-control" name="nama" value="<?= $nama_cus; ?>" required>
                            </div>
                            <!-- Menampilkan Nama Produk yang Dipilih -->
                            <div class="mb-3">
                                <label class="form-label">Pilih Produk</label>
                                <input type="text" class="form-control" name="paket" value="<?= $iphonelist[$id][0]; ?>" readonly>
                            </div>
                            <!-- Menampilkan Harga Produk -->
                            <div class="mb-3">
                                <label class="form-label">Harga Produk</label>
                                <input type="number" class="form-control" name="harga" value="<?= $iphonelist[$id][2]; ?>" readonly>
                            </div>
                            <!-- Tambah Paket -->
                            <div class="mb-3">
                                <label class="form-label">Tambahan</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tambahan" value="500000" <?= $tambahan == 500000 ? 'checked' : "" ?>></input>
                                    <label class="form-check-label">
                                        Charger - 500.000
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tambahan" value="750000" <?= $tambahan == 750000 ? 'checked' : "" ?>></input>
                                    <label class="form-check-label">
                                        Ipad - 750.000
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tambahan" value="300000" <?= $tambahan == 300000 ? 'checked' : "" ?>></input>
                                    <label class="form-check-label">
                                        Case - 300.000
                                    </label>
                                </div>
                                <!-- Input Jumlah Produk -->
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Produk</label>
                                    <input type="number" class="form-control" name="jumlah_produk" value="<?= $jumlah_produk; ?>" min="1" required>
                                </div>
                                <!-- Tombol Hitung Total Harga -->
                                <button type="submit" class="btn btn-dark mb-3" name="hitung">Hitung Total Harga</button>
                                <!-- Menampilkan Total Harga -->
                                <div class="mb-3">
                                    <label class="form-label">Total Harga</label>
                                    <input type="number" class="form-control" name="total_harga" value="<?= $total_harga; ?>" readonly>
                                </div>
                                <!-- Input Pembayaran -->
                                <div class="mb-3">
                                    <label class="form-label">Pembayaran</label>
                                    <input type="number" class="form-control" name="pembayaran" value="<?= $pembayaran; ?>">
                                </div>
                                <!-- Tombol Hitung Kembalian -->
                                <button type="submit" class="btn btn-dark" name="hitung_kembalian">Hitung Kembalian</button>
                                <!-- Menampilkan Kembalian -->
                                <div class="mb-3">
                                    <label class="form-label">Kembalian</label>
                                    <input type="number" class="form-control" name="kembalian" value="<?= $kembalian; ?>" readonly>
                                </div>
                                <!-- Tombol Simpan Transaksi -->
                                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>