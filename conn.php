<?php

$servername = "localhost";
$database = "db_arunicafe";
$username = "root";
$password = "";

// membuat koneksi ke database

$koneksi = mysqli_connect($servername, $username, $password, $database);

// cek kondisi
if (!$koneksi) {
  // apabila gagal akan ditampilkan kesalahan error
  die("Koneksi Gagal: " . mysqli_connect_error());
}
// apabila berhasil akan ditampilkan koneksi berhasil
echo "<script>`Koneksi berhasil`</script>";

?>