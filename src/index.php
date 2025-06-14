<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pengelolaan Mata Kuliah</title>
</head>
<body>
    <h2>Daftar Mata Kuliah</h2>
    <a href="tambah.php">Tambah Mata Kuliah Baru</a>
    <br/><br/>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';
        // Menampilkan seluruh data dari tabel 
        $query = mysqli_query($koneksi, "SELECT * FROM matakuliah ORDER BY id DESC");
        while($data = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['kode_mk']; ?></td>
                <td><?php echo $data['nama_mk']; ?></td>
                <td><?php echo $data['sks']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>">EDIT</a> |
                    <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">HAPUS</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>