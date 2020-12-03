<?php
include("../config/config.php");
$Subject_Course1 = filter_var($_POST['Subject_Course'], FILTER_SANITIZE_STRING);
$Subject_Course = mysqli_real_escape_string($con, $Subject_Course1);
$Sub_dt1 = filter_var($_POST['Sub_dt'], FILTER_SANITIZE_STRING);
$Sub_dt= mysqli_real_escape_string($con, $Sub_dt1);
$DataArray = $_POST['DataArray'];
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

for($Array_Series=0; $Array_Series < count($DataArray); $Array_Series++)
{

$Subject_ID = 'SI-'.UserID();
  $Subject_Name =  $DataArray[$Array_Series]['Subject_Name'];
  $Year_Level =  $DataArray[$Array_Series]['Year_Level'];
  $Subject_Grade =  $DataArray[$Array_Series]['Subject_Grade'];
  $Semester_Level =  $DataArray[$Array_Series]['Semester_Level'];
  $SQL_FETCH_SUBJECT = "SELECT * FROM `subjects` WHERE
  `subject_name` = '$Subject_Name' AND `subject_year` = '$Year_Level' AND `subject_semester` = '$Semester_Level' AND `year_add` = '$Sub_dt'";
  $result_FETCH_SUBJECT = mysqli_query($con,$SQL_FETCH_SUBJECT);
  if (mysqli_num_rows($result_FETCH_SUBJECT) > 0) {
    $row = mysqli_fetch_assoc($result_FETCH_SUBJECT);
     $subject_name1 = $row['subject_name'];
     echo $subject_name1. ', ';
   }else {
     $SQL_INSERT_USER = mysqli_query($con,"INSERT INTO `subjects`(`subject_id`, `course_id`, `subject_name`, `subject_year`, `subject_grade`, `year_add`, `subject_semester`)
      VALUES ('$Subject_ID','$Subject_Course','$Subject_Name','$Year_Level','$Subject_Grade','$Sub_dt','$Semester_Level')");

   }

}




 ?>
