<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mata Kuliah</title>
</head>
<body>
    <h2>Tambah Mata Kuliah Baru</h2>
    <a href="index.php">Kembali</a>
    <br/><br/>
    <form action="tambah.php" method="post">
        Kode MK: <input type="text" name="kode_mk" required><br/><br/>
        Nama MK: <input type="text" name="nama_mk" required><br/><br/>
        SKS: <input type="number" name="sks" required><br/><br/>
        <input type="submit" name="submit" value="Simpan">
    </form>

    <?php
    if(isset($_POST['submit'])) {
        include 'koneksi.php';
        $kode_mk = $_POST['kode_mk'];
        $nama_mk = $_POST['nama_mk'];
        $sks = $_POST['sks'];

        $query = "INSERT INTO matakuliah (kode_mk, nama_mk, sks) VALUES ('$kode_mk', '$nama_mk', '$sks')";
        mysqli_query($koneksi, $query);
        header("location:index.php");
    }
    ?>
</body>
</html>