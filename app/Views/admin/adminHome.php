<?php
 include("adminsidemenu.php");
?>
<!DOCTYPE html>
<head>
    <title>Admin Home</title>
    <meta charset="utf-8">
    <link href="/styles/adminstyle.css" rel="stylesheet" type="text/css">   
</head>
<body>
<div id="displayusername">
        <?php include("displayusernameadmin.php");?>
</div>
<div id="mainbody">
    
    <div id="adminHome">
    <section>
        <h1> Welcome back</h1>
        <div class="Accordion">
        <h2>What would you like to do today?</h2>
        <div class=Accorcionitem id="option1">

            <a class="accordionlink" href=#option1>View clients
                <ion-icon class=ion-icon name="add-outline"></ion-icon>
                <ion-icon class=ion-icon name="remove"></ion-icon>
            </a>
            <div class="answer">
                <p>View a list of the clients registered on the database.<br><br>   <a href="clientDetails.php">
            <input type="submit" id="gotoclients" name="goclients" value="View Clients" class="buttonadminHome">
        </a></p>
            </div>
        </div>
        <div class=Accorcionitem id="option2">
            <a class="accordionlink" href=#option2>View orders
                <ion-icon class=ion-icon name="add-outline"></ion-icon>
                <ion-icon class=ion-icon name="remove"></ion-icon>
            </a>
            <div class="answer">
                <p>View a list of the all orders.<br><br>   <a href="/displayorders">
            <input type="submit" id="gotoorder" name="goorders" value="View Orders" class="buttonadminHome">
        </a></p>
            </div>
        </div>
        <div class=Accorcionitem id="option4">
            <a class="accordionlink" href=#option4>View Products
                <ion-icon class=ion-icon name="add-outline"></ion-icon>
                <ion-icon class=ion-icon name="remove"></ion-icon>
            </a>
            <div class="answer">
                <p>View a list all of the products.<br><br>   <a href="productlisting.php">
            <input type="submit" id="gotoproducts" name="goproducts" value="View Products" class="buttonadminHome">
        </a></p>
            </div>
        </div>
        <div class=Accorcionitem id="option5">
            <a class="accordionlink" href=#option5>Register new admin
                <ion-icon class=ion-icon name="add-outline"></ion-icon>
                <ion-icon class=ion-icon name="remove"></ion-icon>
            </a>
            <div class="answer">
                <p>Register a new Admin.<br><br>  
                 <a href="registerAdmin.php">
                     <input type="submit" id="gotoregisteradmin" name="goregadmin" value="RegisterAdmin" class="buttonadminHome">
                    </a>
                </p>
            </div>
        </div>
     </div>
</section>
    </div> 
</div>
</div>
<!---ionicons--->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
