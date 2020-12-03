<?php
include("../config/config.php");
$Student_id1 = filter_var($_POST['Student_id'], FILTER_SANITIZE_STRING);
$Student_id = mysqli_real_escape_string($con, $Student_id1);
$Teacher_ID1 = filter_var($_POST['Teacher_ID'], FILTER_SANITIZE_STRING);
$Teacher_ID= mysqli_real_escape_string($con, $Teacher_ID1);
$DataArray = $_POST['DataArray'];

for($Array_Series=0; $Array_Series < count($DataArray); $Array_Series++)
{
 $Student_Name = $DataArray[$Array_Series]['Student_Name'];
 $Course_ID = $DataArray[$Array_Series]['Course_ID'];
 $Std_Year_LVL = $DataArray[$Array_Series]['Std_Year_LVL'];
 $Std_Sem_LVL = $DataArray[$Array_Series]['Std_Sem_LVL'];
 $Sub_Name = $DataArray[$Array_Series]['Sub_Name'];
 $Sub_Year = $DataArray[$Array_Series]['Sub_Year'];
 $Sub_Sem_LVL = $DataArray[$Array_Series]['Sub_Sem_LVL'];
 $Letter_Grade = $DataArray[$Array_Series]['Letter_Grade'];
 $Letter_Mark = $DataArray[$Array_Series]['Letter_Mark'];
 $Sub_ID = $DataArray[$Array_Series]['Sub_ID'];
if ($Letter_Mark >= 74) {
  $Progress = "Passed";
}
else {
  $Progress = "Failed";
}
$SQL_UPDATE_PROGRESS = mysqli_query($con,"UPDATE `student_subjects` SET `status`='1'  WHERE  `student_id` = '$Student_id' AND `subject_id` = '$Sub_ID'");
$SQL_INSERT_GRADE = mysqli_query($con,"INSERT INTO `student_grades`
  (`Student_Name`,
     `Course_ID`,
     `Std_Year_LVL`,
     `Std_Sem_LVL`,
     `Sub_Name`,
     `Sub_Year`,
     `Sub_Sem_LVL`,
     `Letter_Grade`,
     `Letter_Mark`,
     `Sub_ID`,
     `Teacher_ID`,
     `Student_id`,
     `Progress`,
     `FinishCourse`,
     `PendingCheckStatus`)
VALUES (
  '$Student_Name',
  '$Course_ID',
  '$Std_Year_LVL',
  '$Std_Sem_LVL',
  '$Sub_Name',
  '$Sub_Year',
  '$Sub_Sem_LVL',
  '$Letter_Grade',
  '$Letter_Mark',
  '$Sub_ID',
  '$Teacher_ID',
  '$Student_id',
  '$Progress',
  '0',
  '0');");
}
echo "1";
 ?>
