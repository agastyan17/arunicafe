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
    <div class="container text-center d-flex my-auto flex-column align-items-center">
      <h1 class="text-center fw-bold">Your Orders</h1>
      <div class="tbl">
        <table class="my-5 text-start table table-hover">
          <tr>
            <th></th>
            <th>Items</th>
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

          while ($order = mysqli_fetch_assoc($data)) :
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $order['item']; ?></td>
              <td><?php echo $order['price']; ?></td>
              <td><?php echo $order['qty']; ?></td>
              <td><?php echo $order['total']; ?></td>
              <td><?php echo $order['details']; ?></td>
              <td>
                <div>
                  <a href="edit.php?id=<?php echo $order['id_orders']; ?>"><img src="assets/imgs/edit.svg" alt=""></a>
                  <a href="delete.php?id=<?php echo $order['id_orders']; ?>" onclick="return confirm('Delete order?')"><img src="assets/imgs/delete.svg" alt=""></a>
                </div>
              </td>
            </tr>
          <?php
          endwhile;
          ?>
        </table>
      </div>

      <div class="pay d-flex flex-column align-items-center text-start">
        <table class="mb-2">
          <tr>
            <td class="px-2">Total:</td>
            <td class="px-2">10000</td>
          </tr>
          <tr>
            <td class="px-2">Discount:</td>
            <td class="px-2">10000</td>
          </tr>
        </table>
        <h3 class="fw-bold">300.000</h3>
        <button class="pri-btn">check out</button>
      </div>
    </div>
  </main>


  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>