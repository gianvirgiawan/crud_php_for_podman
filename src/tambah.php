<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'koneksi.php';

    $nama_pelanggan = mysqli_real_escape_string($koneksi, $_POST['nama_pelanggan']);
    $judul_film = mysqli_real_escape_string($koneksi, $_POST['judul_film']);
    $jumlah_tiket = (int)$_POST['jumlah_tiket'];
    $jadwal_tayang = mysqli_real_escape_string($koneksi, $_POST['jadwal_tayang']);
    $nomor_kursi = mysqli_real_escape_string($koneksi, $_POST['nomor_kursi']);
    $total_harga = $jumlah_tiket * HARGA_PER_TIKET;
    $status_pembayaran = 'Belum Bayar';
    
    $query = "INSERT INTO pemesanan (nama_pelanggan, judul_film, jumlah_tiket, jadwal_tayang, nomor_kursi, total_harga, status_pembayaran) 
              VALUES ('$nama_pelanggan', '$judul_film', $jumlah_tiket, '$jadwal_tayang', '$nomor_kursi', $total_harga, '$status_pembayaran')";

    mysqli_query($koneksi, $query);
}
header('Location: index.php');
exit;
?>