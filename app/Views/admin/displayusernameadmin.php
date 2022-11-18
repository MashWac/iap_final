<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
    <link href="/styles/sidemenustyle.css" rel="stylesheet" type="text/css">
    <script src="/JS/Main.js"></script>
</head>
<body>
<?php if(ISSET($_SESSION['logged'])):?>
    <a>
        <div id="adminpanele">
            <div id="userpanel" class=userpane>
                <div id="uname" onclick="userpaneToggle();">
                    <ion-icon name="person-circle-outline" size="large"></ion-icon>
                    <?php echo $_SESSION['email'];?> 
                    <ion-icon class="dropdown" name="caret-down-outline"></ion-icon>
                </div>
                <div class="dropdownoptions">
                    <div id="displayuserdetails">
                        <?php echo $_SESSION['userName'];?>
                    </div>
                    <ul>
                        <li>
                            <div id=useroption1>
                                <a class="uoption" href="editdetails.php?edit=<?php echo $_SESSION['user_id'];?>">
                                <ion-icon name="create-outline" class="editicon"></ion-icon> Edit Profile
                                </a>
                            </div>
                        </li>
                         <li>
                            <div id=useroption2>
                                <a class="uoption" href="myorders.php?orders=<?php echo $_SESSION['user_id'];?>">
                                <ion-icon name="basket" class="ordersbasket"></ion-icon> View Orders
                                </a>
                            </div>
                        </li> 
                        <li>
                            <div id=useroption3>
                                <a class="uoption"href="/logout"><ion-icon name="log-out-outline"></ion-icon> Logout
                                </a> 
                            </div>
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
        <?php endif;?> 
</a>
    
</body>