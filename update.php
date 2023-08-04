<?php

include("Php/conn.php");
// if(empty($admin)){
//     unset($admin);
//     header("Location: adminlog.php");
// }

$sql = "SELECT * FROM store WHERE payed = '1'";
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
    <link rel="stylesheet" href="Css/style.css" />
    <link rel="website icon" href="Img/web-logo.png">
    <title>Store</title>
</head>

<body>

    <nav class="mb-5 py-4 bg fixed-top">
        <div class="container fw-semibold">
            <div class="row">
                <div class="col-4">
                    <a href="admin.php"><img src="img/logo.png" alt="my shop logo" width="150px"></a>
                </div>

                <div class="offset-4 col-4">
                    <a href="store.php" class="text-decoration me-5">Store</a>
                    <a href="./Php/adminlogout.php" class="bi bi-box-arrow-right text-decoration"></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container hero fw-semibold">
        <p class="fs-5">Update Products</p>
        <div class="row mt-5">

        </div>
    </div>

</body>

</html>
