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
  <link rel="stylesheet" href="assets/css/order.css">
</head>

<body>
<header>
        <nav class="navbar navbar-expand-sm navbar-light bg-light p-5 custom-navbar">
            <a class="navbar-brand order-0 fw-bold" href="landing.html">arunicafe</a>
          
            <div class="navbar-nav row ms-auto order-sm-3">
              <a class="nav-item nav-link">
                <div>
                  <a href="orders.html"><img class="px-2" src="assets/icons/bytesize_bag.svg" alt=""></a>
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
                  <a class="nav-link custom-navlink" href="menu.php">Menu</span></a>
                </li>
                <li class="nav-item mx-1 mx-md-4">
                  <a class="nav-link custom-navlink" href="landing.html#about">About</a>
                </li>
                <li class="nav-item mx-1 mx-md-4">
                  <a class="nav-link custom-navlink" href="landing.html#contact">Contact</a>
                </li>
              </ul>
            </div>

        </nav>
    </header>


  <?php
  $id = $_GET['id_menu']; //ambil id dari URL
  $query = "SELECT * FROM tb_menu WHERE id_menu= '$id'";
  // panggil data
  $data = mysqli_query($koneksi, $query);
  $menu = mysqli_fetch_array($data);
  ?>

  <main>
    <div id="order" class="p-3 mx-auto align-self-center">
      <div class="wrapper text-center d-flex my-auto flex-column align-items-center shadow p-4">
        <img src="assets/imgs/<?php echo $menu['image'] ?>" alt="">
        <h1 class="title fw-bold"><?php echo $menu['item'] ?></h1>
        <p class="custom fw-bold">Customize</p>
        <div class="line"></div>
        <form action="" method="post">
          <table class="text-start m-3">
            <tr>
              <td class="fw-bold"><label class="px-3" for="size">Size:</label></td>
              <td class="fw-bold">
                <select name="size" id="size">
                  <option value="Tall">Tall (12 fl oz)</option>
                  <option value="Grande">Grande (16 fl oz)</option>
                  <option value="Venti">Venti (24 fl oz)</option>
                </select>
              </td>
            </tr>
            <tr>
              <td class="fw-bold"><label class="px-3" for="milk">Milk:</label></td>
              <td class="fw-bold">
                <select name="milk" id="milk">
                  <option value="Whole Milk">Whole Milk</option>
                  <option value="Nonfat Milk">Nonfat Milk</option>
                  <option value="Vanilla Sweet Cream">Vanilla Sweet Cream</option>
                  <option value="Almond">Almond</option>
                  <option value="Oatmilk">Oatmilk</option>
                  <option value="Coconut">Coconut</option>
                </select>
              </td>
            </tr>
            <tr>
              <td class="fw-bold"><label class="px-3" for="toppings">Toppings:</label></td>
              <td class="fw-bold">
                <select name="toppings" id="toppings">
                  <option value="Extra Whipped Cream">Extra Whipped Cream</option>
                  <option value="Light Whipped Cream">Light Whipped Cream</option>
                  <option value="No Whipped Cream">No Whipped Cream</option>
                  <option value="Whipped Cream">Whipped Cream</option>
                </select>
              </td>
            </tr>
          </table>
          <div class="qty my-2">
            <span class="fw-bold decrease">-</span>
            <input type="text" inputmode="numeric" value="1" id="qty" name="qty" class="text-center fw-bold" readonly>
            <span class="fw-bold increase">+</span>
          </div>
          <input type="text" value="<?php echo $menu['price'] ?>" class="text-center fw-bold mb-2" id="price" name="price" disabled>
          <input type="hidden" id="total" name="total">
          <button class="pri-btn mb-3"type="submit" name="order">add to order</button>
        </form>
      </div>
    </div>
  </main>


  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script>
    var price = <?php echo $menu['price']; ?>;
    var qty = 1;

    $(document).ready(function() {
      $('.qty').on('click', '.decrease', function() {
        updateQuantity(-1);
      });

      $('.qty').on('click', '.increase', function() {
        updateQuantity(1);
      });

      function updateQuantity(value) {
        var currentQty = parseInt($('#qty').val());
        var newQty = currentQty + value;

        if (newQty >= 1) {
          $('#qty').val(newQty);
          updatePrice(newQty);
        }
      }

      function updatePrice(qty) {
        var total = (qty * price).toFixed(3);
        $('#price').val(total);
        $('#total').val(total);
      }
    });
  </script>
</body>

</html>

<?php

// cek apabila tombol order di klik
if (isset($_POST['order'])) {
  // masukkan data form ke dalam variable
  $item = $menu['item'];
  $price = $menu['price'];
  $qty = $_POST['qty'];
  $total = $_POST['total'];
  $size = $_POST['size'];
  $milk = $_POST['milk'];
  $toppings = $_POST['toppings'];
  $details = $size . ', ' . $milk . ', ' . $toppings;

  //insert data ke database
  $query = "INSERT INTO tb_orders VALUES ('', '$item', '$price', '$qty', '$total', '', '$details')";
  $result = mysqli_query($koneksi, $query);

  if (!$result) {
    echo "<br>Order failed. Error : " . mysqli_error($koneksi);
  }

  echo "<script>
  alert('Order uploaded!');</script>";

}
?>