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
        <div id="editform">
        <?php if($formtype==="edittype"):?>
            <?php foreach ($product as $prod):?>
            <form action="/editprods" method="POST" name="prods_form"enctype="multipart/form-data">
                
                <fieldset>
                    <label for="prodID">Product ID:</label>
                    <input type="number" readonly id="prod_ID" name="prodID" value="<?=$prod['product_id']?>" ><br><br>
                    
                    <label for="proditem">Product Name:</label>
                    <input type="text" name="proditem" placeholder="Enter product name" required  value="<?=$prod['product_name']?>"><br><br>
                    <label for="prod-image">Image:</label>
                    <input type="file" name="prod-image" id="productimage"required max-file-size="65536" value="<?=$prod['product_image']?>"><br><br> 
                    <label for="description">Product description:</label>
                    <input type="textbox" rows="4" cols="200" id="descript" name="description" placeholder="Product description" required value="<?=$prod['product_description']?>"><br><br>
                    <label for="productprice">Price:</label>
                    <input type="number" id="product-price" name="productprice" placeholder="Product price"required value="<?=$prod['unit_price']?>"><br><br>
                    <label for="prodquantity">Quantity:</label>
                    <input type="number" id="prodQuan" name="prodquantity" placeholder="Product Quantity" required value="<?=$prod['available_quantity']?>"><br><br>
                    <label for="subcategory">Subcategory:</label>
                    <input type="number" name="subcategory" id="select-subcat" list="subselect">
                            <datalist id="subselect">
                                <?php foreach($subs as $item):?>
                                <option value="<?=$item['subcategory_id']?>"><?="category-".$item['category_name']."->".$item['subcategory_name']?><option>
                                <?php endforeach?>
                            </datalist>
                        </div>
                        <input type="submit" name="updateinfo" value="UPDATE">
                </fieldset>
                <?php endforeach; ?>
             </form>
             <?php else:?>
                <form action="/addprods" name="prods_form" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <label for="proditem">Product Name:</label>
                    <input type="text" name="proditem" placeholder="Enter product name" required><br><br>
                    <label for="prod-image">Image:</label>
                    <input type="file" name="prod-image" id="productimage" max-file-size="65536"><br><br> 
                    <label for="description">Product description:</label>
                    <input type="textbox" rows="4" cols="200" id="descript" name="description" placeholder="Product description" required ><br><br>
                    <label for="productprice">Price:</label>
                    <input type="number" id="product-price" name="productprice" placeholder="Product price" required><br><br>
                    <label for="prodquantity">Quantity:</label>
                    <input type="number" id="prodQuan" name="prodquantity" placeholder="Product Quantity" required><br><br>

                    <div class="inputfield">
                        <label for="subcategory">Subcategory:</label>
                            <input type="number" name="subcategory" id="select-subcat" list="subselect">
                            <datalist id="subselect">
                                <?php foreach($subs as $item):?>
                                <option value="<?=$item['subcategory_id']?>"><?="category-".$item['category_name']."->".$item['subcategory_name']?><option>
                                <?php endforeach?>
                            </datalist>
                        </div>





                    <input type="submit" name="submitImage" value="SAVE">
                </fieldset>
             </form>
             <?php endif;?>
        </div>
    </div>
</body>
</html>
