<?php
define('HARGA_PER_TIKET', 50000);

$film_tersedia = [
    'Agak Laen',
    'Godzilla x Kong: The New Empire',
    'Dilan 1990',
    'Badarawuhi di Desa Penari',
    'Kingdom of the Planet of the Apes'
];

$host = getenv('DB_HOST');
$db_name = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');
$port = getenv('DB_PORT');

$koneksi = mysqli_connect($host, $username, $password, $db_name, $port);
if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>