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
            <h2>ALL ORDERS</h2>
            <div id="filters">
        <div id="searchboxcrit">
            <input type="text" name="searchitem" id="search_item" placeholder="search...">
            <button id="searching_butt" name="searchbutt"><ion-icon name="search-outline"></ion-icon></button>
        </div>
        <ul id=filteropts>
        <h4 id="selby">Filter by:</h4>
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
     
        </ul>
    </div>

        <table id="tableadmin" cellpadding="10">
                <thead>
                    <tr>
                        <th>OrderID</th>
                        <th>Date</th>
                        <th>Order Amount</th>
                        <th>CustomerID</th>
                        <th>Payment type</th>
                        <th>Order Details</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $row):?>
                <tr>
                    <td><?= $row['order_id']?></td>
                    <td><?= $row['created_at']?></td>
                    <td><?= $row['order_amount']?></td>
                    <td><?= $row['customer_id']?></td>
                    <td><?= $row['paymenttype_name']?></td>
                <td>
                    <table id="tableadmin" cellpadding="10">
                        <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><?= $row['product_id']?></td>
                            <td> <?= $row['order_quantity']?> </td>
                            <td> <?= $row['product_price']?></td>
                            
                        </tr>
                </tbody>
                </table>

                </td>
                </tr>
                </tbody>
                <?php endforeach;?>
        </table> 
 </div>
