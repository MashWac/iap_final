<?php
require("../conn.php");
session_start();       
$sql_select= "SELECT * FROM `admindetails`;";
$result=$conn->query($sql_select);
?>
<!DOCTYPE html>
<html>
<head>
    <title>AdminDetails</title>
    <meta charset="utf-8">
    <link href="../style/adminstyle.css" rel="stylesheet" type="text/css">
   
</head>
<body>
    <!---ionicons--->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <header>
        <div class="container">
    <nav><ul>
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
    <h2> OUR ADMINISTRATORS</h2>
    <a href="registerAdmin.php">
            <input type="submit" id="new_add" name="newadd" value="ADD NEW ADMIN" class="button">
</a><br><br>

    <table id="tableadmin" cellpadding="10">
        <thead>
        <tr>
        <th>adminID</th>
        <th>First Name</th>
        <th>Surname Name</th>
        <th>Email</th>
        <th>position</th>
        <th>authorisingAdmin</th>
        <th>actionDelete</th>
</tr>
</thead>
<?php
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){            
        ?>
        <tr>
        <td>
        <?php
        echo $row['adminID'];?>
        </td>
        <td>
        <?php
        echo $row['firstName'];?>
        </td>
        <td>
        <?php
        echo $row['secondName'];?>
        </td>
        <td>
        <?php
        echo $row['email'];?>
        </td>
        <td>
        <?php
        echo $row['position'];?>
        </td>
        <td>
        <?php
        echo $row['authorisingAdmin'];?>
        </td>
        <td>
        <a href="../conn.php?delete1=<?php echo $row['adminID'];?>"><button type="button" class="btnDel">
            <ion-icon name="trash-outline" class="deleteicon"></ion-icon>DELETE</button>
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
</div>
</div>
</body>
</html>
