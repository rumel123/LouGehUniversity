<?php include("../config/config.php");
$Val1 = filter_var($_POST['Val'], FILTER_SANITIZE_STRING);
$Val = mysqli_real_escape_string($con, $Val1);

$FETCH_CC =  "SELECT  `Total_Credit_Points` FROM `courses` WHERE  `Course_code` = '$Val'";
$result = mysqli_query($con,$FETCH_CC);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $CC = $row['Total_Credit_Points'];

echo $CC;
}
 ?>
