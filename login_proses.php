<?php

// Mendeklarasikan variabel untuk username dan password default
$defaultusername = "userlsp";  // Username default yang benar
$defaultpassword = "smkisfibjm"; // Password default yang benar

// Proses login ketika tombol login ditekan
if (isset($_POST['login'])) { // Mengecek apakah form login sudah disubmit (tombol login ditekan)

    // Mengambil nilai dari input username yang dimasukkan oleh pengguna
    $username = $_POST['username'];  // Input username yang dimasukkan pengguna

    // Mengambil nilai dari input password yang dimasukkan oleh pengguna
    $password = $_POST['password'];  // Input password yang dimasukkan pengguna

    /**
     * Mengecek apakah username dan password yang dimasukkan oleh pengguna sama
     * dengan username dan password default yang sudah ditentukan.
     */
    if ($username === $defaultusername && $password === $defaultpassword) {
        // Jika username dan password yang dimasukkan sesuai dengan nilai default
        // maka lakukan redirect ke halaman beranda.php setelah 1 detik

        echo "<meta http-equiv='refresh' content='1;url=beranda.php'>";
        // 'http-equiv' adalah atribut untuk memberi perintah kepada browser untuk melakukan refresh.
        // 'content="1;url=beranda.php"' berarti melakukan refresh dalam waktu 1 detik dan mengarahkannya ke beranda.php.

    } else {
        // Jika username atau password salah (tidak sesuai dengan default)
        // tampilkan alert dan redirect kembali ke halaman login (index.php)

        echo "<script>alert('Username atau password salah!')</script>";
        // 'alert()' adalah fungsi JavaScript untuk menampilkan kotak pesan ke pengguna.
        // Dalam hal ini, memberitahukan pengguna bahwa username atau password yang dimasukkan salah.

        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        // Melakukan redirect kembali ke halaman login (index.php) setelah 1 detik.
        // Jadi, jika login gagal, pengguna akan diarahkan kembali ke halaman login.
    }
}
