<?php
// db_config.php: Konfigurasi Koneksi Database
require 'vendor/autoload.php'; // Pastikan Composer diinstall

class DBConfig {
    public static function connect($dbType) {
        
                $client = new MongoDB\Client("mongodb://localhost:27017");
                return $client->selectDatabase('ima');

            
        
    }
}
