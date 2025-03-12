<?php
require 'vendor/autoload.php';

// Koneksi ke MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->ima;
$collection = $db->stok;

// Cek apakah parameter id ada
if (isset($_GET['id'])) {
    $id = new MongoDB\BSON\ObjectId($_GET['id']); // Konversi id ke ObjectId MongoDB

    // Hapus dokumen berdasarkan id
    $result = $collection->deleteOne(['_id' => $id]);

    if ($result->getDeletedCount() > 0) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php';</script>";
}
?>
