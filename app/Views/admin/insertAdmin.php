<?php
require("../conn.php"); 
$fname=$_POST['first_name'];
$sname=$_POST['surname_name'];
$email=$_POST['email_address'];
$password=$_POST['pass_word'];
$cpassword=$_POST['conpassword'];
$position=$_POST['adminPos'];
$adminAth=$_POST['Autadmin'];
$sql_select= "SELECT * FROM `admindetails` WHERE email='$email';";
$result=$conn->query($sql_select);
        $rows=$result->fetch_assoc();
        if($result->num_rows>0){
            echo"number of rows is greater than 0";
            //header("location:registerAdmin.php");   
        }
        else{
            if($password==$cpassword){
                $sql_insert="INSERT INTO `admindetails`( `firstName`, `secondName`, `email`, `password`, `position`, `authorisingAdmin`) VALUES ('$fname','$sname','$email','$password','$position','$adminAth')";
                if($conn->query($sql_insert)===TRUE){
                    header("location:../loginpage.php");   
                    echo "data inserted";
            }else{
                echo"Error".$conn->error;
                //header("location:registerAdmin.php");   
                
            }
        }
    }
?>

