<?php include "header.php";?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Stok Barang</h1>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                
                                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="tambah.php">
                                      Tambah data
                                    </a>
                            
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Deskripsi</th>
                                                <th>Stok</th>
                                                <th>lainnya</th>
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php
                                        require 'vendor/autoload.php'; // Pastikan driver MongoDB sudah terinstal

                                        // Koneksi ke MongoDB
                                        $client = new MongoDB\Client("mongodb://localhost:27017");
                                        $db = $client->ima; // Ganti 'web' dengan nama database Anda
                                        $collection = $db->stok; // Ganti 'users' dengan nama koleksi Anda
                                        
                                        // Query untuk membaca semua data
                                        $users = $collection->find();
                                        
                                            $i=1;
                                            
                                                foreach ($users as $user) {
                                                    
                                                    echo "<tr>";
                                                    echo "<td>".$i."</td>";                                                    
                                                    echo "<td>" . $user['nama_barang'] . "</td>";
                                                    // echo "<td>" . $user['_id'] . "</td>";
                                                    echo "<td>" . $user['deskripsi'] . "</td>";
                                                    echo "<td>" . $user['stok'] . "</td>";
                                                    echo  "<td>"."<a class='btn btn-primary' href=update.php?id={$user['_id']}>Update</a> ";
                                                    echo "<a class='btn btn-primary' href=remove.php?id={$user['_id']} onclick='return confirmDelete()'>remove</a>";
                                                    echo "</td>";
                                                    echo "</tr>";$i+=1;
                                                }                                     
                                        ?>
                                        
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                
             

       <?php include 'footer.php';?>
