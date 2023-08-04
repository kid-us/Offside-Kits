<?php

session_start();

include("Php/conn.php");
require("config.php");

$name = "";
$price = "";
$image = "";
$description = "";

if (isset($_POST['shop-btn'])) {
  $name = htmlentities($_POST['item-name']);
  $price = htmlentities($_POST['item-price']);
  $product = htmlentities("nation");
  $image = htmlentities($_POST['image']);
  $description = htmlentities($_POST['description']);
  $amount = htmlentities(intval($price) * 100);
  $item = htmlentities("Kit");

  $sql = "SELECT * FROM national ORDER BY RAND() LIMIT 0, 4";
  $result = mysqli_query($conn, $sql);
}

if (isset($_POST['club-shop-btn'])) {
  $name = htmlentities($_POST['item-name']);
  $price = htmlentities($_POST['item-price']);
  $product = htmlentities("club");
  $image = htmlentities($_POST['image']);
  $description = htmlentities($_POST['description']);
  $amount = htmlentities(intval($price) * 100);
  $item = htmlentities("Kit");

  $sql = "SELECT * FROM clubs ORDER BY RAND() LIMIT 0, 4";
  $result = mysqli_query($conn, $sql);
}

if (isset($_POST['boot-shop-btn'])) {
  $name = htmlentities($_POST['item-name']);
  $price = htmlentities($_POST['item-price']);
  $product = htmlentities("boot");
  $image = htmlentities($_POST['image']);
  $description = htmlentities($_POST['description']);
  $amount = htmlentities(intval($price) * 100);
  $item = htmlentities("Boot");

  $sql = "SELECT * FROM boots ORDER BY RAND() LIMIT 0, 4";
  $result = mysqli_query($conn, $sql);
}


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

  <link rel="website icon" href="Img/web-logo.png">
  <title>
    <?php echo $name ?>
  </title>
</head>

<body>

  <div class="container fw-semibold">
    <?php include("modals.php") ?>
    <?php include("navbar.php") ?>
    <div class="hero shadow-lg rounded bg mb-5">
      <div class="row justify-content-center p-5">
        <div class="col-lg-5 col-md-4 col-12">
          <p class="fs-3 mb-4">
            <?php echo $name ?>
          </p>
          <img id="img" src="<?php echo $image; ?>" alt="<?php echo $name ?>" width="300px" />
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <p>Available in Stock</p>
          <p class="text-secondary">Description</p>
          <?php
          if ($product === 'nation') {
            if ($description != "") {
              ?>
              <p class="mt-3">
                <?php echo $description ?>
              </p>

              <?php
            } else {
              ?>
              <p class="mt-3">The
                <?php echo $name ?> national team Kit.
              </p>
              <?php
            }
          } else if ($product === 'club') {
            if ($description != "") {
              ?>
                <p class="mt-3">
                <?php echo $description ?>
                </p>

                <?php
            } else {
              ?>
                <p class="mt-3">The
                <?php echo $name ?> Football Club Kit.
                </p>
                <?php
            }
          } else if ($product === 'boot') {
            if ($description != "") {
              ?>
                  <p class="mt-3">
                  <?php echo "The " . $name . " new " . $description . " Football Boot" ?>
                  </p>

                  <?php
            } else {
              ?>
                  <p class="mt-3">The
                  <?php echo $name ?> Football Boot.
                  </p>
                  <?php
            }
          }
          ?>
          <form action="pay.php" method="post">
            <div class="row mt-5">

              <div class="col-lg-3 col-md-3 col-6">
                <p>Price</p>
                <p>
                  <?php echo $price . "$" ?>
                </p>
              </div>

              <div class="col-3">
                <label for="qty">Quantity</label>
                <input type="number" min="1" max="22" class="form-control mt-2" name="qty" value="1">
              </div>

              <div class="col-3">
                <?php
                if ($product === "nation" || $product === "club") {
                  ?>
                  <label for="size">Size</label>
                  <select name="size" class="form-select mt-2">
                    <option value="xl">XL</option>
                    <option value="l">L</option>
                    <option value="m">M</option>
                    <option value="s">S</option>
                  </select>
                  <?php
                } else {
                  ?>
                  <label for="size">Size</label>
                  <select name="size" class="form-select mt-2">
                    <option value="42">42</option>
                    <option value="41">41</option>
                    <option value="40">40</option>
                    <option value="39">39</option>
                    <option value="38">38</option>
                  </select>
                  <?php
                }
                ?>
              </div>
              <div class="col-lg-3 col-md-3 col-12 mt-2">
                <label for=""></label>
                <input type="text" name="buying" value="single" readonly hidden>
                <input type="text" name="img" value="<?php echo $image ?>" readonly hidden>
                <input type="text" name="name" value="<?php echo $name ?>" readonly hidden>
                <input type="text" name="price" value="<?php echo $price ?>" readonly hidden>

                <button name="order" class="buy-btn w-100">Order Now</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Related  Product-->
    <p class="py-5 fs-5">Related Products</p>
    <div class="row justify-content-center text-center">
      <?php
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $name = $row['name'];
        $price = $row['price'];
        $image = $row['image'];

        ?>
        <div class=" col-lg-3 col-md-4 col-6 mb-5" data-aos="fade-up" data-aos-duration="2000">
          <form action="payment.php" method="POST">
            <input type="text" name="item-name" hidden value="<?php echo $name; ?>" readonly>
            <input type="text" name="item-price" hidden value="<?php echo $price . "$"; ?>" readonly>
            <input type="text" name="image" hidden value="<?php echo $image ?>">
            <input type="text" name="description" hidden value="<?php echo $description ?>">
            <div class="rounded shadow-lg bg">
              <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" class="mt-2" width="75%" />

              <p class="name my-2 small">
                <?php echo $name; ?>
              </p>

              <div class="row small p-4">
                <div class="col-3">
                  <a class="cart ml-5" title="Add to cart">
                    <img src="Img/cart.png" width="25px" data-name="<?php echo $name; ?>"
                      data-price="<?php echo $price . "$"; ?>" data-image="<?php echo $image; ?>" data-added="0" />
                  </a>
                </div>

                <div class="col-3">
                  <p class="fw-semibold rounded">
                    <?php echo $price . "$";
                    ?>
                  </p>
                </div>

                <div class="col-6">
                  <?php
                  if ($product === "nation") {
                    ?>
                    <button type="submit" name="shop-btn" class="buy-btn" style="font-size:small;">Buy</button>
                    <?php
                  } else if ($product === "club") {
                    ?>
                      <button type="submit" name="club-shop-btn" class="buy-btn" style="font-size:small;">Buy</button>
                      <?php
                  } else {
                    ?>
                      <button type="submit" name="boot-shop-btn" class="buy-btn" style="font-size:small;">Buy</button>
                      <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </form>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
  <!--  Footer-->
  <?php include("footer.php") ?>

  <script src="JS/jar.amd.min.js"></script>
  <script src="JS/modals.js"></script>
  <script src="JS/cart.js"></script>
  <script src="JS/smallDevice.js"></script>
</body>

</html>
