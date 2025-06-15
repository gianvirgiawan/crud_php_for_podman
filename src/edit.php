<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['update'])) {
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];

    $query_update = "UPDATE mata_kuliah SET kode_mk='$kode_mk', nama_mk='$nama_mk', sks='$sks' WHERE id='$id'";
    mysqli_query($koneksi, $query_update);

    header("location:index.php");
    exit;
}

$query_select = mysqli_query($koneksi, "SELECT * FROM mata_kuliah WHERE id='$id'");
$data = mysqli_fetch_array($query_select);

if (!$data) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Kuliah</title>
</head>
<body>
    <h2>Edit Mata Kuliah</h2>
    <a href="index.php">Kembali</a>
    <br/><br/>
    
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        Kode MK: <input type="text" name="kode_mk" value="<?php echo htmlspecialchars($data['kode_mk']); ?>" required><br/><br/>
        Nama MK: <input type="text" name="nama_mk" value="<?php echo htmlspecialchars($data['nama_mk']); ?>" required><br/><br/>
        SKS: <input type="number" name="sks" value="<?php echo htmlspecialchars($data['sks']); ?>" required><br/><br/>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>