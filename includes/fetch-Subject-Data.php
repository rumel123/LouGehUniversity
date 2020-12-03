<?php

include("../config/config.php");
$Course1 = filter_var($_POST['Course'], FILTER_SANITIZE_STRING);
$Course = mysqli_real_escape_string($con, $Course1);
$ty1 = filter_var($_POST['ty'], FILTER_SANITIZE_STRING);
$ty = mysqli_real_escape_string($con, $ty1);


$SQL_FETCH1 = mysqli_query($con,"SELECT * FROM `subjects` WHERE `course_id` = '$Course' AND `subject_year` = '$ty'");

  while($row=mysqli_fetch_assoc($SQL_FETCH1)){
    echo '<tr>
                  <td>'.$row['course_id'].'</td>
                  <td>'.$row['subject_name'].'</td>
                  <td>'.$row['subject_year'].'</td>
                  <td>'.$row['subject_grade'].'</td>
                </tr>
              ';
             
  }

 ?>
