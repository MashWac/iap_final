<?php include('header.php') ?>
<div id="mainbody">
    <div id="editprofpage">
    <?php foreach ($user as $row): ?>
    <form action="/updatemydetails" method="POST" class="editingprof">
     <fieldset>
         <legend> Edit Profile</legend>
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="firstname" placeholder="First Name" required value=<?= $row['first_name']?>><br><br>
    <label for="sname">Second Name:</label>
    <input type="text" id="sname" name="secondname" placeholder="Second Name" required value=<?= $row['last_name']?> ><br><br>
    <label for="emailadd">Email Address:</label>
    <input type="email" id="emailadd" name="emailaddress" required value=<?= $row['email']?>><br><br>
    <label for="pass">Old Password:</label>
    <input type="password" id="pass" name="password" placeholder="Password" value=<?= $row['password']?> required><br><br>
    <label for="cpass">New Password:</label>
    <input type="password" id="cpass" name="cpassword" placeholder="Confirm Password" value=<?= $row['password']?> required><br><br>

    <button type="submit" class="btn btn-success">Update My Details</button>

    <a href="/deleteaccount">
    <button type="button" class="btn btn-danger">Delete Account</button>
    </a>
    </fieldset>
    </form>

<?php endforeach;?>
<div id="pricingdetails" class="editingprof">
    <h2>Wallet balance:</h2>
    <h4><?php echo $_SESSION['wallet_balance']?>KSH</h4>
    <form action="/managewallet" method="POST">
        <input type="number" placeholder="Enter Amount" name="amountchange"><br><br>
        <button type="submit" class="btn btn-primary" name="deposit" value="deposit">Deposit</button>
        <button type="submit" class="btn btn-secondary" name="withdraw" value="withdraw">Withdraw</button>
    </form>
</div>
    </div>
</div>
<?php include('footer.php')?>


