<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Kuliah</title>
</head>
<body>
    <h2>Edit Mata Kuliah</h2>
    <a href="index.php">Kembali</a>
    <br/><br/>
    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM mata_kuliah WHERE id='$id'");
    while($data = mysqli_fetch_array($query)){
    ?>
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        Kode MK: <input type="text" name="kode_mk" value="<?php echo $data['kode_mk']; ?>" required><br/><br/>
        Nama MK: <input type="text" name="nama_mk" value="<?php echo $data['nama_mk']; ?>" required><br/><br/>
        SKS: <input type="number" name="sks" value="<?php echo $data['sks']; ?>" required><br/><br/>
        <input type="submit" name="update" value="Update">
    </form>
    <?php } ?>

    <?php
    if(isset($_POST['update'])) {
        $kode_mk = $_POST['kode_mk'];
        $nama_mk = $_POST['nama_mk'];
        $sks = $_POST['sks'];

        $query = "UPDATE mata_kuliah SET kode_mk='$kode_mk', nama_mk='$nama_mk', sks='$sks' WHERE id='$id'";
        mysqli_query($koneksi, $query);
        header("location:index.php");
    }
    ?>
</body>
</html>