<?php
include("../config/config.php");
$tn1 = filter_var($_POST['tn'], FILTER_SANITIZE_STRING);
$tn = mysqli_real_escape_string($con, $tn1);
$Course1 = filter_var($_POST['Course'], FILTER_SANITIZE_STRING);
$Course= mysqli_real_escape_string($con, $Course1);
$tun1 = filter_var($_POST['tun'], FILTER_SANITIZE_STRING);
$tun = mysqli_real_escape_string($con, $tun1);
$tpw1 = filter_var($_POST['tpw'], FILTER_SANITIZE_STRING);
$tpw= mysqli_real_escape_string($con, $tpw1);
$tcn1 = filter_var($_POST['tcn'], FILTER_SANITIZE_STRING);
$tcn = mysqli_real_escape_string($con, $tcn1);
$ty1 = filter_var($_POST['ty'], FILTER_SANITIZE_STRING);
$ty = mysqli_real_escape_string($con, $ty1);
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
$Teacher_ID = 'TI-'.UserID();
$USER_ID = 'UI-'.UserID();
$SQL_FETCH_TEACHER_ID = "SELECT * FROM teacher
    INNER JOIN user ON user.username = teacher.teacher_username
    WHERE teacher.teacher_username = '$tun' AND teacher.teacher_name = '$tn'";
$result_FETCH_TEACHER = mysqli_query($con,$SQL_FETCH_TEACHER_ID);
if (mysqli_num_rows($result_FETCH_TEACHER) > 0) {
    echo "2";
 }
else {
 $SQL_INSERT_TEACHER = mysqli_query($con,"INSERT INTO `teacher`(`teacher_id`, `teacher_course_teach`, `teacher_name`, `teacher_username`, `teacher_contact_number`, `teacher_teach_year`,`User_ID`) VALUES
                                       ('$Teacher_ID','$Course','$tn','$tun','$tcn','$ty', '$USER_ID');");
 $SQL_INSERT_USER = mysqli_query($con,"INSERT INTO `user`(`User_ID`, `User_level`, `username`, `password`, `gender`, `firstname`, `lastname`, `birthdate`, `contactnumber`, `email`) VALUES
                                       ('$USER_ID','TEACHER','$tun','$tpw','UNKNOWN','$tn','$tn','UNKNOWN','$tcn','UNKNOWN');");

                                                        echo "1";

 }
 ?>
