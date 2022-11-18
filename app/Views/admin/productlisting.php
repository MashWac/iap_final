<?php
require("../conn.php");
session_start();       
$sql_select= "SELECT * FROM `productdetails`;";
$result=$conn->query($sql_select);
?>
<!DOCTYPE html>
<head>
    <title>Productlisting</title>
    <meta charset="utf-8">
    <link href="../style/adminstyle.css" rel="stylesheet" type="text/css">
   
</head>
<body>
    
    <header>
        <div class="container">
    <nav> <ul>
    <div id="logoImage">
        <a href="adminHome.php">
                    <img class="logo" src="../logo.png" alt="logo" height="80">
                </a> 
            </div>
		<li><a href="adminHome.php">Dashboard</a></li>
        <li><a href="adminDetails.php">Admins</a></li>
		<li><a href="clientDetails.php">Clients</a></li>
        <li><a href="productlisting.php">Products</a></li>
        <li><a href="order.php">Orders</a></li>
        <li><a href="deliveries.php">Delieveries</a></li>
        <?php
            if(!ISSET($_SESSION['logged'])):?>
                <li><a href="../loginpage.php">
                     <input type="submit" id="adminlog" name="adminLogin" value="Login" class="button">
            </a>
         </li>
        <?php else:?>
            <div id="userpanel" onclick="userpaneToggle();">
            <div id="uname" >
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
    <h2> PRODUCTS CURRENTLY SAVED ON DATABASE</h2><br>
<a href="upload.php">
            <input type="submit" id="submit_login" name="log" value="ADD NEW PRODUCT" class="button">
</a>
<br><br>
    <table id="tableprods" cellpadding="10">
        <thead>
        <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Product Price</th>
        <th>Product Clicks</th>
        <th>Product Image</th>
        <th>Actions</th>
        
</tr>
</thead>
<?php
    if($result->num_rows>0){
        while($row=$result->fetch_assoc())

        {
            ?>

        <tr>
        <td>
        <?php
        echo $row['productID'];?>
        </td>
        <td>
        <?php
        echo $row['productName'];?>
        </td>
        <td width="30px">
        <?php
        echo $row['productDescription'];?>
        </td>
        <td>
        <?php
        echo $row['productPrice'];?>
        </td>
        <td>
        <?php
        echo $row['productClicks'];?>
        </td>
        <td>
        <?php echo '<img src="data:image;base64,'.base64_encode($row['productImage']).'"alt="prod" width="100" height= "100";">';?>
        </td>
        <td>
        <a href="../conn.php?delete2=<?php echo $row['productID'];?>">

        <ion-icon name="trash-outline" class="deleteicon"></ion-icon>
        </a>
        <a href="upload.php?edit=<?php echo $row['productID'];?>">
        <ion-icon name="create-outline" class="editicon"></ion-icon>
        </a>
        </td>
        </tr>
        <?php
        }
    }
    else{
        header("location:homepage.php");
        echo"Error".$conn->error."<br><br>";
        
    }   
    
    ?>
</table>
<br><br>
</div>
</div>
<!---ionicons--->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
