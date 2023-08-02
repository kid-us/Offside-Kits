<?php

session_start();
include("Php/insert.php");
include("Php/conn.php");

// include ("Php/bootInsert.php");
if (isset($_SESSION['name'])) {
  $admin = $_SESSION['name'];
  if (time() - $_SESSION['last_login_time'] > 2700) {
    header("Location: adminlog.php");
  }
}

$result1 = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `national`");
$row1 = mysqli_fetch_assoc($result1);
$national_count = $row1['count'];

$result2 = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `clubs`");
$row2 = mysqli_fetch_assoc($result2);
$clubs_count = $row2['count'];

$result3 = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `boots`");
$row3 = mysqli_fetch_assoc($result3);
$boot_count = $row3['count'];

// if(isset($admin) && time() - )

$sql = "SELECT * FROM store";
$result = mysqli_query($conn, $sql);

$tot = 0;
while ($revenue = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  $tot = $tot + $revenue['totalPayed'];
}

if (empty($admin)) {
  unset($admin);
  header("Location: adminlog.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Css/modal.css" />
  <link rel="stylesheet" href="Css/admin.css" />
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Bootstrap Icon-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="website icon" href="Img/web-logo.png">
  <title>Dashboard</title>
</head>
<style>
  body {
    background-color: rgb(230, 230, 230);
  }
</style>

<body>

  <nav class="mb-5 py-4 bg fixed-top">
    <div class="container fw-semibold">
      <div class="row">
        <div class="col-4">
          <a href="admin.php"><img src="img/logo.png" alt="my shop logo" width="150px"></a>
        </div>

        <div class="offset-4 col-4">
          <a href="store.php" class="text-decoration me-5">Store</a>
          <a href="update.php" class="text-decoration me-5">Update</a>
          <a href="./Php/adminlogout.php" class="bi bi-box-arrow-right text-decoration"></a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container hero">
    <div class="row justify-content-center bg shadow-lg rounded fw-semibold p-5">
      <p class="text-center text-danger">
        <?php echo $invalidMsg; ?>
      </p>
      <p class="text-center text-success">
        <?php echo $validMsg; ?>
      </p>

      <div class="col-lg-6 col-md-6 col-12">
        <div class="col-12 mt-5 p-5 rounded bg-info text-light">
          <p>Total Revenue
            <span class="fs-2 text-danger">
              <?php echo $tot . "$"; ?>
            </span>
          </p>
        </div>

        <div class="col-12 mt-5 p-5 rounded bg-dark text-light">
          <p>Total National Team Products
            <span class="fs-2 text-danger">
              <?php echo $national_count ?>
            </span>
          </p>
        </div>

        <div class="col-12 mt-5 p-5 rounded bg-dark text-light">
          <p>Total Clubs Team Products
            <span class="fs-2 text-danger">
              <?php echo $clubs_count ?>
            </span>
          </p>
        </div>

        <div class="col-12 mt-5 p-5 rounded bg-dark text-light">
          <p>Total Boots Products
            <span class="fs-2 text-danger">
              <?php echo $boot_count ?>
            </span>
          </p>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-12">
        <form action="admin.php" method="POST" enctype="multipart/form-data" class="small">
          <p class="pt-5">Please select what you are going to upload</p>
          <hr>
          <input type="radio" name="item" id="national" class="cursor" value="national" required />
          <span>National Kit</span>

          <input type="radio" name="item" id="clubs" class="cursor ms-5" required value="clubs" />
          <span class="me-5">Club Kit</span>

          <input type="radio" name="item" id="boots" class="cursor" value="boots" required />
          <span>Boot</span>
          <hr>
          <p class="my-5 fs-5">Create New Products</p>
          <label for="Name">Name : </label>
          <input type="text" name="item-name" class="form-control border border-dark my-3" required />
          <label for="Price">Price : </label>
          <input type="number" name="item-price" class="form-control border border-dark my-3" required />
          <label for="description">Description</label>
          <textarea name="description" cols="30" rows="4" class="form-control border border-dark my-3"
            style="resize:none"></textarea>
          <label for="file">Image</label>
          <input type="file" name="file" class="form-control border border-dark my-3" required />
          <p class="small text-dark bg-info p-2 rounded">Remember Pictures or Photos must be <span
              class="text-danger">.png</span>
            type to be Uploaded</p>
          <button type="submit" name="upload" class="btn btn-success w-25 my-3">
            Upload
          </button>
        </form>
      </div>

    </div>
    <!-- <script src="JS/adminDescription.js"></script> -->
</body>

</html>
