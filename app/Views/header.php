<!DOCTYPE html>
<html>
     <head>
         <title><?= $meta_title?></title>
         <meta charset="utf-8">
         <link href="/styles/style.css" rel="stylesheet" type="text/css">
         <script src="/JS/Main.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
         <link rel="preconnect" href="https://fonts.googleapis.com">
         <link rel="preconnect" href="https://fonts.googleapis.com">
         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
         <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Zen+Antique&display=swap" rel="stylesheet">
         <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js" integrity="sha256-xH4q8N0pEzrZMaRmd7gQVcTZiFei+HfRTBPJ1OGXC0k=" crossorigin="anonymous"></script>
         <script src="/JS/Main.js"></script>
         <style>
        .error {
            width: 100%;
            margin-top: .25rem;
            font-size: .875em;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <header>
        <div id="navsec">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/Homepage"><img class="logo" src="/assets/AF.png" alt="logo" height="80" width="80"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Homepage">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="/aboutus" >
          About Us
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/shipping" >
          Shipping
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/refunds">
          Refunds
        </a>
      </li>
      <?php if(!((session()->get('logged')))):?>
      <li class="nav-item dropdown"><a href="/Register/">
      <button type="button" class="btn btn-secondary">Login/SignUp</button></a>
      </li>
      <?php else:?>
        <li class="nav-item dropdown"><a class="nav-link " href="<?php echo base_url("/cart")?>">
            <span id="cartdetails">Cart<ion-icon name="cart" size="medium"></ion-icon></span>
            <?php if(isset($_SESSION['cart'])){
                $count=count($_SESSION['cart']);
                echo"<span id=cartCount>$count</span>";
            }else
             echo"<span id=cartCount>0</span>"
            ?>
            </a>     
      </li>
        <li class="nav-item dropdown">
            
            <div id="userpanel" class="userpane">
                <div id="uname" onclick="userpaneToggle();">
                <span >
                <?php echo $_SESSION['email'];?></span>
                <ion-icon name="person-circle-outline" size="large"></ion-icon>    
            <ion-icon class="dropdown" name="caret-down-outline"></ion-icon>
        </div>
        <div class="dropdownoptions">
            <div id="displayuserdetails">
            <?php echo $_SESSION['userName'];?><br><br>
            <p id='walletinfo'>Wallet balance:<br> <?php echo $_SESSION['wallet_balance']?> Ksh</p>
            </div>
            <ul>
                <li>
            <div id=useroption1>
            <a class="uoption" href="/editprofile">
            <ion-icon name="create-outline" class="editicon"></ion-icon> Edit Profile
            </a>
            </div>
            </li>
            <li>
            <div id=useroption2>
            <a class="uoption" href="/editprofile">
            <ion-icon name="wallet" class="orderwallet"></ion-icon></ion-icon> Manage wallet
            </a>
            </div>
            </li>
            <li>
            <div id=useroption3>
            <a class="uoption" href="/vieworders">
            <ion-icon name="basket" class="ordersbasket"></ion-icon> View Orders
            </a>
            </div>
            </li> 
            <li>
            <div id=useroption4>
            <a class="uoption"href="/logout"><ion-icon name="log-out-outline"></ion-icon> Logout
            </a> 
            </div>

        </li> 
        </ul>
        </div>
        </div>
        </li>
        <?php endif;?>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
                </div>
    </header>