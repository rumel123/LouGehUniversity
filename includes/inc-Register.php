<?php
include("../config/config.php");
$username1 = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$username = mysqli_real_escape_string($con, $username1);
$cbGender1 = filter_var($_POST['cbGender'], FILTER_SANITIZE_STRING);
$cbGender= mysqli_real_escape_string($con, $cbGender1);
$reg_fname1 = filter_var($_POST['reg_fname'], FILTER_SANITIZE_STRING);
$reg_fname = mysqli_real_escape_string($con, $reg_fname1);
$reg_lname1 = filter_var($_POST['reg_lname'], FILTER_SANITIZE_STRING);
$reg_lname = mysqli_real_escape_string($con, $reg_lname1);
$cbBirthMonth1 = filter_var($_POST['cbBirthMonth'], FILTER_SANITIZE_STRING);
$cbBirthMonth = mysqli_real_escape_string($con, $cbBirthMonth1);
$cbDay1 = filter_var($_POST['cbDay'], FILTER_SANITIZE_STRING);
$cbDay = mysqli_real_escape_string($con, $cbDay1);
$years1 = filter_var($_POST['years'], FILTER_SANITIZE_STRING);
$years = mysqli_real_escape_string($con, $years1);
$contact1 = filter_var($_POST['contact'], FILTER_SANITIZE_STRING);
$contact = mysqli_real_escape_string($con, $contact1);
$address1 = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
$address = mysqli_real_escape_string($con, $address1);
$reg_email1 = filter_var($_POST['reg_email'], FILTER_SANITIZE_STRING);
$reg_email = mysqli_real_escape_string($con, $reg_email1);
$reg_password1 = filter_var($_POST['reg_password'], FILTER_SANITIZE_STRING);
$reg_password = mysqli_real_escape_string($con, $reg_password1);

function UserID($lenght = 8) {
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
  }
  $sqlcheck = "SELECT * FROM `user` WHERE `username` ='$username' or `email` = '$reg_email'";
                 $result = mysqli_query($con,$sqlcheck);
                 if (mysqli_num_rows($result) > 0) {
                   $row = mysqli_fetch_assoc($result);
                    $username12 = $row['username'];
                     $email12 = $row['email'];
                     if ($username12 == $username) {
                       echo '2';
                    }
                    elseif ($email12 == $reg_email) {
                      echo '3';
                    }
                    else{
                      echo '0';
                    }
                 }else{
 $user_ID = 'UI-'.UserID();
 $BIRTHDATE = $cbBirthMonth.'/'.$cbDay.'/'.$years;
 $SQL_REGISTER = mysqli_query($con,
 "INSERT INTO `user`(`User_ID`, `username`, `password`, `gender`, `firstname`, `lastname`, `birthdate`, `contactnumber`, `email`)
  VALUES ('$user_ID','$username','$reg_password','$cbGender','$reg_fname',
    '$reg_lname','$BIRTHDATE','$contact','$reg_email')");
    echo "1";}

 ?>
