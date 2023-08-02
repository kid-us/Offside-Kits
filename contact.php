<?php

session_start();

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
    <link rel="website icon" href="Img/web-logo.png">
    <title>Contact</title>
</head>

<body>
    <?php include("modals.php") ?>
    <?php include("navbar.php") ?>

    <div class="container mb-5 p-5 hero mb-5 bg fw-semibold small">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 p-5 shadow-lg rounded fw-semibold">
                <p class="fs-3 mb-5">Contact Us Via</p>
                <h2>Address</h2>
                <p class="ps-5 display-5">Nazret, Ethiopia</p>
                <h2>Phone</h2>
                <p class="ps-5 display-5">+25100000000</p>
                <h2>Email</h2>
                <p class="ps-5 display-5">Offsidekit@gmail.com</p>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 p-5 pl-0">
                <form method="POST" id="contact-form">
                    <p class="fs-3 mb-5">Get in Touch</p>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="contact-name" class="form-control my-3">
                    <label for="email">Email</label>
                    <input type="email" id="contact-email" class="form-control my-3">
                    <label for="comment">Message</label>
                    <textarea name="comment" id="contact-comment" class="form-control my-3" cols="2"
                        rows="4"></textarea>

                    <button id="contact-btn" type="submit" disabled class="buy-btn w-75 py-2 mt-3">Send</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include("footer.php") ?>

    <script src="JS/jar.amd.min.js"></script>
    <script src="JS/cart.js"></script>
    <script src="JS/modals.js"></script>
    <script src="JS/smallDevice.js"></script>
</body>
</head>
