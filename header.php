<?php
include 'db.php';


if (isset($_SESSION['profile'])) {

    $_SESSION['Email'] = $_COOKIE['profile'];
    $p = $_SESSION['Email'];

    $q = "SELECT * FROM `users` WHERE `email` = '$p' OR  `phone` = '$p'";
    $run  = mysqli_query($db , $q);
    $data = mysqli_fetch_assoc($run);

    $_SESSION['FName'] = $data['first_name'];
    $_SESSION['LName'] = $data['last_name'];
    $_SESSION['cnic'] = $data['cnic'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['dp'] = $data['dp'];
    $_SESSION['city'] = $data['city'];
    $_SESSION['gender'] = $data['gender'];
    $_SESSION['phone'] = $data['phone'];
    $_SESSION['dob'] = $data['dob'];

    echo "<style>.main-menu-l{display: none !important;}.main-menu-p{display: block !important;}</style>";
    // echo "<script>alert('Hello! ".$_SESSION['profile']."');</script>";
}else{
    echo"<style>.main-menu-l{display: block !important;}.main-menu-p{display: none !important;}</style>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Covid Test and Vaccination System</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/owl.carousel.min.css" rel="stylesheet">

    <link href="css/owl.theme.default.min.css" rel="stylesheet">

    <link href="css/templatemo-medic-care.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>





    <!--

TemplateMo 566 Medic Care

https://templatemo.com/tm-566-medic-care

-->
</head>


<body>

    <main>

        <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
            <div class="container">
                <a class="navbar-brand mx-auto d-lg-none" href="index.php">
                    CTVS
                    <strong class="d-block">Health Ministry</strong>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">

                        <a class="navbar-brand d-none d-lg-block" href="index.php">CORONAVIRUS
                                <strong class="d-block">Covid-19</strong>
                                                        </a>




                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="hospitals.php">Hospitals</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="booking.php">Bookings</a>
                            </li>

                            

                            

                    
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item sm_screen">
                                <a class="nav-link main-menu-l" href="login.php">Login</a>
                            </li>
                            
                            <li class="nav-item sm_screen">
                                <a class="nav-link main-menu-p" href="profile.php"><?php echo $_SESSION['FName']; ?></a>
                            </li>

                        </ul>
                    </div>

                </div>
                <a href="login.php" class="main-menu-l"><button type="button" class="btn btn-primary login_btn lg_screen" >login</button></a>&nbsp;
              
                <a href="profile.php" class="main-menu-p"><button type="button" class="btn btn-primary sign_btn lg_screen"><?php echo $_SESSION['FName']; ?></button></a>
        </nav>
        </div>