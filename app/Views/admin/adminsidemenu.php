<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>dashboard</title>
    <link href="/styles/sidemenustyle.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js" integrity="sha256-xH4q8N0pEzrZMaRmd7gQVcTZiFei+HfRTBPJ1OGXC0k=" crossorigin="anonymous"></script>


</head>
<body>
<header>
        <div class="container">
        <nav class="main-menu">
            <ul>
                <li>
                    <a class="active" href="<?php echo base_url("adminHome/")?>">
                        <ion-icon class="icons" name="home"></ion-icon>
                        <span class="nav-text">Home</span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="<?php echo base_url("/displayusers")?>">
                    <ion-icon name="people"></ion-icon>
                    <span class="nav-text">View Users</span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="<?php echo base_url("/displayprods")?>">
                    <ion-icon name="shirt"></ion-icon>
                    <span class="nav-text">View Products</span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="#">
                    <ion-icon name="bar-chart-sharp"></ion-icon>
                    <span class="nav-text">View analytics</span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="<?php echo base_url("/adminCats")?>">
                    <ion-icon class="icons" name="folder-open"></ion-icon>
                    <span class="nav-text">Edit Categories</span>
                    </a>
                </li>
            </ul>
            <ul class="logout">
                <li>
                    <a href="<?php echo base_url("/logout")?>">
                        <ion-icon class="icons" name="exit"></ion-icon>
                        <span class="nav-text">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
</div>
</script>
<!---ionicons--->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

