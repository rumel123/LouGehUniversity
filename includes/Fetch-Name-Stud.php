<?php include("../config/config.php");
$Val1 = filter_var($_POST['Val'], FILTER_SANITIZE_STRING);
$Val = mysqli_real_escape_string($con, $Val1);

$FETCH_CC =  "SELECT * FROM `students` WHERE `course_id` = '$Val'";
$result1 = mysqli_query($con,$FETCH_CC);
  while($row3=mysqli_fetch_assoc($result1)){
 echo '<option value="'.$row3['subject_year_level'].'*'.$row3['student_sem_level'].'*'.$row3['student_id'].'" id="StudOption_'.$row3['student_id'].'" class="StudOption">'.$row3['student_firstname'].' '.$row3['student_lastname'].'</option>
 ';

}
 ?>
