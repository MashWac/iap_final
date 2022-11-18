<?php include('adminsidemenu.php'); 

?>
<!DOCTYPE html>
<head>
    <title>Productlisting</title>
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
    <h2> PRODUCTS CURRENTLY SAVED ON DATABASE</h2><br>
    <div id="filters">
        <div id="searchboxcrit">
            <input type="text" name="searchitem" id="search_item" placeholder="search...">
            <button id="searching_butt" name="searchbutt"><ion-icon name="search-outline"></ion-icon></button>
        </div>
        <div>
        <a href="/DisplayProds/editPage/<?="add"?>">
            <button class="adminaddsfilter" id="addprods" name="add_prods">ADD NEW PRODUCT<ion-icon class="icons" name="shirt"></ion-icon></button>
        </a>
        </div>
        <form action="Displayprods/filterproducts"  method="POST">

        <ul id=filteropts>
        <h4 id="selby">Filter by:</h4>
            <li>
            <label for="select-subcato">ID:</label>
            <select name="select-id" id="selectid">
                    <optgroup label="product ID">
                    <option selected>None</option>
                    <option selected>Ascending</option>
                    <option>Descending</option>
                    </optgroup>
                </select>
            </li>
            <li>
                <label for="select-prod">product:</label>
                <input type="text" name="select-prod" id="select-prod" list="prodselect">
                <datalist id="userselect">
                    <option>Suite<option>
                    <option>Jeans<option>
                    <option>watch<option>
                    <option>Ken<option>
                    <option>Sally<option>
                </datalist>
            </li>
            <li>
            <label for="select-cato">Category:</label>
                <select name="select-cato" id="selectcato">
                    <optgroup label="category">
                    <option selected>None</option>
                    <option>Men</option>
                    <option>Women</option>
                    <option>Children</option>
                    <option>Pets</option>
                    </optgroup>
                </select>
            </li>
            <li>
            <label for="select-subcato">Subcategory:</label>
            <select name="select-subcato" id="selectsubcato">
                    <optgroup label="Sub category">
                    <option selected>None</option>
                    <option>Formal</option>
                    <option>Casual</option>
                    <option>Sporty</option>
                    </optgroup>
                </select>
            </li>
            <li>               
                <label for="select-quantity">Quantity:</label>
                <select name="select-quantity" id="selectquantity">
                    <option selected>None</option>
                    <option>Ascending</option>
                    <option>Descending</option>
                </select>
                </li>
            <li>
            <li>               
                <label for="select-price">Price:</label>
                <select name="select-price" id="selectprice">
                    <option selected>None</option>
                    <option>Ascending</option>
                    <option>Descending</option>
                </select>
            </li>
            <li>               
                <label for="select-sales">Sales:</label>
                <select name="select-sales" id="selectsales">
                    <option selected>None</option>
                    <option>Ascending</option>
                    <option>Descending</option>
                </select>
            </li>
            <li>               
                <button type='submit' name='filter_submit'>Submit filter</button>
            </li>
            
        </ul>
        </form>
    </div>
    <div id="table">
    <table class="tableadmin">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subcategory</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($prods as $item) : ?>
            <tr>
                <td><?= $item['product_id'] ?></td>
                <td><?= $item['product_name'] ?></td>
                <td><?= $item['product_description'] ?></td>
                <td><?= $item['unit_price'] ?></td>
                <td><?= $item['available_quantity'] ?></td>
                <td><?= $item['subcategory_name'] ?></td>
                <td>
                    <img src='<?="../upload/".$item['product_image']?>' class="cardadmincatsImg" alt="Image" height="100px" width="100px">
                </td>
                <td>
                    <a href="/DisplayProds/editPage/edit/<?= $item['product_id']?>">
                    <button type="button" class="btn btn-danger"><ion-icon name="create-outline"></ion-icon>Edit</button>
                    </a><br>
                    <a href="<?= base_url('AdminsController/delete/'.$item['product_id'])?>">
                    <button type="button" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon>Delete</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $pager->links(); ?>
    </div>
</div>
<!---ionicons--->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
