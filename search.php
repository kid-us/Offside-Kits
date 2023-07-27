<?php

include("Php/conn.php");

if (isset($_REQUEST['national'])) {

    $name = $_REQUEST['national'];

    $sql = "SELECT * FROM national WHERE name LIKE '{$name}%'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    //searching from national table
    if ($count > 0) { //when search is found

        echo '<p class="text-success fw-semibold fs-5"> Search Results</p>';
        echo '<div id="club-page" class="row text-center mt-5">';

        while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $name = $rows['name'];
            $price = $rows['price'];
            $image = $rows['image'];

            echo '<div class="col-lg-3 col-md-4 col-6 mb-5 alert alert-success py-4">
                    <form action="payment.php" method="POST">
                        <input type="text" name="item-name" hidden value="' . $name . '">
                        <input type="text" name="item-price" hidden value="' . $price . ' $">
                        <input type="text" name="image" hidden value="' . $image . '">
                        <div class="shadow-lg bg background">
                            <img src="' . $image . '" alt="' . $name . '" class="mt-2" width="75%" id="ma" />

                            <p class="name my-2 small">
                                ' . $name . '
                            </p>

                            <div class="row small p-4">
                                <div class="col-6">
                                    <p class="fw-semibold rounded">
                                    ' . $price . '$
                                    </p>
                                </div>

                                <div class="col-6">
                                    <button type="submit" name="shop-btn" class="buy-btn" style="font-size:small;">Buy</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>'
            ;
        }
    } else { //when search is not find from national table

        $sql = "SELECT * FROM clubs WHERE name LIKE '{$name}%'";
        $clubResult = mysqli_query($conn, $sql);
        $clubCount = mysqli_num_rows($clubResult);

        //searching from club table
        if ($clubCount > 0) { //when search is found
            echo '<p class="text-success fw-semibold fs-5"> Search Results</p>';
            echo '<div id="club-page" class="row text-center mt-5">';

            while ($rows = mysqli_fetch_array($clubResult, MYSQLI_ASSOC)) {
                $name = $rows['name'];
                $price = $rows['price'];
                $image = $rows['image'];

                echo '<div class="col-lg-3 col-md-4 col-6 mb-5 alert alert-success py-4">
                        <form action="payment.php" method="POST">
                            <input type="text" name="item-name" hidden value="' . $name . '">
                            <input type="text" name="item-price" hidden value="' . $price . ' $">
                            <input type="text" name="image" hidden value="' . $image . '">
                            <div class="shadow-lg bg background">
                                <img src="' . $image . '" alt="' . $name . '" class="mt-2" width="75%" id="ma" />

                                <p class="name my-2 small">
                                    ' . $name . '
                                </p>

                                <div class="row small p-4">
                                    <div class="col-6">
                                        <p class="fw-semibold rounded">
                                        ' . $price . '$
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <button type="submit" name="club-shop-btn" class="buy-btn" style="font-size:small;">Buy</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>'
                ;
            }
        } else { //when search is not found in club table

            $sql = "SELECT * FROM boots WHERE name LIKE '{$name}%'";
            $bootResult = mysqli_query($conn, $sql);
            $bootCount = mysqli_num_rows($bootResult);

            //searching from boot table
            if ($bootCount > 0) { //when search is found in boot table
                echo '<p class="text-success fw-semibold fs-5"> Search Results</p>';
                echo '<div id="club-page" class="row text-center mt-5">';

                while ($rows = mysqli_fetch_array($bootResult, MYSQLI_ASSOC)) {
                    $name = $rows['name'];
                    $price = $rows['price'];
                    $image = $rows['image'];

                    echo '<div class="col-lg-3 col-md-4 col-6 mb-5 alert alert-success py-4">
                            <form action="payment.php" method="POST">
                                <input type="text" name="item-name" hidden value="' . $name . '">
                                <input type="text" name="item-price" hidden value="' . $price . ' $">
                                <input type="text" name="image" hidden value="' . $image . '">
                                <div class="shadow-lg bg background">
                                    <img src="' . $image . '" alt="' . $name . '" class="mt-2" width="75%" id="ma" />

                                    <p class="name my-2 small">
                                        ' . $name . '
                                    </p>

                                    <div class="row small p-4">
                                        <div class="col-6">
                                            <p class="fw-semibold rounded">
                                            ' . $price . '$
                                            </p>
                                        </div>

                                        <div class="col-6">
                                            <button type="submit" name="boot-shop-btn" class="buy-btn" style="font-size:small;">Buy</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>'
                    ;
                }

            } else { //when search is not found in boot table
                echo ' <p class="text-success fs-5 fw-semibold">Search Results</p>';
                echo ' <div class="row rounded justify-content-center py-5">
                        <div class="col-lg-12 alert alert-danger text-center">
                            <img src="Img/error.png" alt="Item Not Found" width="25%">
                            <p class="text-danger">Product not Found! Product will check on VAR</p>
                        </div>
                    ';

            } //end of search is not find message

        } // end of searching in club table

    } //end of searching in national table
}



// Small device search
if (isset($_REQUEST['search'])) {

    $name = $_REQUEST['search'];

    $sql = "SELECT * FROM national WHERE name LIKE '{$name}%'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    //searching from national table
    if ($count > 0) { //when search is found

        echo '<p class="text-success fw-semibold fs-5">Search Results</p>';
        echo '<div id="club-page" class="row text-center mt-5">';

        while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $name = $rows['name'];
            $price = $rows['price'];
            $image = $rows['image'];

            echo '<div class="col-lg-3 col-md-4 col-6 mb-5 alert alert-success py-3">
                    <form action="payment.php" method="POST">
                        <input type="text" name="item-name" hidden value="' . $name . '">
                        <input type="text" name="item-price" hidden value="' . $price . ' $">
                        <input type="text" name="image" hidden value="' . $image . '">
                        <div class="shadow-lg bg background">
                            <img src="' . $image . '" alt="' . $name . '" class="mt-2" width="75%" id="ma" />

                            <p class="name my-2 small">
                                ' . $name . '
                            </p>

                            <div class="row small p-4">
                                <div class="col-6">
                                    <p class="fw-semibold rounded">
                                    ' . $price . '$
                                    </p>
                                </div>

                                <div class="col-6">
                                    <button type="submit" name="shop-btn" class="buy-btn" style="font-size:small;">Buy</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>'
            ;
        }
    } else { //when search is not find from national table

        $sql = "SELECT * FROM clubs WHERE name LIKE '{$name}%'";
        $clubResult = mysqli_query($conn, $sql);
        $clubCount = mysqli_num_rows($clubResult);

        //searching from club table
        if ($clubCount > 0) { //when search is found
            echo ' <p class="text-success fs-5 fw-semibold">Search Results</p>';
            echo '<div id="club-page" class="row text-center mt-5">';

            while ($rows = mysqli_fetch_array($clubResult, MYSQLI_ASSOC)) {
                $name = $rows['name'];
                $price = $rows['price'];
                $image = $rows['image'];

                echo '<div class="col-lg-3 col-md-4 col-6 mb-5 alert alert-success py-3">
                        <form action="payment.php" method="POST">
                            <input type="text" name="item-name" hidden value="' . $name . '">
                            <input type="text" name="item-price" hidden value="' . $price . ' $">
                            <input type="text" name="image" hidden value="' . $image . '">
                            <div class="shadow-lg bg background">
                                <img src="' . $image . '" alt="' . $name . '" class="mt-2" width="75%" id="ma" />

                                <p class="name my-2 small">
                                    ' . $name . '
                                </p>

                                <div class="row small p-4">
                                    <div class="col-6">
                                        <p class="fw-semibold rounded">
                                        ' . $price . '$
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <button type="submit" name="club-shop-btn" class="buy-btn" style="font-size:small;">Buy</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>'
                ;
            }
        } else { //when search is not found in club table

            $sql = "SELECT * FROM boots WHERE name LIKE '{$name}%'";
            $bootResult = mysqli_query($conn, $sql);
            $bootCount = mysqli_num_rows($bootResult);

            //searching from boot table
            if ($bootCount > 0) { //when search is found in boot table
                echo ' <p class="text-success fs-5 fw-semibold">Search Results</p>';
                echo '<div id="club-page" class="row text-center mt-5">';

                while ($rows = mysqli_fetch_array($bootResult, MYSQLI_ASSOC)) {
                    $name = $rows['name'];
                    $price = $rows['price'];
                    $image = $rows['image'];

                    echo '<div class="col-lg-3 col-md-4 col-6 mb-5 alert alert-success py-3">
                            <form action="payment.php" method="POST">
                                <input type="text" name="item-name" hidden value="' . $name . '">
                                <input type="text" name="item-price" hidden value="' . $price . ' $">
                                <input type="text" name="image" hidden value="' . $image . '">
                                <div class="shadow-lg bg background">
                                    <img src="' . $image . '" alt="' . $name . '" class="mt-2" width="75%" id="ma" />

                                    <p class="name my-2 small">
                                        ' . $name . '
                                    </p>

                                    <div class="row small p-4">
                                        <div class="col-6">
                                            <p class="fw-semibold rounded">
                                            ' . $price . '$
                                            </p>
                                        </div>

                                        <div class="col-6">
                                            <button type="submit" name="boot-shop-btn" class="buy-btn" style="font-size:small;">Buy</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>'
                    ;
                }

            } else { //when search is not found in boot table
                echo ' <p class="text-success fs-5 fw-semibold">Search Results</p>';
                echo ' <div class="row rounded justify-content-center">
                        <div class="col-lg-12 alert alert-danger text-center">
                            <img src="Img/error.png" alt="Item Not Found" width="25%">
                            <p class="text-danger">Product not Found! Product will check on VAR</p>
                        </div>
                    ';

            } //end of search is not find message

        } // end of searching in club table

    } //end of searching in national table
}
// $sr = [];
// $sql = "SELECT * FROM clubs WHERE name LIKE '{$name}%'";
// $sql = "SELECT * FROM boots WHERE name LIKE '{$name}%'";

// while($row = mysqli_fetch_array($result)){
//     array_push($sr, $row);
// }
// var_dump($sr);

?>
