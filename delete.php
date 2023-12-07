<?php
require_once('conn.php');
$id = $_GET['id'];
$query = "DELETE FROM tb_orders WHERE id_orders = $id";
$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  echo "Try again. Error : " . mysqli_error($koneksi);
}

echo "<script>
    alert('Order deleted!')
    window.location.href='orders.php' </script>";

mysqli_close($koneksi);
