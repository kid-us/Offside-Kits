<?php

session_start();
include("Php/conn.php");

$pageNum = 12;

if (isset($_GET["page"])) {
  $page = $_GET["page"];

} else {
  $page = 1;
}

setcookie('pageNum', $page);

$start_from = ($page - 1) * $pageNum;
$sql = "SELECT * FROM boots ORDER BY id DESC LIMIT $start_from, $pageNum";
$result = mysqli_query($conn, $sql);


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Bootstrap Icon-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="Css/animate.min.css" />
  <link rel="stylesheet" href="Css/style.css" />
  <link rel="stylesheet" href="Css/modal.css" />

  <!-- Animated scrollbar link -->
  <link rel="stylesheet" href="Css/aos.css">
  <title>Boots</title>
  <!-- carousel link -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="website icon" href="Img/web-logo.png">

</head>

<body>


  <?php include("modals.php"); ?>
  <?php include("navbar.php"); ?>

  <div class="container fw-semibold">
    <div class="hero row justify-content-between py-5">
      <div class="col-lg-3 col-md-3 col-6">
        <p class="fs-5">Boots</p>
      </div>
      <div class="col-lg-3 col-md-3 col-6">
        <input type="search" id="search-small" class="d-block d-md-none form-control shadow"
          placeholder="Enter keywords">
        <input type="search" id="search" class="d-none d-md-block form-control shadow" placeholder="Enter keywords">
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
      </ul>
      <!-- Slideshow -->
      <div class="carousel-inner rounded">
        <div class="carousel-item active">
          <img src="Img/slideshow/nike-boot.jpg" alt="advert" width="100%" height="50%" />
        </div>
        <div class="carousel-item">
          <img src="Img/slideshow/adidas-boot.jpg" alt="advert" width="100%" height="50%" />
        </div>
        <div class="carousel-item">
          <img src="Img/slideshow/puma-boot.jpg" alt="advert" width="100%" height="50%" />
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
    <!-- carousel view end -->

    <div class="my-5">
      <h5 class="py-5">Here We Go Club Boots</h5>
      <p>We have a wide selection of boots to choose from, so you can find the perfect pair for your needs. We also
        offer a wide variety of sizes and styles, so you can find the perfect pair for your feet. Whether you're a young
        child or a grown adult, we have a pair of boots for you.</p>
    </div>
    <!-- boot page -->
    <div id="club-page" class="row text-center mt-5 pt-5">
      <?php
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $name = $row['name'];
        $price = $row['price'];
        $image = $row['image'];
        $description = $row['description'];

        ?>
        <div class="col-lg-3 col-md-4 col-6 mb-5" data-aos="fade-up" data-aos-duration="2000">
          <form action="product-detail.php" method="POST">
            <input type="text" name="item-name" hidden value="<?php echo $name; ?>" readonly>
            <input type="text" name="item-price" hidden value="<?php echo $price; ?>" readonly>
            <input type="text" name="image" hidden value="<?php echo $image ?>">
            <input type="text" name="description" hidden value="<?php echo $description ?>">
            <div class="shadow-lg bg background">
              <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" class="mt-2" width="75%" id="ma" />

              <p class="name my-2 small">
                <?php echo $name; ?>
              </p>
              <p class="text-center small">
                <?php echo $description ?>
              </p>

              <div class="row small p-4">
                <div class="col-3">
                  <a class="cart ml-5" title="Add to cart">
                    <img src="Img/cart.png" width="25px" data-name="<?php echo $name . " " . $description; ?>"
                      data-price="<?php echo $price; ?>" data-image="<?php echo $image; ?>" data-added="0"
                      data-type="boot" />
                  </a>
                </div>

                <div class="col-3">
                  <p class="fw-semibold rounded">
                    <?php echo $price . "$";
                    ?>
                  </p>
                </div>

                <div class="col-6">
                  <button type="submit" name="boot-shop-btn" class="buy-btn" style="font-size:small;">Buy</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <?php
      }
      ?>
    </div>

    <?php
    $sql = "SELECT * FROM boots";
    $result = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($result);
    $pageItem = ceil($total / $pageNum);
    ?>

    <p id="page-number" class="" data-page="<?php echo $page; ?>"></p>
    <ul class='pagination justify-content-center m-5 text-dark'>
      <?php
      for ($i = 1; $i <= $pageItem; $i++) {

        echo "<li class = 'page-item'> <a id='page' class='page$i page-link btn ' href='boots.php?page=" . $i . "'>" . $i . "</a></li>";
      }
      ?>
    </ul>
  </div>
  <!-- Footer -->
  <?php include("footer.php"); ?>

  <script>
    // Pagination
    let pageNo = document.getElementById("page-number").getAttribute("data-page");
    if (pageNo) {
      let pager = `page${pageNo}`;
      let activePage = document.querySelectorAll(".page-link");
      activePage.forEach((find) => {
        if (find.classList.contains(pager)) {
          find.classList.add("bg-danger");
          find.classList.add("text-light");
        }
      })
    }
  </script>
  <script src="JS/jar.amd.min.js"></script>
  <script src="JS/search.js"></script>
  <script src="JS/cart.js"></script>
  <script src="JS/modals.js"></script>
  <script src="JS/smallDevice.js"></script>
  <script src="JS/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
