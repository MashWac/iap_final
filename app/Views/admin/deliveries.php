<?php
require("../conn.php");
session_start();       
$sql_select= "SELECT * FROM `deliverydetails`;";
$result=$conn->query($sql_select);
?>
<!DOCTYPE html>
<html>
<head>
    <title>DeliveryDetails</title>
    <meta charset="utf-8">
    <link href="../style/adminstyle.css" rel="stylesheet" type="text/css">
   
</head>
<body>
    <!---ionicons--->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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
    <h2> OUR DELIVERIES</h2>
    <table id=tableadmin cellpadding="10">
        <thead>
        <tr>
        <th>deliveryID</th>
        <th>OrderID</th>
        <th>Delivery Address</th>
        <th>City</th>
        <th>Telephone</th>
        <th>Current Status</th>
        <th>Change Status</th>
</tr>
</thead>
<?php
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){            
        ?>
        <tr>
        <td>
        <?php
        echo $row['deliveryID'];?>
        </td>
        <td>
        <?php
        echo $row['orderID'];?>
        </td>
        <td>
        <?php
        echo $row['deliveryAddress'];?>
        </td>
        <td>
        <?php
        echo $row['City'];?>
        </td>
        <td>
        <?php
        echo $row['telephone'];?>
        </td>
        <td>
        <?php
        echo $row['deliveryStatus'];?>
        </td>
        <td>
        <a href="../conn.php?edit5=<?php echo $row['deliveryID'];?>">
        <button type="button" class="btnEdit"> <ion-icon name="create-outline" class="editicon"></ion-icon> Change to delivered</button>
        </a>
        </td>
        </tr>
        <?php
        }
    }
    else{
        header("location:adminHome.php");
        echo"Error".$conn->error."<br><br>";
        
    }   
    ?>
</table> 
</div>
</div>

</body>
</html>
