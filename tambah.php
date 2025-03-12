<?php require "header.php"?>
<div id="layoutSidenav_content">
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Update </h1><br>
                        
                        <form method="POST" action="tambah.php">                          
                        <div class="form-floating mb-3">
                                                <input class="form-control" id="nama_barang" name="nama_barang" placeholder="name@example.com" required />
                                                <label for="inputEmail">Nama barang</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control"  id="deskripsi" name="deskripsi" required placeholder="name@example.com" />
                                                <label for="inputEmail">deskripsi</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="stok" name="stok" required placeholder="name@example.com" />
                                                <label for="inputEmail">stok</label>
                                            </div>
                                            
                                            
                                            <div class="mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary w-100">Register</button>
                                            </div>
                        </form>
                        
                        
                    </div>
                </main>             
             
                                
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db_config.php'; // Pastikan file db_config.php tersedia
    
    $name = $_POST['nama_barang'] ?? '';
    $email = $_POST['deskripsi'] ?? '';
    $phone = $_POST['stok'] ?? '';
   
    
    if ($name && $email && $phone) {
        try {
            $db = DBConfig::connect('ima'); // Koneksi ke MongoDB
            $collection = $db->selectCollection('stok'); // Pilih koleksi "users"
            // $collection = getDatabase()->selectCollection("data_ima");
            $result = $collection->insertOne([
                'nama_barang' => $name,
                'deskripsi' => $email,
                'stok' => $phone,
                
            ]);
            
            if ($result->getInsertedCount() > 0) {
                echo '<script>alert("barang sudah ditambah"); window.location.href="index.php";</script>';
                
                exit;
            } else {
                echo '<script>alert("gagal input");</script>';
            }
        } catch (Exception $e) {
            echo '<div class="alert alert-danger mt-3">Terjadi kesalahan: ' . $e->getMessage() . '</div>';
        }
    } else {
        echo '<script>alert("belum di isi semua");</script>';
    }
}
?>



<?php require "footer.php"?>