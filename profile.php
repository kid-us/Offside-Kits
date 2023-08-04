<?php

session_start();

include("Php/conn.php");

$error = "";
$errors = "";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['done'])) {

    $oldEmail = $_SESSION['email'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $oldPassword = md5(mysqli_real_escape_string($conn, $_POST['old-password']));
    $newPassword = (mysqli_real_escape_string($conn, $_POST['new-password']));

    if (empty($newPassword)) {

        $mySql = "SELECT * FROM customer WHERE password = '$oldPassword' AND email = '$oldEmail'";
        $countResult = mysqli_query($conn, $mySql);
        $count = mysqli_num_rows($countResult);

        if ($count == 1) { //if password is correct

            $newsql = "SELECT username FROM customer WHERE username = '$user'";
            $results = mysqli_query($conn, $newsql);
            $counts = mysqli_num_rows($results);

            if ($counts > 1) { //if there is no username like the input
                $error = "Username or Email already exist ";
            } else {
                $mysql = "SELECT email FROM customer WHERE email = '$email'";
                $res = mysqli_query($conn, $mysql);
                $rows = mysqli_num_rows($res);

                if ($rows > 1) { //if there is no email like the input
                    $error = "Username or Email already exist ";
                } else {
                    $sql = "UPDATE customer SET email = '$email', username = '$user' WHERE password = '$oldPassword'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) { // if all is correct
                        $updateQuery = "UPDATE store SET customerEmail = '$email', customerName = '$user' WHERE customerEmail = '$oldEmail'";
                        mysqli_query($conn, $updateQuery);

                        header("Location:login.php?Successfully updated");
                        session_destroy();
                    }
                }
            }
        } else { // when password not correct
            $errors = "Invalid Password";
        }

    } else {
        if (strlen($newPassword) < 6) {
            $msg = "Password must be greater than 6 characters";
        } else {
            $mySql = "SELECT * FROM customer WHERE password = '$oldPassword' AND email = '$oldEmail'";
            $countResult = mysqli_query($conn, $mySql);
            $count = mysqli_num_rows($countResult);

            if ($count == 1) {
                $newsql = "SELECT username FROM customer WHERE username = '$user'";
                $results = mysqli_query($conn, $newsql);
                $counts = mysqli_num_rows($results);

                if ($counts > 1) { //if there is no username like the input
                    $error = "Username or Email already exist ";
                } else {
                    $mysql = "SELECT email FROM customer WHERE email = '$email'";
                    $res = mysqli_query($conn, $mysql);
                    $rows = mysqli_num_rows($res);

                    if ($rows > 1) { //if there is no email like the input
                        $error = "Username or Email already exist ";
                    } else {
                        $newPass = md5($newPassword);
                        $sql = "UPDATE customer SET email = '$email', username = '$user', password = '$newPass' WHERE password = '$oldPassword'";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $updateQuery = "UPDATE store SET customerEmail = '$email', customerName = '$user' WHERE customerName = '$oldUsername'";

                            mysqli_query($conn, $updateQuery);

                            header("Location:login.php?Successfully updated");
                            session_destroy();
                        }
                    }
                }
            } else {
                $errors = "Invalid Password";
            }
        }
    }
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
    <link rel="website icon" href="Img/web-logo.png">
    <title>Profile</title>
</head>

<body>
    <?php include("modals.php") ?>
    <?php include("navbar.php") ?>

    <div class="container fw-semibold hero shadow-lg rounded bg p-5 mb-5">

        <p class="left ms-4 pt-2 fs-3">Profile
            <button id="edit" style="width: 100px;" class="right btn btn-success mx-3">Edit</button>
            <button id="cancel" class="right btn btn-danger hidden">Cancel</button>
        </p>

        <hr style="background: 1px solid #000;">


        <form action="profile.php" method="POST" class="pt-3">
            <p class="small text-danger">
                <?php echo $error; ?>
            </p>
            <div class="row justify-content-center ml-4 mb-4">

                <div class="col-lg-3 col-sm-12">
                    <label for="">Email</label>
                </div>

                <div class="col-lg-7 col-sm-12 mb-5">
                    <input id="email" type="email" name="email" class="form-control " disabled
                        value="<?php echo $_SESSION['email']; ?>">
                </div>

                <div class="col-lg-3 col-sm-12">
                    <label for="Username">Username</label>
                </div>
                <div class="col-lg-7 col-sm-12 mb-5">
                    <input id="username" type="text" name="username" class="form-control " disabled
                        value="<?php echo $_SESSION['username']; ?>" required>
                </div>

                <div class="col-lg-3 col-sm-4">
                    <label for="Password">Password</label>
                </div>

                <div class="col-lg-7 col-sm-8 mb-3">
                    <input id="input-password" type="password" name="old-password" class="form-control mb-3 "
                        value="00000000000" placeholder="current-password" disabled required>
                    <p class="small text-danger">
                        <?php echo $errors; ?>
                    </p>
                    <a id="change-text" class="text-primary text-decoration small hidden cursor mt-3">Also
                        Change Password?</a>

                    <input id="new-password" type="password" name="new-password" class="form-control  hidden mt-4"
                        placeholder="New Password">

                    <p id="pass-info" class="hidden small text-info mt-2"> Your Password needs to be at least 6
                        characters
                        please
                        make it secure</p>
                </div>

                <div class="offset-3 col-lg-7 col-sm-12 mb-5">
                    <button id="done" type="submit" disabled name="done" class="btn btn-danger w-25">Done</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <?php include("footer.php") ?>

    <script src="JS/jar.amd.min.js"></script>
    <script src="JS/cart.js"></script>
    <script src="JS/dash.js"></script>
    <script src="JS/modals.js"></script>
</body>

</html>
