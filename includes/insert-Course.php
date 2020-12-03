<?php
include("../config/config.php");
$Course_Name1 = filter_var($_POST['Course_Name'], FILTER_SANITIZE_STRING);
$Course_Name = mysqli_real_escape_string($con, $Course_Name1);
$Year_Begin1 = filter_var($_POST['Year_Begin'], FILTER_SANITIZE_STRING);
$Year_Begin= mysqli_real_escape_string($con, $Year_Begin1);
$Course_Code1 = filter_var($_POST['Course_Code'], FILTER_SANITIZE_STRING);
$Course_Code= mysqli_real_escape_string($con, $Course_Code1);
$Total_Credit_Points1 = filter_var($_POST['Total_Credit_Points'], FILTER_SANITIZE_STRING);
$Total_Credit_Points= mysqli_real_escape_string($con, $Total_Credit_Points1);

$SQL_FETCH_COURSE = "SELECT * FROM `courses` WHERE `Course_name` = '$Course_Name' AND `Course_code` = '$Course_Code'";
$result_FETCH_COURSE = mysqli_query($con,$SQL_FETCH_COURSE);
if (mysqli_num_rows($result_FETCH_COURSE) > 0) {
  $row = mysqli_fetch_assoc($result_FETCH_COURSE);
   $CourseN = $row['Course_name'];
   echo '2';
 }else {
   $SQL_INSERT_USER = mysqli_query($con,"INSERT INTO `courses`(`Course_code`, `Course_name`, `Course_begin`, `Total_Credit_Points`)
                                            VALUES ('$Course_Code','$Course_Name','$Year_Begin','$Total_Credit_Points')");
echo "1";
 }

 ?>
