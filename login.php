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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Khand:wght@600&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="css/index.css"> -->
<style>
    body{background: linear-gradient(rgba(0,0,0,0.3)50%,rgba(0,0,0,0.3)50%),url('images/gallery/login-cover.jpg');background-size: cover;}
    .box1{background-color: #fff; padding: 25px; color: #333333; border-radius: 5px;}
    .box1 h1{font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;}
    /* h1:after{content: ''; border: 1px solid #0dc1c4;} */
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
                    <h1>Login</h1>
                    <br>
                    <form method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control my-input" id="floatingInputGrid" name="email" placeholder="name@example.com" required>
                        <label for="floatingInputGrid" style="font-weight: 500;">Email or phone no.</label>
                    </div>
                    <br>
                    <div class="input-group flex-nowrap form-floating">
                        <input type="password" class="form-control my-input" id="pass"  placeholder="name@example.com" aria-describedby="addon-wrapping" name="pwd" pattern="(?=.*\W)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <label for="floatingInputGrid" style="font-weight: 500;">Password</label>
                        <span class="input-group-text my-input" id="addon-wrapping">&nbsp;<i class="far fa-eye" id="togglePassword" title="Show password"></i>&nbsp;</span>
                    </div>
                    <!-- <a href="#" style="color: #0dc1c4;">Forgotten password?</a> -->
                    <br><br>
                    <?php 

if(isset($_POST['login'])){

	$e= $_POST['email'];
	$p= $_POST['pwd'];

	$q1= "SELECT * FROM `users` WHERE (`email` = '$e' OR `phone` = '$e') AND `pwd` = '$p'";
	$q2= "SELECT * FROM `hospitals` WHERE (`email` = '$e' OR `phone` = '$e') AND `pwd` = '$p'";
	$adminq= "SELECT * FROM `users` WHERE (`email` = '$e' OR `phone` = '$e') AND `pwd` = '$p' AND `role` = 'Admin'";


	// print_r($q);
	// exit();


	$run1 = mysqli_query($db,$q1);
	$run2 = mysqli_query($db,$q2);
	$adminrun = mysqli_query($db,$adminq);
	$count1 = mysqli_num_rows($run1);
	$count2 = mysqli_num_rows($run2);
	$admincount = mysqli_num_rows($adminrun);

	if($admincount == 1){

        setcookie("admin", $e , time() + (86400 * 30) ,  "/");
        // echo $_COOKIE['email'];
        $_SESSION['admin'] = $_COOKIE['admin'];

        // echo $_SESSION['profile'];
        // echo "i am here";
        echo "<script>window.open('Admin Panel/SitePages/dashboard.php','_self');</script>";
    
    }elseif($count2 == 1){

        setcookie("hospital", $e , time() + (86400 * 30) ,  "/");
        $_SESSION['hospital'] = $_COOKIE['hospital'];
    
        // echo $_SESSION['profile'];
        // echo "i am here";
        echo "<script>window.open('Admin Panel/SitePages/hospital.php','_self');</script>";


	}elseif($count1 == 1){

        setcookie("profile", $e , time() + (86400 * 30) ,  "/");
        $_SESSION['profile'] = $_COOKIE['profile'];
    
        // echo $_SESSION['profile'];
        // echo "i am here";
        echo "<script>window.open('index.php','_self');</script>";


	}else{
		echo "<div class='alert alert-danger' role='alert'>
        <b>Try again!</b> wrong email or password. 
      </div>";
    }

}



 ?>
                    <button class="btn btn-primary form-control" name="login">LOGIN NOW!</button>
                    <br><hr>
                    Don't have an Account? <a href="signup.php" style="color: #0dc1c4;">Sign Up.</a>
                </form>
                </div>
            </div>
        </div>
    </div>

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

