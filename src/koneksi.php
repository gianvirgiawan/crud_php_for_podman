<?php
// Mengambil konfigurasi dari environment variables yang diatur di compose.yml
$host = getenv('DB_HOST');
$db_name = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');
$port = getenv('DB_PORT');

// Menggunakan ekstensi mysqli sesuai ketentuan soal 
$koneksi = mysqli_connect($host, $username, $password, $db_name, $port);

if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>