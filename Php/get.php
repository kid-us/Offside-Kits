<?php

include("conn.php");

if (isset($_POST['give'])){

    $item =[];
    $sql = "SELECT * FROM national";

    $result = mysqli_query($conn, $sql);
   
       while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

           echo "Item-Name: {$row['name']}"."<br>";
           echo "Item-Price{$row['price']}"."<br>";
           echo "Image-Location{$row['image']}";
       }
        
    
    }
    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //     $count = mysqli_num_rows($result);
    //     if($count > 1){
    //       $msg  = 'Logged in';
    //       echo  "{$row['name']}";
    //       echo  "{$row['price']}";
    //       echo  "{$row['image']}";
          
    //     }
// }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Test</title>
  </head>
  <body>
    <form action="get.php" method="POST">
      <button type="submit" name="give">Give Me</button>
    </form>
  </body>
</html>
