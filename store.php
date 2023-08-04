<?php

include("Php/conn.php");
// // session_start();
// if (empty($admin)) {
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
                    <a href="update.php" class="text-decoration me-5 small">Update</a>
                    <a href="./Php/adminlogout.php" class="bi bi-box-arrow-right text-decoration"></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container hero fw-semibold">
        <p class="">Ordered items with their information table</p>

        <div class="row justify-content-center shadow-lg bg-dark mt-5 p-3 rounded table-responsive">
            <table class="table mt-4">
                <thead class="bg-success">
                    <th>Name</th>
                    <th>Product</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Price</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Size</th>
                    <th>Qty</th>
                    <th>Payed</th>
                    <th>Date</th>
                </thead>

                <tbody>
                    <?php

                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $custName = $row['customerName'];
                        $custPhone = $row['customerPhone'];
                        $custEmail = $row['customerEmail'];
                        $productPrice = $row['productPrice'];
                        $custAddress = $row['customerAddress'];
                        $productName = $row['productName'];
                        $quantity = $row['quantity'];
                        $size = $row['size'];
                        $city = $row['city'];
                        $totalPay = $row['totalPayed'];
                        $date = $row['date'];
                        ?>

                        <tr class="bg-info font-weight-bold">
                            <td>
                                <?php echo $custName ?>
                            </td>
                            <td>
                                <?php echo $productName ?>
                            </td>
                            <td>
                                <?php echo $custPhone ?>
                            </td>
                            <td>
                                <?php echo $custEmail ?>
                            </td>
                            <td>
                                <?php echo $productPrice . "$" ?>
                            </td>
                            <td>
                                <?php echo $city ?>
                            </td>
                            <td>
                                <?php echo $custAddress ?>
                            </td>
                            <td>
                                <?php echo strtoupper($size) ?>
                            </td>
                            <td>
                                <?php echo $quantity ?>
                            </td>
                            <td>
                                <?php echo $totalPay . "$" ?>
                            </td>
                            <td>
                                <?php echo $date ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
