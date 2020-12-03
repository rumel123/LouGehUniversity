<?php

include("../config/config.php");
$StudentCourse1 = filter_var($_POST['Student_Course'], FILTER_SANITIZE_STRING);
$StudentCourse = mysqli_real_escape_string($con, $StudentCourse1);
$StudentYearLevel1 = filter_var($_POST['YearLevel'], FILTER_SANITIZE_STRING);
$StudentYearLevel= mysqli_real_escape_string($con, $StudentYearLevel1);

$SQL_FETCH1 = mysqli_query($con,"SELECT * FROM `teacher` WHERE `teacher_course_teach` = '$StudentCourse' AND `teacher_teach_year` = '$StudentYearLevel'");

  while($row=mysqli_fetch_assoc($SQL_FETCH1)){
    echo '<option value="'.$row['teacher_id'].'" id="CourseOption" class="CoursesOpt">'.$row['teacher_name'].'</option>';
  }

 ?>
