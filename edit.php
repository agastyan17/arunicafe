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


    <?php
    $id = $_GET['id']; //ambil id dari URL
    $query = "SELECT * FROM tb_orders WHERE id_orders= '$id'";
    // panggil data
    $data = mysqli_query($koneksi, $query);
    $orders = mysqli_fetch_array($data);
    $type = $orders['type'];
    ?>

    <main>
        <div id="order" class="p-3 mx-auto align-self-center">
            <div class="wrapper text-center d-flex my-auto flex-column align-items-center shadow p-4">
                <img src="assets/imgs/<?php echo $orders['image'] ?>" alt="">
                <h1 class="title fw-bold"><?php echo $orders['item'] ?></h1>
                <p class="custom fw-bold">Customize</p>
                <div class="line"></div>
                <form action="" method="post">
                    <table class="text-start m-3">
                        <?php
                        if ($type == 'coffee') {
                            echo '
        <tr>
          <td class="fw-bold"><label class="px-3" for="size">Size:</label></td>
          <td class="fw-bold">
            <select name="size" id="size">
              <option value="Short"' . ($orders['size'] == 'Short' ? "selected" : "") . '>Short (8 fl oz)</option>
              <option value="Tall"' . ($orders['size'] == 'Tall' ? "selected" : "") . '>Tall (12 fl oz)</option>
              <option value="Grande"' . ($orders['size'] == 'Grande' ? "selected" : "") . '>Grande (16 fl oz)</option>
              <option value="Venti"' . ($orders['size'] == 'Venti' ? "selected" : "") . '>Venti (24 fl oz)</option>
              <option value="Trenta"' . ($orders['size'] == 'Trenta' ? "selected" : "") . '>Trenta (30 fl oz)</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="fw-bold"><label class="px-3" for="addins">Add-ins:</label></td>
          <td class="fw-bold">
            <select name="addins" id="addins">
              <option value="Extra Ice"' . ($orders['addins'] == 'Extra Ice' ? "selected" : "") . '>Extra Ice</option>
              <option value="Light Ice"' . ($orders['addins'] == 'Light Ice' ? "selected" : "") . '>Light Ice</option>
              <option value="No Ice"' . ($orders['addins'] == 'No Ice' ? "selected" : "") . '>No Ice</option>
              <option value="Ice"' . ($orders['addins'] == 'Ice' ? "selected" : "") . '>Ice</option>
              <option value="Hot"' . ($orders['addins'] == 'Hot' ? "selected" : "") . '>Hot</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="fw-bold"><label class="px-3" for="toppings">Toppings:</label></td>
          <td class="fw-bold">
            <select name="toppings" id="toppings">
              <option value="Extra Cold Foam"' . ($orders['toppings'] == 'Extra Ice' ? "selected" : "") . '>Extra Cold Foam</option>
              <option value="Light Cold Foam"' . ($orders['toppings'] == 'Extra Ice' ? "selected" : "") . '>Light Cold Foam</option>
              <option value="No Cold Foam"' . ($orders['toppings'] == 'Extra Ice' ? "selected" : "") . '>No Cold Foam</option>
              <option value="Cold Foam"' . ($orders['toppings'] == 'Extra Ice' ? "selected" : "") . '>Cold Foam</option>
            </select>
          </td>
        </tr>
      ';
                        } elseif ($type == 'dessert') {
                            echo '
        <tr>
          <td class="fw-bold"><label class="px-3" for="warm">Warming</label></td>
          <td class="fw-bold">
            <select name="warm" id="warm">
              <option value="Warmed"' . ($orders['warm'] == 'Warmed' ? "selected" : "") . '>Warmed</option>
              <option value="Not Warmed"' . ($orders['warm'] == 'Not Warmed' ? "selected" : "") . '>Not Warmed</option>
            </select>
          </td>
        </tr>
        ';
                        } elseif ($type == 'beverage') {
                            echo '
        <tr>
          <td class="fw-bold"><label class="px-3" for="size">Size:</label></td>
          <td class="fw-bold">
            <select name="size" id="size">
              <option value="Tall"' . ($orders['size'] == 'Tall' ? "selected" : "") . '>Tall (12 fl oz)</option>
              <option value="Grande"' . ($orders['size'] == 'Grande' ? "selected" : "") . '>Grande (16 fl oz)</option>
              <option value="Venti"' . ($orders['size'] == 'Venti' ? "selected" : "") . '>Venti (24 fl oz)</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="fw-bold"><label class="px-3" for="milk">Milk:</label></td>
          <td class="fw-bold">
            <select name="milk" id="milk">
              <option value="Whole Milk"' . ($orders['milk'] == 'Whole Milk' ? "selected" : "") . '>Whole Milk</option>
              <option value="Nonfat Milk"' . ($orders['milk'] == 'Nonfat Milk' ? "selected" : "") . '>Nonfat Milk</option>
              <option value="Vanilla Sweet Cream"' . ($orders['milk'] == 'Vanilla Sweet Cream' ? "selected" : "") . '>Vanilla Sweet Cream</option>
              <option value="Almond"' . ($orders['milk'] == 'Almond' ? "selected" : "") . '>Almond</option>
              <option value="Oatmilk"' . ($orders['milk'] == 'Oatmilk' ? "selected" : "") . '>Oatmilk</option>
              <option value="Coconut"' . ($orders['milk'] == 'Coconut' ? "selected" : "") . '>Coconut</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="fw-bold"><label class="px-3" for="toppings">Toppings:</label></td>
          <td class="fw-bold">
            <select name="toppings" id="toppings">
              <option value="Extra Whipped Cream"' . ($orders['toppings'] == 'Extra Whipped Cream' ? "selected" : "") . '>Extra Whipped Cream</option>
              <option value="Light Whipped Cream"' . ($orders['toppings'] == 'Light Whipped Cream' ? "selected" : "") . '>Light Whipped Cream</option>
              <option value="No Whipped Cream"' . ($orders['toppings'] == 'No Whipped Cream' ? "selected" : "") . '>No Whipped Cream</option>
              <option value="Whipped Cream"' . ($orders['toppings'] == 'Whipped Cream' ? "selected" : "") . '>Whipped Cream</option>
            </select>
          </td>
        </tr>
      ';
                        }
                        ?>
                    </table>
                    <div class="qty my-2">
                        <span class="fw-bold decrease">-</span>
                        <input type="text" inputmode="numeric" value="<?php echo $orders['qty'] ?>" id="qty" name="qty" class="text-center fw-bold" readonly>
                        <span class="fw-bold increase">+</span>
                    </div>
                    <input type="text" value="<?php echo $orders['total'] ?>" class="text-center fw-bold mb-2" id="price" name="price" disabled>
                    <input type="hidden" id="total" name="total">
                    <button class="pri-btn mb-3" type="submit" name="order">add to order</button>
                </form>
            </div>
        </div>
    </main>


    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        var price = <?php echo $orders['price']; ?>;
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
    $item = $orders['item'];
    $price = $orders['price'];
    $type = $orders['type'];
    $image = $orders['image'];
    $qty = $_POST['qty'];
    $total = $_POST['total'] == '' ? $price : $_POST['total'];
    $size = '';
    $addins = '';
    $toppings = '';
    $milk = '';
    $warm = '';

    if ($type == 'coffee') {
        $size = $_POST['size'];
        $addins = $_POST['addins'];
        $toppings = $_POST['toppings'];
        $details = $size . ', ' . $addins . ', ' . $toppings;
    } elseif ($type == 'dessert') {
        $warm = $_POST['warm'];
        $details = $warm;
    } elseif ($type == 'beverage') {
        $size = $_POST['size'];
        $milk = $_POST['milk'];
        $toppings = $_POST['toppings'];
        $details = $size . ', ' . $milk . ', ' . $toppings;
    }

    //update data ke database
    $query = "UPDATE tb_orders SET 
    qty = '$qty', 
    total = '$total', 
    details = '$details', 
    size = '$size', 
    addins = '$addins', 
    toppings = '$toppings', 
    milk = '$milk', 
    warm = '$warm'
    WHERE id_orders = '$id'";
    $result = mysqli_query($koneksi, $query);

    //cek apabila data berhasil dimasukan ke database
    if (!$result) {
        echo "<br>Order failed. Error : " . mysqli_error($koneksi);
    }
    //tampilkan alert dan redirect ke halaman daftar-barang. php
    echo "<script>
    alert('Order uploaded!')
    window.location.href='orders.php' </script>";

    mysqli_close($koneksi);
}
?>