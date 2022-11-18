<?php include('header.php');
?>

<div id="Logincontent"> 
            <div id="loginformbody">
            <h3>Welcome Back. we've missed you!</h3>
            <form action="Login/signin" method="POST">
                <fieldset>
                    <legend> Login</legend>
                    <div class="inputfield">
                        <label for="emailadd">Email Address:</label>
                        <input type="email" id="emailadd" name="email_address" required><br><br>
                    </div>
                    <div class="inputfield">
                        <label for="passw">Password:</label>
                        <input type="password" id="passw" name="pass_word" required><br><br>
                    </div>
                        <input type="submit" id="submit_login" name="login" value="LOGIN" class="button">
                </fieldset>
            </form>
        </div>
    </div>
<?php include('footer.php')?>
