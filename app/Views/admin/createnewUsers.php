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
        <div id="formbody">
            <?php if($formtype==="edittype"):?>
            <h3>Update an account</h3>
            <form name="regForm" id="registration_form" method="POST" action="<?php echo base_url("/DisplayUsers/update")?>">
                <?php foreach($user as $person):?>
                <fieldset>
                    <legend> Update</legend>
                    <div class="inputfield">
                        <label for="fname">First Name:</label>
                        <input type="text" id="fname" name="firstname" class="inputfield" value="<?=$person['first_name']?>"><br><br>
                     </div>
                     <div class="inputfield">
                         <label for="sname">Surname Name:</label>
                         <input type="text" id="sname" name="surname" class="inputfield" required value="<?=$person['last_name']?>"><br><br>
                        </div>
                        <div class="inputfield">
                            <label for="emailadd">Email Address:</label>
                            <input type="email" id="emailadd" name="emailaddress" required value="<?=$person['email']?>"><br><br>
                         </div>
                         <div class="inputfield">
                            <label for="select-user">Roles:</label>
                            <input type="number" name="select-role" id="select-role" list="roleselect" value="<?=$person['role_id']?>">
                            <datalist id="roleselect">
                                <?php foreach($roles as $item):?>
                                <option value="<?=$item['role_id']?>"><?=$item['role_name']?><option>
                                <?php endforeach?>
                            </datalist>
                        </div>
                        <div class="inputfield">
                            <?php if($person['gender']=="male"):?>
                            <label> Gender:</label>
                            <label for="genderm"> Male:</label>
                            <input type="radio" id="genderm" name="selgender" value="Male" required checked>
                            <label for="genderf"> Female:</label>
                            <input type="radio" id="genderf" name="selgender" value="Female" required><br><br>
                            <?php else:?>
                                <label> Gender:</label>
                            <label for="genderm"> Male:</label>
                            <input type="radio" id="genderm" name="selgender" value="Male" required >
                            <label for="genderf"> Female:</label>
                            <input type="radio" id="genderf" name="selgender" value="Female" required checked><br><br>
                        </div>
                        <?php endif;?>
                        <input type="submit" id="submit_registration" name="register" value="UPDATE" class="button">
                        <div class="inputfield">
                            <input type="email" id="userid" name="user-id" required value="<?=$person['user_id']?>" hidden readonly><br><br>
                         </div>
                </fieldset>
                <?php endforeach?>
            </form>
            <?php else:?>
                <h3>Create an account</h3>
            <form name="regForm" id="registration_form" method="POST" action="<?php echo base_url("/DisplayUsers/store")?>">
                <fieldset>
                    <legend> Register</legend>
                    <div class="inputfield">
                        <label for="fname">First Name:</label>
                        <input type="text" id="fname" name="firstname" class="inputfield" ><br><br>
                     </div>
                     <div class="inputfield">
                         <label for="sname">Surname Name:</label>
                         <input type="text" id="sname" name="surname" class="inputfield" required><br><br>
                        </div>
                        <div class="inputfield">
                            <label for="emailadd">Email Address:</label>
                            <input type="email" id="emailadd" name="emailaddress" required><br><br>
                         </div>
                         <div class="inputfield">
                            <label for="select-user">Roles:</label>
                            <input type="number" name="select-role" id="select-role" list="roleselect">
                            <datalist id="roleselect">
                                <?php foreach($roles as $item):?>
                                <option value="<?=$item['role_id']?>"><?=$item['role_name']?><option>
                                <?php endforeach?>
                            </datalist>
                        </div>
                        <div class="inputfield">
                            <label> Gender:</label>
                            <label for="genderm"> Male:</label>
                            <input type="radio" id="genderm" name="selgender" value="Male" required>
                            <label for="genderf"> Female:</label>
                            <input type="radio" id="genderf" name="selgender" value="Female" required><br><br>
                        </div>
                        <input type="submit" id="submit_registration" name="register" value="REGISTER" class="button">
                </fieldset>
            </form>
            <?php endif;?>
        </div>
        </div>
    </div>
</body>
</html>
