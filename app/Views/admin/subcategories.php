<?php
include("adminsidemenu.php");
?>
<!DOCTYPE html>
<head>
    <title>Subcategory</title>
    <meta charset="utf-8">
    <link href="/styles/adminstyle.css" rel="stylesheet" type="text/css">   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Zen+Antique&display=swap" rel="stylesheet">
    <link href="/styles/adminstyle.css" rel="stylesheet" type="text/css">   
</head>
<body>
<div id="displayusername">
        <?php include("displayusernameadmin.php");?>
</div>
    <div id="mainbody">
    <div class=addnewCategories>
        <!---- button for adding Subcats --->
        <div>
        <a href="<?php echo base_url('AdminSubCats/editCat/add')?>">
            <button class="adminadds" id="addprods" name="add_prods">Add New Subcategory</button>
        </a>
        </div>
    </div>

    <div class="adcategories">
        <?php foreach($subcats as $item):?>
    <div class="bannercat text-white">
        <div class="imagecate">
            <img src="/upload/<?=$item['subcategory_banner']?>" class="cardadmincatsImg" alt="Image" height="240px" width="700px">
        </div>
        <div  class="textcate">
                <h3 class="card-title"><?=$item['subcategory_name']?></h3>
                <div id="possibleactions">
                    <ul>
                        <li><a href="/displayprods">Explore Subategory</a></li>
                        <li><a href="<?php echo base_url("AdminSubCats/editCat/edit/".$item['subcategory_id'])?>"> Edit Subcategory</a></li>
                        <li><a href="">Delete Subcategory</a></li>

                    </ul>
                </div>
        </div>
    </div>
    <?php endforeach; ?>
    </div>
    
    </div> 
</div>
</div>
<script>
    $(document).ready(function(){
    $(".bannercat").hover(function() {
        $(this).find(".imagecate").fadeOut(500);},function() {
        $(this).find(".imagecate").fadeIn(500); 
    });
});

</script>
<!---ionicons--->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
