<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM pemesanan ORDER BY jadwal_tayang DESC");
?>
<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Bioskop Gian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
</head>
<body>
    <main class="container">
        <h1 style="text-align: center;">🎟️ Pemesanan Tiket Bioskop Gian</h1>
        
        <article>
            <h3 style="text-align: center;">Daftar Pesanan</h3>
            <div class="overflow-auto">
                <table role="grid">
                    <thead>
                        <tr>
                            <th>Pelanggan</th>
                            <th>Film</th>
                            <th>Jadwal</th>
                            <th>Kursi</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($pesanan = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?= htmlspecialchars($pesanan['nama_pelanggan']) ?></td>
                            <td><?= htmlspecialchars($pesanan['judul_film']) ?></td>
                            <td><?= date('d M Y, H:i', strtotime($pesanan['jadwal_tayang'])) ?></td>
                            <td><?= htmlspecialchars($pesanan['nomor_kursi']) ?></td>
                            <td>Rp <?= number_format($pesanan['total_harga'], 0, ',', '.') ?></td>
                            <td>
                                <span style="background-color: <?= $pesanan['status_pembayaran'] == 'Lunas' ? 'var(--pico-color-green-550)' : 'var(--pico-color-red-550)' ?>; color: white; padding: 2px 8px; border-radius: var(--pico-border-radius); font-size: 0.8em;">
                                    <?= $pesanan['status_pembayaran'] ?>
                                </span>
                            </td>
                            <td>
                                <a href="edit.php?id=<?= $pesanan['id'] ?>" style="text-decoration: none;" title="Edit">✏️</a> |
                                <a href="hapus.php?id=<?= $pesanan['id'] ?>" onclick="return confirm('Yakin ingin membatalkan pesanan ini?')" style="text-decoration: none;" title="Hapus">❌</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </article>

        <hr>

        <article>
            <h3 style="text-align: center;">🎬 Pesan Tiket Baru</h3>
            <form action="tambah.php" method="POST">
                <label for="nama_pelanggan">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="John Doe" required>
                
                <label for="judul_film">Pilih Film</label>
                <select name="judul_film" id="judul_film" required>
                    <?php foreach ($film_tersedia as $film): ?>
                        <option value="<?= $film ?>"><?= $film ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="grid">
                    <div>
                        <label for="jumlah_tiket">Jumlah Tiket</label>
                        <input type="number" name="jumlah_tiket" id="jumlah_tiket" min="1" value="1" required>
                    </div>
                    <div>
                        <label for="nomor_kursi">Nomor Kursi</label>
                        <input type="text" name="nomor_kursi" id="nomor_kursi" placeholder="Contoh: C5, C6" required>
                    </div>
                </div>

                <label for="jadwal_tayang">Jadwal Tayang</label>
                <input type="datetime-local" name="jadwal_tayang" id="jadwal_tayang" required>
                
                <button type="submit">Pesan Tiket</button>
            </form>
        </article>
    </main>
</body>
</html>