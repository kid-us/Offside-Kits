<?php

include ("conn.php");

$invalidMsg = "";
$validMsg = "";

if (isset($_POST['item'])){
    $item = mysqli_real_escape_string($conn, $_POST['item']);
}

if(isset($_POST['upload'])){
    
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTempName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];


    $fileExt = explode('.' , $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowedImageType = array('png');
    
    $itemName = mysqli_real_escape_string($conn,$_POST['item-name']);
    $itemPrice = mysqli_real_escape_string($conn,$_POST['item-price']);
    $imgAddress = 'upload/'.$item.'/'.$fileName;
   
    
    
    if(in_array($fileActualExt, $allowedImageType)){
        if($fileError === 0){
            if($fileSize <500000){

                $select = "SELECT * FROM $item WHERE image = '$imgAddress'";
                $selectResult = mysqli_query($conn, $select);
                $row = mysqli_fetch_array($selectResult, MYSQLI_ASSOC);
                $count = mysqli_num_rows($selectResult);
                if($count === 1){
                    $invalidMsg ='<i class=" fa fa-exclamation-triangle "></i>'." "."File already exist";
                }
                else{
                    $sql = "INSERT INTO $item (name, price ,image) VALUES ('$itemName', '$itemPrice', '$imgAddress')";
                    $insertResult = mysqli_query($conn, $sql);
                    if($insertResult){
                        // echo 'Inserted';
                        $fileDestination = 'upload/'.$item.'/'.$fileName;
                        move_uploaded_file($fileTempName, $fileDestination);
                        $validMsg = '<i class="fa fa-thumbs-o-up"></i>'." "."Uploaded";

                    }else{
                        $invalidMsg ='<i class=" fa fa-exclamation-triangle "></i>'." "."Insert is not completed its aborted";
                    }
                }


            }else{
                $invalidMsg ='<i class=" fa fa-exclamation-triangle "></i>'." "."This file is too Big!";
            }

        }else{
            $invalidMsg ='<i class=" fa fa-exclamation-triangle "></i>'." "."There is an error when Uploading this file";
        }

    }else{
        $invalidMsg ='<i class=" fa fa-exclamation-triangle "></i>'." "."You can not upload this type of file";
    }

}

?>




<!-- Open Notepad as administrator 
go to system 32
go to drivers
go to etc
select hosts.file
-->


<!-- open note pad 
go to xampp
go to apache
go to conf
go to extra
select vhosts-->