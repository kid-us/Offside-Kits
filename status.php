<?php

session_start();

include("Php/conn.php");
include("Php/conn.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM store WHERE customerEmail = '$email' AND payed = '1'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
}

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

    <link rel="stylesheet" href="Css/style.css" />
    <link rel="stylesheet" href="Css/modal.css" />
    <!-- scrollbar animation -->
    <link rel="stylesheet" href="Css/aos.css">
    <link rel="website icon" href="Img/web-logo.png">
    <title>Dashboard</title>
</head>

<body>
    <?php include("modals.php") ?>
    <?php include("navbar.php") ?>

    <div class="container mb-5 rounded fw-semibold bg hero">
        <h4 class="ms-4 pt-5">Status</h4>
        <p class="p-4 text-center">Dear our customer <span class="text-danger">
                <?php echo $_SESSION['username']; ?>
            </span> this page shows items you purchased from us. <span class="text-success">
                We thnak you for choosing us!</span>
        </p>

        <hr style="background: 1px solid #000;">

        <!-- <h4>Ordered Products</h4> -->

        <?php
        if ($count > 0) {
            ?>
            <div class="row pt-3 justify-content-center">
                <?php

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $productName = $row['productName'];
                    $productPrice = $row['productPrice'];
                    $size = $row['size'];
                    $date = $row['date'];
                    $quantity = $row['quantity'];
                    $totalPay = $row['totalPayed'];
                    $image = $row['image'];
                    ?>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="row">
                            <div class="col-5">
                                <img src="<?php echo $image; ?>" alt="Purchased Item Image" class="img-fluid">
                            </div>

                            <div class="col-7 small">
                                <p>Product
                                    <span>
                                        <?php echo $productName ?>
                                    </span>
                                </p>
                                <p>Price:
                                    <span>
                                        <?php echo $productPrice . "$"; ?>
                                    </span>
                                </p>
                                <p>Total Pay:
                                    <span>
                                        <?php echo $totalPay . "$" ?>
                                    </span>
                                </p>
                                <p>Quantity:
                                    <span>
                                        <?php echo $quantity ?>
                                    </span>
                                </p>
                                <p>Size:
                                    <span>
                                        <?php echo strtoupper($size) ?>
                                    </span>
                                </p>
                                <p>Ordered Date:
                                    <span>
                                        <?php echo $date ?>
                                    </span>
                                </p>
                            </div>
                        </div>

                        <hr style="background: 1px solid #000;">
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        } else {
            ?>
            <p class="p-5 text-center text-danger"> Items not Purchased Yet! Please Buy our products </p>
            <?php
        }
        ?>
    </div>
    <!-- Footer -->
    <?php include("footer.php") ?>

    <script src="JS/jar.amd.min.js"></script>
    <script src="JS/cart.js"></script>
    <script src="JS/modals.js"></script>
    <script src="JS/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
