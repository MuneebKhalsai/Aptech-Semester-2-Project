<?php

include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="jquery-3.6.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Khand:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/index.css">
<style>
    body{background: linear-gradient(rgba(0,0,0,0.3)50%,rgba(0,0,0,0.3)50%),url('images/gallery/login-cover.jpg');background-size: cover;}
    .box1{background-color: #fff; padding: 25px; color: #333333; border-radius: 5px;}
    .box1 h1{font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;}
  .fa-eye:hover{cursor: pointer;}
</style>
</head>
<body>

    <br><br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-5">
                <div class="box1">
                    <h1>Sign Up</h1>
                    <br>
                    <form method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control my-input" id="floatingInputGrid" placeholder="name@example.com" name="firstname" required>
                        <label for="floatingInputGrid" style="font-weight: 500;">First Name</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="text" class="form-control my-input" id="floatingInputGrid" placeholder="name@example.com" name="lastname" required>
                        <label for="floatingInputGrid" style="font-weight: 500;">Last Name</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="text" pattern="(?=.*\d).{13,13}" class="form-control my-input" id="floatingInputGrid" placeholder="name@example.com" name="cnic" maxlength="13" minlength="13" required>
                        <label for="floatingInputGrid" style="font-weight: 500;">CNIC/B-Form No.</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="tel" pattern="(?=.*\d).{11,11}" class="form-control my-input" id="floatingInputGrid" placeholder="name@example.com" name="phone" maxlength="11" minlength="11" required>
                        <label for="floatingInputGrid" style="font-weight: 500;">Phone no.</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="email" class="form-control my-input" id="floatingInputGrid" placeholder="name@example.com" name="email" required>
                        <label for="floatingInputGrid" style="font-weight: 500;">Email</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="date" class="form-control my-input" id="floatingInputGrid" placeholder="name@example.com" name="dob" required>
                        <label for="floatingInputGrid">Date of Birth</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <select class="form-select my-input" aria-label="Default select example" name="gender" required>
                            <option selected>Select your gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="floatingInputGrid">Gender</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <select class="form-select my-input" aria-label="Default select example" name="city" required>
                            <option selected>Select your city</option>
                            <option value="Karachi">Karachi</option>
                            <option value="Lahore">Lahore</option>
                        </select>
                        <label for="floatingInputGrid">City</label>
                    </div>
                    <br>
                    <div class="input-group flex-nowrap form-floating">
                        <input type="password" class="form-control my-input" id="pass" onchange="Validate()" placeholder="name@example.com" aria-describedby="addon-wrapping" name="pwd" pattern="(?=.*\W)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <label for="floatingInputGrid" style="font-weight: 500;">Password</label>
                        <span class="input-group-text my-input" id="addon-wrapping">&nbsp;<i class="far fa-eye" id="togglePassword" title="Show password"></i>&nbsp;</span>
                    </div>
                    <span class="login-span">Password must be atleast 8 characters including capital and small alphabets, numbers and special characters.</span>
                    <br><br>
                    <div class="input-group flex-nowrap form-floating">
                        <input type="password" class="form-control my-input" id="c-pass" onchange="Validate()"  placeholder="name@example.com" aria-describedby="addon-wrapping" name="c-pwd" pattern="(?=.*\W)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <label for="floatingInputGrid" style="font-weight: 500;">Re-type Password</label>
                        <span class="input-group-text my-input" id="addon-wrapping">&nbsp;<i class="far fa-eye" id="togglePasswordc" title="Show password"></i>&nbsp;</span>
                    </div>
                    <!-- <div class="form-floating">
                        <input type="password" class="form-control my-input" id="floatingInputGrid" placeholder="name@example.com" name="pwd" required>
                        <label for="floatingInputGrid" style="font-weight: 500;">Password</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="password" class="form-control my-input" id="floatingInputGrid" placeholder="name@example.com" name="c-pwd" required>
                        <label for="floatingInputGrid" style="font-weight: 500;">Re-type Password</label>
                    </div> -->
                    <?php 
                    if(isset($_POST['signup'])){

                        $fn=$_POST['firstname'];
                        $ln=$_POST['lastname'];
                        $e=$_POST['email'];
                        $cnic=$_POST['cnic'];
                        $dob=$_POST['dob'];
                        $g=$_POST['gender'];
                        $p= $_POST['pwd'];
                        $cp= $_POST['c-pwd'];
                        $city = $_POST['city'];
                        $phone = $_POST['phone'];

                        if($p==$cp){

                        if($g == "Male"){
                            $dp = "../SiteAssets/images/people.svg";
                        }else{
                            $dp= "../SiteAssets/images/people.svg";
                        }

                        $role= "User";

                        $q1 = "SELECT * FROM `users` WHERE `email` LIKE '$e';";
                        $run = mysqli_query($db , $q1);
                        $count = mysqli_num_rows($run);

                        if($count== 1){
                            echo "
                            <div class='alert alert-danger'>
                        <strong>Already registered!</strong> go to login!
                        </div>
                            ";
                        }else{

                            $q1 = "INSERT INTO `users` (`first_name`,`last_name`,`dp`,`dob`,`pwd`,`email`,`role`,`gender`,`city`,`cnic`,`phone`) VALUES ('$fn','$ln','$dp','$dob','$p','$e','$role','$g','$city','$cnic','$phone')";
                            // $q2 = "INSERT INTO `tasks` (`userID`,`bio`) VALUES ('$e','this is my bio')";
                            mysqli_query($db, $q1);
                            // mysqli_query($db, $q2);

                            echo "<script>window.open('login.php','_self')</script>";
                        }
                    }else{echo "<div class='alert alert-danger'><strong>Error!</strong> Password doesn't match.</div>";
                    }
                }

?>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("pass").value;
        var confirmPassword = document.getElementById("c-pass").value;
        if (password != confirmPassword) {
            document.getElementById("demo").innerHTML ="<div class='alert alert-danger'><strong>Error!</strong> Password doesn't match.</div>";
            // write("");
            return true;
        }else{
            document.getElementById("demo").innerHTML ="";
            return false;
        }
    }
</script>
                    <span id="demo"></span>
                    <br>
                    <button class="btn btn-primary form-control"  name="signup">SIGN <span>UP</span></button>
                    <br><hr>
                    Already have an Account? <a href="login.php" style="color: #0dc1c4;">Login.</a>
                </form>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <script>
        $(document).ready(function(){
            $("#togglePassword").click(function(){
                // $("#pass").attr("type","text");
                var passInput=$("#pass");
                var togglepass=$('#togglePassword');
                if(passInput.attr('type')==='password')
                {
                passInput.attr('type','text');
                }else{
                passInput.attr('type','password');
                }
                if(togglepass.attr('title')==='Show password')
                {
                togglepass.attr('title','Hide password');
                }else{
                togglepass.attr('title','Show password');
                }
                $("#togglePassword").toggleClass("fa-eye-slash");
            });
            $("#togglePasswordc").click(function(){
                // $("#pass").attr("type","text");
                var passInput=$("#cpass");
                var togglepassc=$('#togglePasswordc');
                if(passInput.attr('type')==='password')
                {
                passInput.attr('type','text');
                }else{
                passInput.attr('type','password');
                }
                if(togglepassc.attr('title')==='Show password')
                {
                togglepassc.attr('title','Hide password');
                }else{
                togglepassc.attr('title','Show password');
                }
                $("#togglePasswordc").toggleClass("fa-eye-slash");
            });
        });
    </script>


    
</body>
</html>