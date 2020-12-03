<?php
include("config/config.php");
include("includes/header.php");
if (!(isset($_SESSION["User_ID"]))) {
header("location:sign-in");
}

$userID =  $_SESSION['User_ID'];
echo '<h1 align="center">'. $_SESSION['username'].'-Welcome </h1>';

echo '<p align="center"><a href="includes/logout.php">Logout</a></p> ';

echo '<h1 align="center"> HERE STATES YOUR GRADES! ENJOY </h1>';

$SQL_TEACH_FETCH = "SELECT `student_id` FROM `students` WHERE `User_ID` = '$userID'";
                   $TEACH_FETCH_RESULT = mysqli_query($con,$SQL_TEACH_FETCH);
                     $RESULT_ROW_TEACH = mysqli_fetch_assoc($TEACH_FETCH_RESULT);
                     $student_id = $RESULT_ROW_TEACH['student_id'];
 ?>
 <table  class="table c table-striped table-bordered TableTunner" style="width:100%">
    <thead class="ae-m-th">
     <tr>
       <th>Subject Name</th>
       <th>Subject Year</th>
       <th>Subject Sem Level</th>
       <th>Subject Year Level</th>
       <th>Grade</th>
       <th>Letter Grade</th>
       <th>Teacher</th>
       <th>Course</th>
       <th>Subject Prerequisit Grade Points</th>
       <th>Status</th>
     </tr>
   </thead>
   <tbody>

     <?php
     $SQL_FETCH_GRADUATE = mysqli_query($con,"SELECT * FROM `student_grades` WHERE `Student_id` = '$student_id'");
     if (mysqli_num_rows($SQL_FETCH_GRADUATE) > 0) {
       while($GRADROW=mysqli_fetch_assoc($SQL_FETCH_GRADUATE)){
         $teacherCode = $GRADROW['Teacher_ID'];
         $CourseCode = $GRADROW['Course_ID'];
         $SubID = $GRADROW['Sub_ID'];

         $SQL_GRADUATE_COURCE_CHECK = "SELECT `teacher_name` FROM `teacher` WHERE `teacher_id` = '$teacherCode'";
         $result_GRADUATE_COURCE_CHECK = mysqli_query($con,$SQL_GRADUATE_COURCE_CHECK);
         if (mysqli_num_rows($result_GRADUATE_COURCE_CHECK) > 0) {
           $GRADUATE_COURCE_CHECK_ROW = mysqli_fetch_assoc($result_GRADUATE_COURCE_CHECK);
           $TEACHNAME = $GRADUATE_COURCE_CHECK_ROW['teacher_name'];

           $SQL_COURSE_CODE_CHECK = "SELECT `Course_name` FROM `courses` WHERE `Course_code` = '$CourseCode'";
           $result_COURSE_CODE_CHECK = mysqli_query($con,$SQL_COURSE_CODE_CHECK);
           if (mysqli_num_rows($result_COURSE_CODE_CHECK) > 0) {
             $SQL_CourseCode_ROW = mysqli_fetch_assoc($result_COURSE_CODE_CHECK);
             $COURSENAME = $SQL_CourseCode_ROW['Course_name'];

             $SQL_SUB_PRE_CHECK = "SELECT   `subject_grade` FROM `subjects` WHERE  `subject_id` = '$SubID'";
             $result_SUB_PRE_CHECK = mysqli_query($con,$SQL_SUB_PRE_CHECK);
             if (mysqli_num_rows($result_SUB_PRE_CHECK) > 0) {
               $SQL_SUB_PRE_ROW = mysqli_fetch_assoc($result_SUB_PRE_CHECK);
               $Sub_PRE = $SQL_SUB_PRE_ROW['subject_grade'];

         $NumberG = $GRADROW['Letter_Mark'];
         if($NumberG == "100" ) {
          $LetterG = 'A+';} else
          if($NumberG >= "97" ) {
          $LetterG = 'A+';} else
         if($NumberG == "96" ) {
          $LetterG = 'A';} else
         if($NumberG >= "93" ) {
          $LetterG = 'A';}else
         if($NumberG == "92") {
          $LetterG = 'A−';}else
         if($NumberG >= "90") {
          $LetterG =  'A−';}else
         if($NumberG == "89") {
          $LetterG = 'B+';}else
         if($NumberG >= "87") {
          $LetterG =  'B+';}else
         if($NumberG == "86") {
          $LetterG = 'B';}else
         if($NumberG >= "83") {
          $LetterG = 'B';}else
         if($NumberG == "82") {
          $LetterG = 'B−';}else
         if($NumberG >= "80") {
          $LetterG =  'B−';}else
         if($NumberG == "79") {
          $LetterG = 'C+';}else
         if($NumberG >= "77") {
          $LetterG =  'C+';}else
         if($NumberG == "76") {
          $LetterG = 'C';}else
         if($NumberG >= "73") {
          $LetterG = 'C';}else
         if($NumberG == "72") {
          $LetterG = 'C-';}else
         if($NumberG >= "70") {
          $LetterG =  'C-';}else
         if($NumberG == "69") {
          $LetterG = 'D+';}else
         if($NumberG >= "67") {
          $LetterG =  'D+';}else
         if($NumberG == "66") {
          $LetterG = 'D';}else
         if($NumberG >= "63") {
          $LetterG = 'D';}else
         if($NumberG == "62") {
          $LetterG = 'D-';}else
         if($NumberG >= "60") {
          $LetterG =  'D-';}else
         if($NumberG == "59") {
          $LetterG = 'F';}else
         if($NumberG >= "1") {
          $LetterG = 'F';}

         echo                 '<tr>
                              <td>'.$GRADROW['Sub_Name'].'</td>
                              <td>'.$GRADROW['Sub_Year'].'</td>
                              <td>'.$GRADROW['Sub_Sem_LVL'].'</td>
                              <td>'.$GRADROW['Std_Year_LVL'].'</td>
                              <td>'.$LetterG.'</td>
                              <td>'.$NumberG.'</td>
                              <td>'.$TEACHNAME.'</td>
                              <td>'.$COURSENAME.'</td>
                              <td>'.$Sub_PRE.'</td>
                              <td>'.$GRADROW['Progress'].'</td>
                              </tr> ';
                            }
                          }
                            }
       }
     }
       else {
         echo '<tr><h3 align="center"> IF GRADE DOESN`T APPEAR, JUST WAIT TO RATE IT BY YOUR ADVICER </tr>';
       }
      ?>
      </tbody>
 </table>
