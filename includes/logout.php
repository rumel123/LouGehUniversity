<?php
include("../config/config.php");

   unset($_SESSION['username']);
    unset($_SESSION['User_ID']);
    session_destroy();
    header("location:../sign-in");

 ?>
