<?php
require_once("../conn.php");

if(isset($_POST["submitImage"])){
    $file=addslashes(file_get_contents($_FILES["food-image"]["tmp_name"]));
    $itemname=$_POST['fooditem'];
    $itemdescription=$_POST['description'];
    $itemprice=$_POST['foodprice'];
    $itemquantity=$_POST['foodquantity'];
    $itemclicks=0;
    $itemID=$_POST['foodID'];

    //$file_path="assets/";

    $sql_insert="INSERT INTO `productdetails`(`productID`, `productName`, `productDescription`, `productQuantity`, `productPrice`, `productClicks`, `productImage`) VALUES ('$itemID','$itemname','$itemdescription','$itemquantity','$itemprice','$itemclicks','$file')";
    if($conn->query($sql_insert)===TRUE){
        echo"<script>alert('Product details have been uploaded from database ');
        window.location.href='productlisting.php';
        </script>";
    }else{
        echo"Error".$conn->error;
    }

}


if (isset($_POST['updateinfo'])){
    $file=addslashes(file_get_contents($_FILES["food-image"]["tmp_name"]));
    $itemname=$_POST['fooditem'];
    $itemdescription=$_POST['description'];
    $itemprice=$_POST['foodprice'];
    $itemquantity=$_POST['foodquantity'];
    $itemID=$_POST['foodID'];
    $sql_update= "UPDATE `productdetails` SET `productName`='$itemname',`productDescription`='$itemdescription',`productQuantity`='$itemquantity',`productPrice`='$itemprice' ,`productImage`='$file' WHERE `productID`='$itemID'";
    if($conn->query($sql_update)===TRUE){
        echo"<script>alert('Product has been updated');
        window.location.href='productlisting.php';
        </script>";  
    }else{
        echo"Error".$conn->error;
    }
}
?>