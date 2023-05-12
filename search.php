<?php

include("Php/conn.php");

if(isset($_REQUEST['national'])){

    $name = $_REQUEST['national'];

    $sql = "SELECT * FROM national WHERE name LIKE '{$name}%'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

        //searching from national table
    if($count > 0){ //when search is found
        
        echo ' <p class="text-success font-weight-bold "> SEARCHED RESULTS</p>';
        echo '<div id="club-page" class="row text-center mt-5">';

        while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $name =  $rows['name'];
            $price = $rows['price'];
            $image = $rows['image'];
            
            echo '<div class="col-lg-4 col-sm-12 col-md-6 mb-5">
                    <form action="payment.php" method="POST" class="alert alert-success">
                        <input type="text" name="item-name" hidden value ="'.$name.'" readonly >
                        <input type="text" name="item-price" hidden value="'.$price.'" readonly >
                        <input type="text" name="image" hidden value="'.$image.'">
            
                        <div class="shadow-lg bg-light rounded-lg">
                            <img src="'.$image.'" alt="" width="40%" class="mt-5"/>
                            <p id="name-1" class="name">'.$name.'</p>  
                
                            <span class="p-2 mr-5 text-light bg-info font-weight rounded">'.$price.'$ </span> 
        
                            <button type="submit" name="shop-btn" class="shop-btn btn btn-outline-danger ml-2  rounded-pill" 
                                        >Shop Now</button>
                            <br />
                            <br />
                        </div>
                    </form>
                </div>';
        }
    }else{ //when search is not find from national table

    $sql = "SELECT * FROM clubs WHERE name LIKE '{$name}%'";
    $clubResult = mysqli_query($conn, $sql);
    $clubCount = mysqli_num_rows($clubResult);

    //searching from club table
    if($clubCount > 0){ //when search is found
        echo ' <p class="text-success">SEARCHED RESULTS</p>';
        echo '<div id="club-page" class="row text-center mt-5">';

        while($rows = mysqli_fetch_array($clubResult, MYSQLI_ASSOC)){
            $name =  $rows['name'];
            $price = $rows['price'];
            $image = $rows['image'];
    
            echo '<div class="col-lg-4 col-sm-12 col-md-6 mb-5">
                    <form action="payment.php" method="POST" class="alert alert-success">
                        <input type="text" name="item-name" hidden value ="'.$name.'" readonly >
                        <input type="text" name="item-price" hidden value="'.$price.'" readonly >
                        <input type="text" name="image" hidden value="'.$image.'">
    
                        <div class="shadow-lg bg-light rounded-lg">
                            <img src="'.$image.'" alt="" width="40%" id="ma" class="mt-5"/>
                            <p id="name-1" class="name">'.$name.'</p>  
    
                            <span class="p-2 mr-5 text-light bg-info font-weight rounded">'.$price.'$ </span> 
        
                            <button type="submit" name="shop-btn" class="shop-btn btn btn-outline-danger ml-2  rounded-pill" 
                                        >Shop Now</button>
                
                            <br />
                            <br />
                        </div>
                    </form>
                </div>';
        }
    }else{ //when search is not found in club table

        $sql = "SELECT * FROM boots WHERE name LIKE '{$name}%'";
        $bootResult = mysqli_query($conn, $sql);
        $bootCount = mysqli_num_rows($bootResult);

        //searching from boot table
        if($bootCount > 0){ //when search is found in boot table
            echo ' <p class="text-success">Searched Results</p>';
            echo '<div id="club-page" class="row text-center mt-5">';

            while($rows = mysqli_fetch_array($bootResult, MYSQLI_ASSOC)){
                $name =  $rows['name'];
                $price = $rows['price'];
                $image = $rows['image'];
                
                echo '<div class="col-lg-4 col-sm-12 col-md-6 mb-5">
                        <form action="payment.php" method="POST" class="alert alert-success">
                            <input type="text" name="item-name" hidden value ="'.$name.'" readonly >
                            <input type="text" name="item-price" hidden value="'.$price.'" readonly >
                            <input type="text" name="image" hidden value="'.$image.'">
        
                            <div class="shadow-lg bg-light rounded-lg">
                                <img src="'.$image.'" alt="" width="40%" id="ma" class="mt-5"/>
                                <p id="name-1" class="name">'.$name.'</p>  
        
                                <span id="price-1" class="price pl-1 pr-2 p-1 text-light bg-secondary font-weight-bolder rounded">'.$price.'$ </span> 
        
                                
                                <button type="submit" name="shop-btn" class="shop-btn btn btn-outline-danger ml-5 mt-2 rounded-pill shop-btn" 
                                >Shop Now</button>
                    
                                <br />
                                <br />
                            </div>
                        </form>
                    </div>';
            }

        }else{ //when search is not found in boot table
             echo ' <p class="text-success">Searched Results</p>';
                echo ' <div class="row rounded justify-content-center">
                        <div class="col-lg-12 alert alert-danger text-center">
                            <img src="/Img/error.png" alt="Item Not Found" width="25%">
                            <p class="text-danger">Item not Found! Items will be check on VAR</p>
                        </div>
                    ';

        } //end of search is not find message

    } // end of searching in club table

    }//end of searching in national table
}



// Small device search
if(isset($_REQUEST['search'])){

    $name = $_REQUEST['search'];

    $sql = "SELECT * FROM national WHERE name LIKE '{$name}%'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

        //searching from national table
    if($count > 0){ //when search is found
        
        echo ' <p class="text-success">Searched Results</p>';
        echo '<div id="club-page" class="row text-center mt-5">';

        while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $name =  $rows['name'];
            $price = $rows['price'];
            $image = $rows['image'];
            
            echo '<div class="col-lg-4 col-sm-12 col-md-6 mb-5">
                    <form action="payment.php" method="POST" class="alert alert-success">
                        <input type="text" name="item-name" hidden value ="'.$name.'" readonly >
                        <input type="text" name="item-price" hidden value="'.$price.'" readonly >
                        <input type="text" name="image" hidden value="'.$image.'">
            
                        <div class="shadow-lg bg-light rounded-lg">
                            <img src="'.$image.'" alt="" width="40%" id="ma" class="mt-5"/>
                            <p id="name-1" class="name">'.$name.'</p>  
                
                            <span id="price-1" class="price pl-1 pr-2 p-1 text-light bg-secondary font-weight-bolder rounded">'.$price.'$ </span> 
            
                                    
                            <button type="submit" name="shop-btn" class="shop-btn btn btn-outline-danger ml-5 mt-2 rounded-pill shop-btn" 
                                        >Shop Now</button>
                            <br />
                            <br />
                        </div>
                    </form>
                </div>';
        }
    }else{ //when search is not find from national table

    $sql = "SELECT * FROM clubs WHERE name LIKE '{$name}%'";
    $clubResult = mysqli_query($conn, $sql);
    $clubCount = mysqli_num_rows($clubResult);

    //searching from club table
    if($clubCount > 0){ //when search is found
        echo ' <p class="text-success">Searched Results</p>';
        echo '<div id="club-page" class="row text-center mt-5">';

        while($rows = mysqli_fetch_array($clubResult, MYSQLI_ASSOC)){
            $name =  $rows['name'];
            $price = $rows['price'];
            $image = $rows['image'];
    
            echo '<div class="col-lg-4 col-sm-12 col-md-6 mb-5">
                    <form action="payment.php" method="POST" class="alert alert-success">
                        <input type="text" name="item-name" hidden value ="'.$name.'" readonly >
                        <input type="text" name="item-price" hidden value="'.$price.'" readonly >
                        <input type="text" name="image" hidden value="'.$image.'">
    
                        <div class="shadow-lg bg-light rounded-lg">
                            <img src="'.$image.'" alt="" width="40%" id="ma" class="mt-5"/>
                            <p id="name-1" class="name">'.$name.'</p>  
    
                            <span id="price-1" class="price pl-1 pr-2 p-1 text-light bg-secondary font-weight-bolder rounded">'.$price.'$ </span> 
    
                            
                            <button type="submit" name="shop-btn" class="shop-btn btn btn-outline-danger ml-5 mt-2 rounded-pill shop-btn" 
                            >Shop Now</button>
                
                            <br />
                            <br />
                        </div>
                    </form>
                </div>';
        }
    }else{ //when search is not found in club table

        $sql = "SELECT * FROM boots WHERE name LIKE '{$name}%'";
        $bootResult = mysqli_query($conn, $sql);
        $bootCount = mysqli_num_rows($bootResult);

        //searching from boot table
        if($bootCount > 0){ //when search is found in boot table
            echo ' <p class="text-success">Searched Results</p>';
            echo '<div id="club-page" class="row text-center mt-5">';

            while($rows = mysqli_fetch_array($bootResult, MYSQLI_ASSOC)){
                $name =  $rows['name'];
                $price = $rows['price'];
                $image = $rows['image'];
                
                echo '<div class="col-lg-4 col-sm-12 col-md-6 mb-5">
                        <form action="payment.php" method="POST" class="alert alert-success">
                            <input type="text" name="item-name" hidden value ="'.$name.'" readonly >
                            <input type="text" name="item-price" hidden value="'.$price.'" readonly >
                            <input type="text" name="image" hidden value="'.$image.'">
        
                            <div class="shadow-lg bg-light rounded-lg">
                                <img src="'.$image.'" alt="" width="40%" id="ma" class="mt-5"/>
                                <p id="name-1" class="name">'.$name.'</p>  
        
                                <span id="price-1" class="price pl-1 pr-2 p-1 text-light bg-secondary font-weight-bolder rounded">'.$price.'$ </span> 
        
                                
                                <button type="submit" name="shop-btn" class="shop-btn btn btn-outline-danger ml-5 mt-2 rounded-pill shop-btn" 
                                >Shop Now</button>
                    
                                <br />
                                <br />
                            </div>
                        </form>
                    </div>';
            }

        }else{ //when search is not found in boot table
             echo ' <p class="text-success">Searched Results</p>';
                echo ' <div class="row rounded justify-content-center">
                        <div class="col-lg-12 alert alert-danger text-center">
                            <img src="/Img/error.png" alt="Item Not Found" width="25%">
                            <p class="text-danger">Item not Found! Items will be check on VAR</p>
                        </div>
                    ';

        } //end of search is not find message

    } // end of searching in club table

    }//end of searching in national table
}
// $sr = [];
// $sql = "SELECT * FROM clubs WHERE name LIKE '{$name}%'";
// $sql = "SELECT * FROM boots WHERE name LIKE '{$name}%'";

// while($row = mysqli_fetch_array($result)){
    //     array_push($sr, $row);
    // }
    // var_dump($sr);
    
?>