<?php include("../config/config.php");
$Array_Series11 = filter_var($_POST['Array_Series1'], FILTER_SANITIZE_STRING);
$SubID = mysqli_real_escape_string($con, $Array_Series11);
$Array_Series21 = filter_var($_POST['Array_Series2'], FILTER_SANITIZE_STRING);
$StudID = mysqli_real_escape_string($con, $Array_Series21);

$Date = date("Y/m/d");

$SQL_FETCH3 = "SELECT * FROM `student_grades` WHERE `Sub_ID` = '$SubID' AND `Student_id` = '$StudID'";
$result_FETCH3 = mysqli_query($con,$SQL_FETCH3);
if (mysqli_num_rows($result_FETCH3) > 0) {
$rowse = mysqli_fetch_assoc($result_FETCH3);
 $CI = $rowse['Course_ID'];
  $student_year = $rowse['Std_Year_LVL'];
   $student_level = $rowse['Std_Sem_LVL'];
    $subject_name = $rowse['Sub_Name'];
      $teacher_id = $rowse['Teacher_ID'];
       $subject_grade = $rowse['Letter_Mark'];
        $subject_sem = $rowse['Sub_Sem_LVL'];
         $subject_year = $rowse['Sub_Year'];

$insert = mysqli_query($con,"INSERT INTO `finished_subject`(
  `subject_id`,
  `course_id`,
  `student_id`,
  `student_year`,
  `student_level`,
  `subject_name`,
  `Date_finished`,
  `subject_status`,
  `teacher_id`,
  `subject_grade`,
  `subject_sem`,
  `subject_year`) VALUES (
    '$SubID',
    '$CI',
    '$StudID',
    '$student_year',
    '$student_level',
    '$subject_name',
    '$Date',
    'COMPLETED',
    '$teacher_id',
    '$subject_grade',
    '$subject_sem',
    '$subject_year')");

$delete = mysqli_query($con,"DELETE FROM `student_subjects` WHERE `student_id` = '$StudID' and `subject_id`  = '$SubID' and `status` = '1'");

 $delete2 = mysqli_query($con,"DELETE FROM `student_grades` WHERE `Student_id` = '$StudID' and `Sub_ID` = '$SubID'");
$SQL_FETCH4 = "SELECT * FROM `student_grades` WHERE  `Student_id` = '$StudID'";
$result_FETCH4 = mysqli_query($con,$SQL_FETCH4);
if (mysqli_num_rows($result_FETCH4) > 0) {
echo '1';
}
else
{
  $updatef = "SELECT * FROM `students` WHERE `student_id` = '$StudID' ";
  $result_update = mysqli_query($con,$updatef);
  $rowupdate = mysqli_fetch_assoc($result_update);
  $YearUpgrade = $rowupdate['subject_year_level'];
  $SemUpgrade = $rowupdate['student_sem_level'];
  $yrenroll = $rowupdate['student_year_enroll'];
  $student_L = $rowupdate['student_lastname'];
  $Student_F = $rowupdate['student_firstname'];
  $useID = $rowupdate['user_id'];
  $SemUpgradee1 = $SemUpgrade + 1;
  if ($SemUpgradee1 > '2') {

  $YearUpgrade2 = $YearUpgrade + 1;
if ($YearUpgrade2 > '4') {

  $adds= mysqli_query($con,"INSERT INTO `graduated`(`student_id`, `course_id`, `date_start`, `date_finished`, `student_firstname`, `student_lastname`)
    VALUES ('$StudID','$CI','$yrenroll','$Date','$Student_F','$student_L')");
      $deletesu =   mysqli_query($con,"DELETE FROM `user` WHERE `User_ID` = '$useID'");
      $deletess =  mysqli_query($con,"DELETE FROM `students` WHERE `user_id` = '$useID'");

    echo "4";
}else {
$update = mysqli_query($con,"UPDATE `students` SET  `subject_year_level`='$YearUpgrade2'  WHERE `student_id` = '$StudID' ");
echo "3";
 }

  }
  else
  {
    $updates1 = mysqli_query($con,"UPDATE  `students` SET `student_sem_level`='$SemUpgradee1' WHERE `student_id` = '$StudID' ");
    echo "2";
  }
}
}
else {


}
?>
