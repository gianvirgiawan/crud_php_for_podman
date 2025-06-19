<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) { header('Location: index.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_update = (int)$_POST['id'];
    $nama_pelanggan = mysqli_real_escape_string($koneksi, $_POST['nama_pelanggan']);
    $judul_film = mysqli_real_escape_string($koneksi, $_POST['judul_film']);
    $jumlah_tiket = (int)$_POST['jumlah_tiket'];
    $jadwal_tayang = mysqli_real_escape_string($koneksi, $_POST['jadwal_tayang']);
    $nomor_kursi = mysqli_real_escape_string($koneksi, $_POST['nomor_kursi']);
    $status_pembayaran = mysqli_real_escape_string($koneksi, $_POST['status_pembayaran']);

    $total_harga = $jumlah_tiket * HARGA_PER_TIKET;

    $query = "UPDATE pemesanan SET nama_pelanggan='$nama_pelanggan', judul_film='$judul_film', jumlah_tiket=$jumlah_tiket, jadwal_tayang='$jadwal_tayang', nomor_kursi='$nomor_kursi', total_harga=$total_harga, status_pembayaran='$status_pembayaran' WHERE id=$id_update";
    mysqli_query($koneksi, $query);
    
    header('Location: index.php');
    exit;
}

$query_select = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id=$id");
$pesanan = mysqli_fetch_assoc($query_select);
if (!$pesanan) { header('Location: index.php'); exit; }
?>
<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan Tiket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
</head>
<body>
    <main class="container">
        <a href="index.php">← Kembali ke Daftar Pesanan</a>
        <h2 style="text-align: center;">Edit Pesanan</h2>
        <form method="POST" action="edit.php?id=<?= $id ?>">
            <input type="hidden" name="id" value="<?= $pesanan['id'] ?>">

            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" value="<?= htmlspecialchars($pesanan['nama_pelanggan']) ?>" required>
            
            <label for="judul_film">Pilih Film</label>
            <select name="judul_film" id="judul_film" required>
                <?php foreach ($film_tersedia as $film): ?>
                    <option value="<?= $film ?>" <?= ($film == $pesanan['judul_film']) ? 'selected' : '' ?>><?= $film ?></option>
                <?php endforeach; ?>
            </select>

            <div class="grid">
                <div>
                    <label for="jumlah_tiket">Jumlah Tiket</label>
                    <input type="number" name="jumlah_tiket" id="jumlah_tiket" min="1" value="<?= $pesanan['jumlah_tiket'] ?>" required>
                </div>
                <div>
                    <label for="nomor_kursi">Nomor Kursi</label>
                    <input type="text" name="nomor_kursi" id="nomor_kursi" value="<?= htmlspecialchars($pesanan['nomor_kursi']) ?>" required>
                </div>
            </div>

            <label for="jadwal_tayang">Jadwal Tayang</label>
            <input type="datetime-local" name="jadwal_tayang" id="jadwal_tayang" value="<?= date('Y-m-d\TH:i', strtotime($pesanan['jadwal_tayang'])) ?>" required>
            
            <label for="status_pembayaran">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" required>
                <option value="Belum Bayar" <?= ($pesanan['status_pembayaran'] == 'Belum Bayar') ? 'selected' : '' ?>>Belum Bayar</option>
                <option value="Lunas" <?= ($pesanan['status_pembayaran'] == 'Lunas') ? 'selected' : '' ?>>Lunas</option>
            </select>

            <button type="submit">Update Pesanan</button>
        </form>
    </main>
</body>
</html>