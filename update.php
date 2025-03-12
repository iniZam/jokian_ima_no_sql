<?php require "header.php";

$id = $_GET['id'];
require 'vendor/autoload.php'; // Pastikan driver MongoDB sudah terinstal

// Koneksi ke MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->ima; // Ganti 'web' dengan nama database Anda
$collection = $db->stok; // Ganti 'users' dengan nama koleksi Anda

if (isset($_GET['id'])) {
    $id = new MongoDB\BSON\ObjectId($_GET['id']); // Konversi id ke ObjectId MongoDB
    $user = $collection->findOne(['_id' => $id]);

    if ($user) {
?>
<div id="layoutSidenav_content">
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Update </h1><br>
                        
                        <form method="POST" action="update1.php">                          
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kode Barang </label>
                            <div class="col-sm-8">
                              <input type="text" readonly class="form-control-plaintext" name="id" id="id" value="<?php echo $id; ?>" >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Barang </label>
                            <div class="col-sm-8">
                              <input type="text" readonly class="form-control-plaintext" name ="nama_barang" id="nama_barang" value="<?= htmlspecialchars($user['nama_barang']) ?>" >
                            </div>
                          </div>
                          
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jenis transaksi</label>
                            <div class="col-sm-8">
                                <!--  -->
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="pilihan" id="keluar" value="keluar">
                              <label class="form-check-label" for="flexRadioDefault1">
                               Barang keluar
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="pilihan" id="masuk" value="masuk" checked>
                              <label class="form-check-label" for="flexRadioDefault2">
                                Barang masuk
                              </label>
                            </div>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">keterangan </label>
                            <div class="col-sm-8">
                            
                            </div><br>
                          </div>

                          <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">stok</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="stok" name="stok" value="">
                            </div>
                            <div class="col-sm-2">                                 
                                <input class="form-control" type="text" id="stok1" name="stok1" value="<?= htmlspecialchars($user['stok']) ?>" aria-label="Disabled input example" disabled readonly>                  
                                <button class="btn btn-primary"name="simpan" type="submit">simpan</button></div>
                          </div>
                        </form>
                        
                        
                    </div>
                </main>             
             
                                
<?php  } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>



<?php require "footer.php"?>