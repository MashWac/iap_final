<?php
include('header.php');
?>
    <div id="mainbodyReg">
        <div id="Regcontent"> 
            <?php if(SESSION()->has('errors')):?>
                <div class="alert alert-warning">
                    <?php
                    foreach (SESSION('errors') as $error):
                        ?>
                        <li><?php echo $error ?></li>
                    <?php
                    endforeach;?>
                </div>
            <?php endif;?>
        <div id="formbody">
            <h3>Create an account</h3>
            <form name="regForm" id="registration_form" method="POST" action="Register/store">
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
                             <label for="passw">Password:</label>
                             <input type="password" id="passw" name="password" required><br><br>
                        </div>
                        <div class="inputfield">
                            <label for="conpass"> Confirm Password:</label>
                            <input type="password" id="conpassw" name="conpassword" required><br><br>
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
        </div>
        <div id=alreadymember>
            <h2>Already a member?</h2>
            <a href="/Login/">
            <input type="submit" id="submit_login" name="log" value="LOGIN" class="button">
        </a>
        </div>
    </div>
    </div>
    <script>
    if ($("#registration_form").length > 0) {
        $("#registration_form").validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                },
                surname: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                },
                emailaddress: {
                    email: true,
                    required: true,
                    minlength: 11,
                    maxlength: 50,
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 255
                },
                // conpassword: {
                //     required: true,
                //     equalTo: 'password'
                // },
                gender: {
                    required: true,
                }
            },

            messages: {
                fname: {
                    required: "Field is required",
                    minlength: "Minimum length 3 characters",
                    maxlength: "Maximum length 20 characters"
                },
                lname: {
                    required: "Field is required",
                    minlength: "Minimum length 3 characters",
                    maxlength: "Maximum length 20 characters"
                },
                email: {
                    email: "Invalid email",
                    required: "Field is required",
                    maxlength: "Maximum length 50 characters",
                },
                password: {
                    required: "Field is required",
                    minlength: "Minimum length 8 characters",
                    maxlength: "Maximum length 255 characters"
                },
                conpassword: {
                    required: "Field is required",
                    equalTo: 'password'
                },
                gender: {
                    required: "Field is required",
                }
            },
        })
    }
</script>

<script> 
$(document).ready(function()) {
    $('#registration_form').submit(function (event) {
        event.preventDefault();
        var fname=$("input#firstname").val();
        var sname=$("input#surname").val();
        var email=$("input#emailaddress").val();
        var password=$("input#password").val();
        var gender=$("input#selgender").val();

        $.ajax({
            url:"<?php echo site_url('Register/store');?>",
            type:"POST",
            data:{fname:fname,sname:sname,email:email,password:password,gender:gender},
            success: function (data){
                if(data==1){
                    alert('registration successful');
                }
                else{
                    alert("error");
                }
                
            }
        })
        
    })
    
})
    <?php include('footer.php')?>