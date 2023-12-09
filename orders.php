<?php
require_once('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arunicafe</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/orders.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-light bg-light p-5 custom-navbar">
      <a class="navbar-brand order-0 fw-bold" href="landing.html">arunicafe</a>

      <div class="navbar-nav row ms-auto order-sm-3">
        <a class="nav-item nav-link">
          <div>
            <a href="orders.php"><img class="px-2" src="assets/icons/bytesize_bag.svg" alt=""></a>
            <a href="signin.html"><img class="px-2" src="assets/icons/prime_user.svg" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </a>
      </div>

      <div class="navbar-collapse collapse justify-content-sm-center order-sm-2" id="navbarNav" style>
        <ul class="navbar-nav">
          <li class="nav-item mx-1 mx-md-4">
            <a class="nav-link custom-navlink" href="menu-beverage.php">Menu</span></a>
          </li>
          <li class="nav-item mx-1 mx-md-4">
            <a class="nav-link custom-navlink" href="#about">About</a>
          </li>
          <li class="nav-item mx-1 mx-md-4">
            <a class="nav-link custom-navlink" href="#contact">Contact</a>
          </li>
        </ul>
      </div>

    </nav>
  </header>

  <main>
    <div class="container text-center m-auto">
      <h1 class="text-center fw-bold">Your Orders</h1>
      <form action="" method="post">
        <div class="tbl">
          <table class="my-5 text-start table table-hover">
            <tr>
              <th></th>
              <th>Item</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Total</th>
              <th>Details</th>
              <th></th>
            </tr>
            <?php
            $query = "SELECT * FROM tb_orders";
            // panggil data
            $data = mysqli_query($koneksi, $query);
            $no = 1;
            $totalSum = 0;

            while ($order = mysqli_fetch_assoc($data)) :
              $totalSum += $order['total'];
            ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $order['item']; ?></td>
                <td><?php echo $order['price']; ?></td>
                <td><?php echo $order['qty']; ?></td>
                <td><?php echo $order['total']; ?></td>
                <td><?php echo $order['details']; ?></td>
                <td>
                  <div class="d-flex flex-column flex-lg-row">
                    <a href="edit.php?id=<?php echo $order['id_orders']; ?>"><img class="me-2 mb-4 mb-lg-0" src="assets/imgs/edit.svg" alt=""></a>
                    <a href="delete.php?id=<?php echo $order['id_orders']; ?>" onclick="return confirm('Delete order?')"><img src="assets/imgs/delete.svg" alt=""></a>
                  </div>
                </td>
              </tr>
            <?php
            endwhile;
            ?>
          </table>
        </div>

        <div class="pay text-center col-6 col-md-4 col-lg-3 col-xl-2 mx-auto">
            <h5 class="fw-bold mt-2">Total:</h5>
            <h3 class="fw-bold"><?php echo isset($totalSum) ? number_format($totalSum, 3, '.', '.') : '0'; ?><h3>
            <button class="pri-btn mt-3" type="submit" name="checkout">check out</button>
        </div>
      </form>
    </div>
  </main>


  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<!--  -->

<?php
if (isset($_POST['checkout'])) {
  // Assuming $data is the result set from your query
  mysqli_data_seek($data, 0); // Reset the data pointer to the beginning

  while ($order = mysqli_fetch_assoc($data)) {
    $id = $order['id_orders'];
    $item = $order['item'];
    $price = $order['price'];
    $qty = $order['qty'];
    $total = $order['total'];
    $details = $order['details'];
    $query = "INSERT INTO tb_history (id_orders, items, price, qty, total, details) VALUES ('$id', '$item', '$price', '$qty', '$total', '$details');";

    if (mysqli_query($koneksi, $query)) {
      // Insert successful, now delete from tb_orders
      $delete = "DELETE FROM tb_orders WHERE id_orders = '$id'";

      if (!mysqli_query($koneksi, $delete)) {
        echo "Error deleting order: " . mysqli_error($koneksi);
      }
    } else {
      echo "Error inserting into history: " . mysqli_error($koneksi);
    }
  }
}

// Close the database connection
mysqli_close($koneksi);
?>