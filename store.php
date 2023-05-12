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
    
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="Css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Grape+Nuts&display=swap"
      rel="stylesheet"
    />
    <title>Store</title>
</head>
<body>
    
    <div class="container">
    <ul class="mt-3">
        <li class="Navs float-right mr-5 pr-5"><a href="admin.php"><span class="fa fa-step-backward"></span></a></li>
        <br>
      </ul>
      <p class="text-center alert alert-success font-weight-bold">Ordered items with their information table</p>
        
        <div class="row justify-content-center">
            <table class="table table-responsive table-hover mt-4 rounded" style=" margin: auto; width: 86% ">
                <thead class="bg-success">
                    <th> Buyer Name</th>
                    <th> Item Name</th>
                    <th> Price</th>
                    <th> Email</th>
                    <th> Address</th>
                    <th> Size</th>
                    <th>Quantity</th>
                    <th> Date <br> <small class="small">DD/MM/YY</small></th>
                </thead>
                <tbody>
                    <?php
                       
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                            $custName = $row['customerName'];
                            $custPhone = $row['customerPhone'];
                            $custEmail = $row['customerEmail'];
                            $custAddress = $row['customerAddress'];
                            $productName = $row['productName'];
                            $quantity = $row['quantity'];
                            $size = $row['size'];
                            $date = $row['date'];
                    ?>
                    <tr class="bg-info font-weight-bold">
                        <td><?php echo $custName?></td>
                        <td><?php echo $productName?></td>
                        <td><?php echo $custPhone?></td>
                        <td><?php echo $custEmail?></td>
                        <td><?php echo $custAddress?></td>
                        <td><?php echo $size?></td>
                        <td><?php echo $quantity?></td>
                        <td><?php echo $date?></td>
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