<?php
require("../conn.php");
session_start();
      
$sql_select= "SELECT * FROM `productdetails`;";
$result=$conn->query($sql_select);
$rows=$result->fetch_assoc();
$productName='';
$productID='';
$productDescription='';
$productQuantity='';
$productPrice='';
$productImage='';
$update=false;
 
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true; 
    $result=$conn->query("SELECT * FROM `productdetails` WHERE productID='$id'")or die(mysqli_connect_error());
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        $productName=$row['productName'];
        $productID=$row['productID'];
        $productDescription=$row['productDescription'];
        $productQuantity=$row['productQuantity'];
        $productPrice=$row['productPrice'];
        $productImage=$row['productImage'];

    }
}
?>
<!DOCTYPE html>
<head>
    <title>upload</title>
    <meta charset="utf-8">
    <link href="../style/styling.css" rel="stylesheet" type="text/css">
   
</head>
<body>
    
    <header>
        <div class="container">
        <a href="../homepage.php">
                    <img class="logo" src="../logo.png" alt="logo" height="80">
                </a> 
    <nav> <ul>
		<li><a href="adminHome.php">HOME</a></li>
		<li><a href="clientDetails.php">Clients</a></li>
        <li><a href="deliveries.php">Deliveries</a></li>
        <li><a href="order.php">Orders</a></li>
        <?php
            if(!ISSET($_SESSION['logged'])):?>
                <li><a href="../loginpage.php">
                     <input type="submit" id="adminlog" name="adminLogin" value="Login" class="button">
            </a>
         </li>
        <?php else:?>
            <div id="userpanel">
            <div id="uname" onclick="userpaneToggle();">
        <li><ion-icon name="person-circle-outline" size="large"></ion-icon>
        <?php echo $_SESSION['email'];?> 
        <ion-icon class="dropdown" name="caret-down-outline"></ion-icon>
    </li>
        </div>
        <div class="dropdownoptions">
            <div id="displayuserdetails">
            <?php echo $_SESSION['fname']." ".$_SESSION['sname'];?>
            </div>
            <ul>
                <li>
            <div id=useroption1>
            <a class="uoption" href="../editdetails.php?edit1=<?php echo $_SESSION['id'];?>">
            <ion-icon name="create-outline" class="editicon"></ion-icon> Edit Profile
            </a>
            </div>
            </li>
            <li>
            <div id=useroption2>
            <a class="uoption"href="../logout.php"><ion-icon name="log-out-outline"></ion-icon> Logout
            </a> 
            </div>
        </li>
        </ul>
        </div>
        </div>
        <?php endif;?> 
    </ul>	
</nav>
</div>
</header>
<div id="mainbody">
    <form action="process_upload.php" method="POST" enctype="multipart/form-data">
    <fieldset>
    <label for="fooditem">Product Name:</label>
    
    <input type="text" name="fooditem" placeholder="Food item name" required value=<?php echo $productName?>><br><br>
    
    <label for="food-image">Image:</label>
    <input type="file" name="food-image" id="foodimage"required max-file-size="65536"><br><br> 
    <label for="description">Food description:</label>
    <input type="textbox" rows="4" cols="200" id="descript" name="description" placeholder="Food description" required value=<?php echo $productDescription;?> ><br><br>
    <label for="foodprice">Price:</label>
    <input type="number" id="f-price" name="foodprice" placeholder="Food price" value=<?php echo $productPrice;?> required><br><br>
    <label for="foodID">Product ID:</label>
    <?php if($update==true):?>
    <input type="number" readonly id="fID" name="foodID" placeholder="food ID" value=<?php echo $productID;?> required><br><br>
    <?php else:?>
        <input type="number" id="fID" name="foodID" placeholder="food ID" value=<?php echo $productID;?> required><br><br>
    <?php endif;?>

    <label for="foodquantity">Quantity:</label>
    <input type="number" id="foodQuan" name="foodquantity" placeholder="food Quantity" value=<?php echo $productQuantity;?> required><br><br>
    <?php if($update==true):?>
        <input type="submit" name="updateinfo" value="UPDATE">
    <?php else:?>
    <input type="submit" name="submitImage" value="SAVE">
    <?php endif;?>
    </fieldset>
</form>
</div>

    <div id="footer">
        <div id="footercontent">
            
        <div id="contactinfo">
            <h4>Contact us on:</h4>
            <p>Tel: 0764535383</p>
            <p>Email:simplycandy@email.com</p>

        </div>
        <div id="address">
            <p>We're located at</p>
            <p>Address: 8th floor Three Towers, Nairobi ,Kenya.</p>
            <p>Opening hours 8am-5pm</p>
        </div>
    </div>
        <div id="footer-bottom">
            &copy; simplycandy.com | Designed by Macharia Wachira
        </div>
    </div>
</div>
</body>
</html>
