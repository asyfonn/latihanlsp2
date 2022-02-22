<?php
$host = "localhost";
$username = "root";
$password ="";
$database = "db_barang";

$kon = mysqli_connect ($host, $username, $password, $database);
if(!$kon){
    die("Koneksi Gagal:".mysqli_connect_error());
}
?>