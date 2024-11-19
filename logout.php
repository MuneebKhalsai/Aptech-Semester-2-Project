<?php
session_start();
session_destroy();
session_unset();
setcookie("profile","", time() -3600 );
setcookie("hospital","", time() -3600 );
setcookie("admin","", time() -3600 );

header('location:login.php');


?>