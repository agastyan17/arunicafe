<?php
require_once('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arunicafe Menu</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/menu.css">
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
                        <a class="nav-link custom-navlink active" href="menu-beverage.php">Menu</span></a>
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

    <main>
        <div class="container my-5" id="menu">-
            <div class="heading text-center col-12 col-xl-5 mx-auto">
                <h1>AruniCafe <span>Menu</span></h1>
                <p>Check out our mood level-up items! Coffees, beverages even desserts prepared just for you hwahwhah</p>
            </div>
            <div class="menu-list mt-5">
                <ul class="justify-content-center">
                    <li class="active"><a class="nav-link fw-bold" href="menu-coffee.php">Coffees</a></li>
                    <li><a class="nav-link fw-bold" href="menu-beverage.php">Beverages</a></li>
                    <li><a class="nav-link fw-bold" href="menu-dessert.php">Desserts</a></li>
                </ul>
            </div>

            <div class="menu-items row mt-5 justify-content-center">
                <?php
                $query = "SELECT * FROM tb_menu WHERE type='coffee'";
                // panggil data
                $data = mysqli_query($koneksi, $query);

                while ($menu = mysqli_fetch_assoc($data)) :
                ?>
                    <div class="menu my-4 justify-content-between d-flex flex-column col-6 col-md-3 text-center">
                        <img class="mx-auto" src="assets/imgs/<?php echo $menu['image'] ?>" alt="">
                        <div>
                            <p class="fw-bold"><?php echo $menu['item'] ?></p>
                            <p class="price">IDR <?php echo $menu['price'] ?></p>
                            <a href="order.php?id_menu=<?php echo $menu['id_menu']; ?>" class="sec-btn">order</a>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </main>


    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>