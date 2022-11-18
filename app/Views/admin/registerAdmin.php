<?php
require("../conn.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>registerAdmin</title>
    <meta charset="utf-8">
    <link href="../style/styling.css" rel="stylesheet" type="text/css">
   
</head>
<body>
    
    <header>
        <div class="container"> 
    <nav>
    <ul>
    <div id="logoImage">
        <a href="adminHome.php">
                    <img class="logo" src="../logo.png" alt="logo" height="80">
                </a> 
            </div>
		<li><a href="adminHome.php">Dashboard</a></li>
        <li><a href="adminDetails.php">Admins</a></li>
		<li><a href="clientDetails.php">Clients</a></li>
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
        </div>
        <div id="Regcontent"> <div id="formbody">
            <h3>Create an account</h3>
            <form action="insertAdmin.php" method="POST">
                <fieldset>
                    <legend> Register</legend>
                    <div class="inputfield">
                        <label for="fname">First Name:</label>
                        <input type="text" id="fname" name="first_name" class="inputfield" required><br><br>
                     </div>
                     <div class="inputfield">
                         <label for="sname">Surname Name:</label>
                         <input type="text" id="sname" name="surname_name" class="inputfield" required><br><br>
                        </div>
                        <div class="inputfield">
                            <label for="emailadd">Email Address:</label>
                            <input type="email" id="emailadd" name="email_address" required><br><br>
                         </div>
                         <div class="inputfield">
                             <label for="passw">Password:</label>
                             <input type="password" id="passw" name="pass_word" required><br><br>
                        </div>
                        <div class="inputfield">
                            <label for="conpass"> Confirm Password:</label>
                            <input type="password" id="conpassw" name="conpassword" required><br><br>
                        </div>
                        <div class="inputfield">
                        <label for="adminPosition">Position:</label>
                        <input type="text" id="adminPosition" name="adminPos" class="inputfield" required><br><br>
                     </div>
                     <div class="inputfield">
                         <label for="authorisingAdmin">Admin Authorising:</label>
                         <input type="text" id="authotisingAdmin" name="Autadmin" class="inputfield" required><br><br>
                        </div>


                        <input type="submit" id="submit_registration" name="register" value="REGISTER" class="button">
                </fieldset>
            </form>
        </div>
    
    </div>
</div>
    </body>
</html>