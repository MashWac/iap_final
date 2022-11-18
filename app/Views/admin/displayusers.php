<?php
require('adminsidemenu.php');
?>
<!DOCTYPE html>
<head>
    <title>ClientDetails</title>
    <meta charset="utf-8">
    <link href="/styles/adminstyle.css" rel="stylesheet" type="text/css">
   
</head>
<body>
<div id="displayusername">
        <?php include("displayusernameadmin.php");?>
</div>
<div id="mainbody">
    <h2>OUR CLIENTS</h2>
    <div id="filters">
        <div id="searchboxcrit">
            <input type="text" name="searchitem" id="search_item" placeholder="search...">
            <button id="searching_butt" name="searchbutt"><ion-icon name="search-outline"></ion-icon></button>
        </div>
        <div>
        <a href="/DisplayUsers/editPage/<?="add"?>">
            <button class="adminaddsfilter" id="addprods" name="add_prods"><ion-icon name="person-add"></ion-icon> ADD NEW USER</button>
        </a>
        </div>
        <ul id=filteropts>
        <h4 id="selby">Filter by:</h4>
            <li>
                <label for="select-user">User:</label>
                <input type="text" name="select-user" id="select-user" list="userselect">
                <datalist id="userselect">
                    <option>Mary<option>
                    <option>John<option>
                    <option>Bob<option>
                    <option>Ken<option>
                    <option>Sally<option>
                </datalist>
            </li>
            <li>              
                <label for="select-price">Price:</label>
                <select name="select-price" id="selectprice">
                    <option selected>None</option>
                    <option>Ascending</option>
                    <option>Descending</option>
                </select>
                </li>
            <li>
            <label for="select-gender">Gender:</label>
            <select name="select-gender" id="selectgender">
                    <option selected>None</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </li>
            <li>
            <label for="select-utype">User Type:</label>
            <select name="select-utype" id="selectutype">
                    <option selected>None</option>
                    <option>Admin</option>
                    <option>Client</option>
                    <option>Employee</option>

                </select>
            </li>

        </ul>
    </div>
    <div id="table">
    <table class="tableadmin">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First Name </th>
            <th scope="col">Last Name</th>
            <th scope="col">Email </th>
            <th scope="col">Gender</th>
            <th scope="col">Role</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($users as $row):?>
            <tr>
                <td>
                    <?=$row['user_id']?>
                </td>
                <td>
                    <?=$row['first_name']?>
                </td>
                <td>
                    <?=$row['last_name']?>
                </td>
                <td>
                    <?=$row['email']?>
                </td>
                <td>
                    <?=$row['gender']?>
                </td>
                <td>
                    <?=$row['role_name']?>
                </td>
                <?php if($row['role_name']!="admin"):?>
                <td>
                    <a href="#>">
                        <button type="button" class="btn btn-success">Delete</button>
                    </a>
                    <br>
                    <a href="/DisplayUsers/editPage/edit/<?= $row['user_id']?>">
                    <button type="button" class="btn btn-danger">Update</button>
                    </a>  
                </td>
                <?php else: ?>
                    <td>
                    <a href="#">
                        <button type="button" class="btn btn-success">Delete</button>
                    </a>
                </td>
                <?php endif;?>

            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php echo $pager->links();?>
    </div>

</div>

<!---ionicons--->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
