<?php
include("adminsidemenu.php");
?>
<!DOCTYPE html>
<head>
    <title>Analytics</title>
    <meta charset="utf-8">
    <link href="/styles/adminstyle.css" rel="stylesheet" type="text/css">     
</head>
<body>
<div id="displayusername">
        <?php include("displayusernameadmin.php");?>
</div>
    <div id="mainbody">
        <div id="userinfochart">
            <h2>USER INFO</h2>
            <hr>
            <canvas id="Userchart" style="width:100%;max-width:700px"></canvas>
        </div>
        <div id="productinfochart">
            <h2>PRODUCT INFO</h2>
            <hr>
            <canvas id="productChart" style="width:100%;max-width:700px"></canvas>
        </div>
        <div id="purchaseinfochart">
            <h2>PURCHASE INFO</h2>
            <hr>
            <canvas id="purchasechart" style="width:100%;max-width:700px"></canvas>
        </div>
    </div>
</body>
</html>
