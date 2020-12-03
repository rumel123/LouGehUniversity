<?php
include("../config/config.php");
$Course1 = filter_var($_POST['Student_Course'], FILTER_SANITIZE_STRING);
$Course = mysqli_real_escape_string($con, $Course1);
$YearLevel1 = filter_var($_POST['YearLevel'], FILTER_SANITIZE_STRING);
$YearLevel = mysqli_real_escape_string($con, $YearLevel1);
$SemLevel1 = filter_var($_POST['SemLevel'], FILTER_SANITIZE_STRING);
$SemLevel = mysqli_real_escape_string($con, $SemLevel1);

$cont = "";
$SQL_FETCH2 = mysqli_query($con,"SELECT * FROM `subjects` WHERE `course_id` = '$Course'
   AND `subject_year` = '$YearLevel' AND `subject_semester` = '$SemLevel'");

  while($row=mysqli_fetch_assoc($SQL_FETCH2)){
      $cont .= ','.$row['subject_id'];
    echo '<tr>
                  <td>'.$row['course_id'].'</td>
                  <td name="subject_id[]">'.$row['subject_id'].'</td>
                  <td>'.$row['subject_name'].'</td>
                  <td>'.$row['subject_year'].'</td>
                  <td>'.$row['subject_semester'].'</td>
                  <td>'.$row['subject_grade'].'</td>
                ';


  }
  echo '<td id="fssa" style="visibility:hidden;display:none;">'.$cont.'</td></tr>';
 ?>
