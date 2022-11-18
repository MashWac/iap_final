<?php
include("adminsidemenu.php");
?>
<!DOCTYPE html>
<head>
    <title>upload</title>
    <meta charset="utf-8">
    <link href="/styles/adminstyle.css" rel="stylesheet" type="text/css">   
<?php
$update=false;
?>  
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
            <form action="<?php echo base_url("/AdminSubCats/updatesubcat")?>" method="POST" enctype="multipart/form-data">
                <fieldset>
                <?php foreach ($subcats as $item):?>
                    <label for="cat-name">SUBCATEGORYID:</label>
                    <input type="text" name="catid" id="cateid" placeholder="Please Enter Catergory name" required value="<?=$item['subcategory_id']?>" ><br><br> 
                    <label for="cat-name">SUBCATEGORY Name:</label>
                    <input type="text" name="catnam" id="catname" placeholder="Please Enter Catergory name" required value="<?=$item['subcategory_name']?>" ><br><br> 
                    <label for="cat-image">SUBCATEGORY IMAGE:</label>
                    <input type="file" name="cat-image" id="catimage" required max-file-size="65536" value="<?=$item['subcategory_image']?>"><br><br>
                    <label for="cat-image">SUBCATEGORY BANNER:</label>
                    <input type="file" name="cat-ban" id="catimage" required max-file-size="65536" value="<?=$item['subcategory_banner']?>"><br><br>
                    
                    <input type="submit" name="createcat" value="Update">
                </fieldset>
                <?php endforeach; ?>

             </form>
            <?php else:?>
            <form action="<?php echo base_url("/AdminSubCats/insertsubcat")?>" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <label for="cat-name">SUBCATEGORY Name:</label>
                    <input type="text" name="catnam" id="catname" placeholder="Please Enter Catergory name" required ><br><br> 
                    <label for="cat-image">SUBCATEGORY IMAGE:</label>
                    <input type="file" name="cat-image" id="catimage" required max-file-size="65536"><br><br>
                    <label for="cat-ban">SUBCATEGORY BANNER:</label>
                    <input type="file" name="cat-ban" id="catimage" required max-file-size="65536"><br><br>
                    
                    <input type="submit" name="createcat" value="Save">
                </fieldset>
             </form>
        <?php endif;?>

        </div>
    </div>
</body>
</html>
