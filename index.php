<?php

require_once('vendor/autoload.php');
include("Php/conn.php");
session_start();

if (isset($_SESSION['message'])) {
    echo '<script src="JS/sweetalert2.all.min.js"></script>';
    echo "<script>document.addEventListener('DOMContentLoaded', function(e) {Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Here We Go Order',
    text: 'Ordered Successfully',
    color: 'green',
    background: '#fff',
    showConfirmButton: false,
    timer: 5500,
  })
})</script>";
    unset($_SESSION['message']);
}

include("Php/conn.php");

$pageNum = 12;

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

// $start_from = ($page - 1) * $pageNum;
// $sql = "SELECT * FROM national  ORDER BY id DESC LIMIT $start_from, $pageNum";
$nation = "SELECT * FROM national ORDER BY RAND() LIMIT 0, 4";
$nation_result = mysqli_query($conn, $nation);

$club = "SELECT * FROM clubs ORDER BY RAND() LIMIT 0, 4";
$club_result = mysqli_query($conn, $club);

$boot = "SELECT * FROM boots ORDER BY RAND() LIMIT 0, 4";
$boot_result = mysqli_query($conn, $boot);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Css/animate.min.css" />
    <link rel="stylesheet" href="Css/style.css" />
    <link rel="stylesheet" href="Css/modal.css" />
    <!-- Animated scrollbar link -->
    <link rel="stylesheet" href="Css/aos.css">
    <!-- carousel link -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="website icon" href="Img/web-logo.png">

    <title>Offside</title>
</head>

<body>

    <!-- Full Content of the Website -->
    <?php include("modals.php") ?>
    <?php include("navbar.php") ?>
    <div class="container fw-semibold">
        <div class="hero row justify-content-between py-5">
            <div class="col-lg-8 col-md-8 col-6">
                <!-- <p class="display-6 fw-semibold">Offside Football Kits and Boots Store</p> -->
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <input type="search" id="search-small" class="d-block d-md-none form-control shadow"
                    placeholder="Enter keywords">
                <input type="search" id="search" class="d-none d-md-block form-control shadow"
                    placeholder="Enter keywords">
            </div>
        </div>

        <!-- Large Device Search Container -->
        <div id="search-item" class="d-none d-md-block"></div>
        <!-- Small Device Search Container -->
        <div id="search-items" class="d-block d-md-none"></div>

        <!-- Carousel view -->
        <div id="demo" class="carousel slide text-center shadow-lg rounded" data-ride="carousel">
            <!-- Indicator -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
                <li data-target="#demo" data-slide-to="4"></li>
                <li data-target="#demo" data-slide-to="5"></li>
                <li data-target="#demo" data-slide-to="6"></li>
            </ul>
            <!-- Slideshow -->
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                    <img src="Img/slideshow/arg.jpg" alt="advert" width="100%" height="50%" />
                </div>
                <div class="carousel-item">
                    <img src="Img/slideshow/barca.jpg" alt="advert" width="100%" height="50%" />
                </div>
                <div class="carousel-item">
                    <img src="Img/slideshow/nike.jpg" alt="advert" width="100%" height="50%" />
                </div>
                <div class="carousel-item">
                    <img src="Img/slideshow/ars.jpg" alt="advert" width="100%" height="50%" />
                </div>
                <div class="carousel-item">
                    <img src="Img/slideshow/adidas.jpg" alt="advert" width="100%" height="50%" />
                </div>
                <div class="carousel-item">
                    <img src="Img/slideshow/aut.jpg" alt="advert" width="100%" height="50%" />
                </div>

            </div>

            <!-- Left and Right controls -->
            <a href="#demo" data-slide="prev" class="carousel-control-prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#demo" data-slide="next" class="carousel-control-next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>

        <div class="my-5">
            <p class="py-5 fs-4 fw-semibold">
                <?php echo strtoupper(("offside Football Kits and Boots Store")) ?>
            </p>
            <p class="text-center">Welcome to The Home of Football. Make moves in the latest football
                shirts and kits from
                the biggest names in the Premier League and English Football League, alongside leading clubs in the
                international field including the Spanish La Liga, German Bundesliga, French Ligue 1 Including national
                teams kits and football boots.</p>
        </div>

        <div class="row text-center mt-5 pt-5">
            <?php
            // national
            while ($row = mysqli_fetch_array($nation_result, MYSQLI_ASSOC)) {

                $name = $row['name'];
                $price = $row['price'];
                $image = $row['image'];
                $description = $row['description'];
                ?>

                <div class="col-lg-3 col-md-4 col-6 mb-5" data-aos="fade-up" data-aos-duration="2000">
                    <form action="product-detail.php" method="POST">
                        <input type="text" name="item-name" hidden value="<?php echo $name; ?>" readonly>
                        <input type="text" name="item-price" hidden value="<?php echo $price ?>" readonly>
                        <input type="text" name="image" hidden value="<?php echo $image ?>">
                        <input type="text" name="description" hidden value="<?php echo $description ?>">
                        <div class="shadow-lg bg background">
                            <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" class="mt-2" width="75%" id="ma" />

                            <p class="name my-2 small">
                                <?php echo $name; ?>
                            </p>

                            <div class="row small p-4">
                                <div class="col-3">
                                    <a class="cart ml-5" title="Add to cart">
                                        <img src="Img/cart.png" width="25px" data-name="<?php echo $name; ?>"
                                            data-price="<?php echo $price; ?>" data-image="<?php echo $image; ?>"
                                            data-added="0" data-type="kit" />
                                    </a>
                                </div>

                                <div class="col-3">
                                    <p class="fw-semibold rounded">
                                        <?php echo $price . "$";
                                        ?>
                                    </p>
                                </div>

                                <div class="col-6">
                                    <button type="submit" name="shop-btn" class="buy-btn"
                                        style="font-size:small;">Buy</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
            }

            // echo '
            //   <p class="text-end pe-4"> <a href="national.php" class="text-decoration small">See All</a></p>  
            // ';
            
            // Clubs
            while ($row = mysqli_fetch_array($club_result, MYSQLI_ASSOC)) {

                $name = $row['name'];
                $price = $row['price'];
                $image = $row['image'];
                $description = $row['description'];
                ?>

                <div class="col-lg-3 col-md-4 col-6 mb-5" data-aos="fade-up" data-aos-duration="2000">
                    <form action="product-detail.php" method="POST">
                        <input type="text" name="item-name" hidden value="<?php echo $name; ?>" readonly>
                        <input type="text" name="item-price" hidden value="<?php echo $price ?>" readonly>
                        <input type="text" name="image" hidden value="<?php echo $image ?>">
                        <input type="text" name="description" hidden value="<?php echo $description ?>">
                        <div class="shadow-lg bg background">
                            <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" class="mt-2" width="75%" id="ma" />

                            <p class="name my-2 small">
                                <?php echo $name; ?>
                            </p>

                            <div class="row small p-4">
                                <div class="col-3">
                                    <a class="cart ml-5" title="Add to cart">
                                        <img src="Img/cart.png" width="25px" data-name="<?php echo $name; ?>"
                                            data-price="<?php echo $price; ?>" data-image="<?php echo $image; ?>"
                                            data-added="0" data-type="kit" />
                                    </a>
                                </div>

                                <div class="col-3">
                                    <p class="fw-semibold rounded">
                                        <?php echo $price . "$";
                                        ?>
                                    </p>
                                </div>

                                <div class="col-6">
                                    <button type="submit" name="club-shop-btn" class="buy-btn"
                                        style="font-size:small;">Buy</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
            }
            // echo '
            //   <p class="text-end pe-4"> <a href="clubs.php" class="text-decoration small">See All</a></p>  
            // ';
            // Boots
            while ($row = mysqli_fetch_array($boot_result, MYSQLI_ASSOC)) {

                $name = $row['name'];
                $price = $row['price'];
                $image = $row['image'];
                $description = $row['description'];
                ?>

                <div class="col-lg-3 col-md-4 col-6 mb-5" data-aos="fade-up" data-aos-duration="2000">
                    <form action="product-detail.php" method="POST">
                        <input type="text" name="item-name" hidden value="<?php echo $name; ?>" readonly>
                        <input type="text" name="item-price" hidden value="<?php echo $price ?>" readonly>
                        <input type="text" name="image" hidden value="<?php echo $image ?>">
                        <input type="text" name="description" hidden value="<?php echo $description ?>">
                        <div class="shadow-lg bg background">
                            <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" class="mt-2" width="75%" id="ma" />

                            <p class="name my-2 small">
                                <?php echo $name; ?>
                            </p>

                            <p class="small">
                                <?php echo $description ?>
                            </p>

                            <div class="row small p-4">
                                <div class="col-3">
                                    <a class="cart ml-5" title="Add to cart">
                                        <img src="Img/cart.png" width="25px"
                                            data-name="<?php echo $name . " " . $description; ?>"
                                            data-price="<?php echo $price; ?>" data-image="<?php echo $image; ?>"
                                            data-added="0" data-type="kit" />
                                    </a>
                                </div>

                                <div class="col-3">
                                    <p class="fw-semibold rounded">
                                        <?php echo $price . "$";
                                        ?>
                                    </p>
                                </div>

                                <div class="col-6">
                                    <button type="submit" name="boot-shop-btn" class="buy-btn"
                                        style="font-size:small;">Buy</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
            }
            // echo '
            //   <p class="text-end pe-4"> <a href="boots.php" class="text-decoration small">See All</a></p>  
            // ';
            ?>
        </div>

        <?php
        $sql = "SELECT * FROM national";
        $result = mysqli_query($conn, $sql);
        $total = mysqli_num_rows($result);
        $pageItem = ceil($total / $pageNum);
        ?>

    </div>
    <!-- Footer -->
    <?php include("footer.php"); ?>
    <script src="JS/jar.amd.min.js"></script>
    <script src="JS/search.js"></script>
    <script src="JS/cart.js"></script>
    <script src="JS/modals.js"></script>
    <script src="JS/smallDevice.js"></script>
    <script src="JS/sweetalert2.all.min.js"></script>
    <script src="JS/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
