<?php include("../config/config.php");
$Array_Series11 = filter_var($_POST['Array_Series1'], FILTER_SANITIZE_STRING);
$Array_Series1 = mysqli_real_escape_string($con, $Array_Series11);
$Array_Series21 = filter_var($_POST['Array_Series2'], FILTER_SANITIZE_STRING);
$Array_Series2 = mysqli_real_escape_string($con, $Array_Series21);

$Update_Subject = mysqli_query($con,"UPDATE `student_subjects` SET `status`= '0' WHERE `subject_id` = '$Array_Series1' and `student_id` = '$Array_Series2'");
$Restart_Subject_Taken = mysqli_query($con,"DELETE FROM `student_grades` WHERE `Student_id`= '$Array_Series2' AND `Sub_ID` = '$Array_Series1'");

echo "1";

?>
