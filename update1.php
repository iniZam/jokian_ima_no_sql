<?php
require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = new MongoDB\BSON\ObjectId($_POST['id']);
    $name = $_POST['nama_barang'] ?? '';
    $email = $_POST['deskripsi'] ?? '';
    $phone = $_POST['stok'] ?? 0;
    $stok = $_POST['stok1'] ?? 0;
    $pilihan = $_POST['pilihan'] ?? '';
   

    if($pilihan=='masuk'){
        $total=$stok+$phone;
        // buat query update
       
    }
    else if($pilihan=='keluar'){
        $total=$stok-$phone;
        if ($total < 0) {
            $total = 0;}
    }
    // Data baru yang akan diupdate
    $newData = [        
        'nama_barang' => $name,
        
        'stok' => $total
    ];

    try {
        // Koneksi ke MongoDB
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $db = $client->ima;
        $collection = $db->stok;

        // Update dokumen berdasarkan id
        $result = $collection->updateOne(
            ['_id' => $id], // Filter dokumen berdasarkan id
            ['$set' => $newData] // Data yang akan diupdate
        );

        if ($result->getModifiedCount() > 0) {
            echo "<script>alert('Data berhasil diupdate'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Tidak ada perubahan data'); window.location.href='index.php';</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Terjadi kesalahan: {$e->getMessage()}'); window.location.href='index.php';</script>";
    }
}
?>
