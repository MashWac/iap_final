<?php
include("adminsidemenu.php");
?>
<!DOCTYPE html>
<head>
    <title>upload</title>
    <meta charset="utf-8">
    <link href="/styles/adminstyle.css" rel="stylesheet" type="text/css">   
 
</head>
<body>
<div id="displayusername">
        <?php include("displayusernameadmin.php");?>
</div>
    <div id="mainbody">
        <?php 
        if(session()->getFlashdata('status')){
            echo "<h5>".session()->getFlashdata('status')."</h5>";
        }
        ?>
        <div id="editform">
        <?php if($formtype==="edittype"):?>
            <form action="/updatecat" method="POST" enctype="multipart/form-data">
                <fieldset>
                <?php foreach ($cats as $item):?>
                    <label for="cat-id">Category ID:</label>
                    <input type="text" readonly name="cat-id" id="cateid" required value="<?=$item['category_id']?>"><br><br>
                    <label for="cat-name">Category Name:</label>
                    <input type="text" name="catnam" id="catname" placeholder="Please Enter Catergory name" required value="<?=$item['category_name']?>"><br><br> 
                    <label for="cat-image">CATEGORY BANNER:</label>
                    <input type="file" name="cat-ban" id="cat-image" required max-file-size="65536" selected="<?=$item['categoryImage']?>"><br><br>
                    
                    <input type="submit" name="createcat" value="Update">
                </fieldset>
                <?php endforeach; ?>
             </form>
        <?php else:?>
            <form action="<?php echo base_url("/Admincats/insertcat")?>" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <label for="cat-name">Category Name:</label>
                    <input type="text" name="catnam" id="catname" placeholder="Please Enter Catergory name" required ><br><br> 
                    <label for="cat-image">CATEGORY BANNER:</label>
                    <input type="file" name="cat-ban" id="catimage" required max-file-size="65536"><br><br>
                    
                    <input type="submit" name="createcat" value="Save">
                </fieldset>
             </form>
        <?php endif;?>


        </div>
    </div>
</body>
</html>
