<?php
include("../config/config.php");
if (isset($_POST['username']) && isset($_POST['reg_password']) ) {
  $username1 = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $username = mysqli_real_escape_string($con, $username1);
  $reg_password1 = filter_var($_POST['reg_password'], FILTER_SANITIZE_STRING);
  $reg_password= mysqli_real_escape_string($con, $reg_password1);
  $sqlLogin= "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$reg_password'";
                     $result = mysqli_query($con,$sqlLogin);
                     if (mysqli_num_rows($result) > 0) {
                       $row = mysqli_fetch_assoc($result);
                       $UserID = $row['User_ID'];
                       $UserNames = $row['username'];
                       $Userlvl = $row['User_level'];
                       $_SESSION['User_ID'] = $UserID;
                       $_SESSION['username'] =  $UserNames;
                       $_SESSION['lvl'] =  $Userlvl;
                       echo '1';
                     }
                     else {
                       echo '0';
                     }
}
/*
*/

 ?>
