<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;
if ($id) {
    mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id=$id");
}

header('Location: index.php');
exit;
?>