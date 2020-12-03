<?php
include("../config/config.php");
$Subject_Course_P1 = filter_var($_POST['Subject_Course_P'], FILTER_SANITIZE_STRING);
$Subject_Course_P = mysqli_real_escape_string($con, $Subject_Course_P1);
$Student_Name1 = filter_var($_POST['Student_Name'], FILTER_SANITIZE_STRING);
$Student_Name = mysqli_real_escape_string($con, $Student_Name1);
$Total_Course_Credit1 = filter_var($_POST['Total_Course_Credit'], FILTER_SANITIZE_STRING);
$Total_Course_Credit = mysqli_real_escape_string($con, $Total_Course_Credit1);
$Year_Level1 = filter_var($_POST['Year_Level'], FILTER_SANITIZE_STRING);
$Year_Level = mysqli_real_escape_string($con, $Year_Level1);
$Semester_Level1 = filter_var($_POST['Semester_Level'], FILTER_SANITIZE_STRING);
$Semester_Level = mysqli_real_escape_string($con, $Semester_Level1);
$Student_ID1 = filter_var($_POST['Student_ID'], FILTER_SANITIZE_STRING);
$Student_ID = mysqli_real_escape_string($con, $Student_ID1);

$DYNAMIC_SUBJECT=  "SELECT * FROM `student_grades` WHERE
 `Student_id` = '$Student_ID' 
 AND `PendingCheckStatus` = '0'
 AND `Course_ID` = '$Subject_Course_P'
 AND `Std_Year_LVL`  = '$Year_Level'
 AND `Std_Sem_LVL`  = '$Semester_Level' ";
$DYNAMIC_RESULT = mysqli_query($con,$DYNAMIC_SUBJECT);
if (mysqli_num_rows($DYNAMIC_RESULT) > 0) {
while($DYNAMIC_ROW = mysqli_fetch_assoc($DYNAMIC_RESULT)){
$Teacher_ID = $DYNAMIC_ROW['Teacher_ID'];



$SQL_VALIDATION_CHECK = "SELECT * FROM `student_subjects` WHERE `status` = '1' AND `student_id` = '$Student_ID'";
$result_VALIDATION_CHECK = mysqli_query($con,$SQL_VALIDATION_CHECK);
if (mysqli_num_rows($result_VALIDATION_CHECK) > 0) {


$SQL_FETCH0 = "SELECT  `teacher_name` FROM `teacher` WHERE `teacher_id` = '$Teacher_ID'";
$result_FETCH0 = mysqli_query($con,$SQL_FETCH0);
if (mysqli_num_rows($result_FETCH0) > 0) {
$row = mysqli_fetch_assoc($result_FETCH0);
$CREDITS_F_ID = $DYNAMIC_ROW['Sub_ID'];

$SQL_CREDITS_F = "SELECT  `subject_grade` FROM `subjects` WHERE `subject_id` = '$CREDITS_F_ID'";
$result_CREDITS_F = mysqli_query($con,$SQL_CREDITS_F);
if (mysqli_num_rows($result_CREDITS_F) > 0) {
$row_CREDITS_F = mysqli_fetch_assoc($result_CREDITS_F);


$SQL_F_SUB_Y = "SELECT  `student_year_enroll`  FROM `students`
                  WHERE `student_id` = '$Student_ID'
                  AND `student_sem_level` = '$Semester_Level'
                  AND `subject_year_level` = '$Year_Level'";
$result_F_SUB_Y = mysqli_query($con,$SQL_F_SUB_Y);
if (mysqli_num_rows($result_F_SUB_Y) > 0) {
$row_F_SUB_Y = mysqli_fetch_assoc($result_F_SUB_Y);

echo '  <div id="Fetched_All">
<div class="ae-m-b">
<div class="ae-td  kp-pst ">
<input type="text" class="Subject_Name" id="Subject_Name_'.$CREDITS_F_ID.'" name="Subject_Name[]" readonly value="'.$DYNAMIC_ROW['Sub_Name'].'">
<br><label>Subject Name</label>
</div>

<div class="mgn2"></div>
<div class="ae-td kp-pst ">
<input type="text" class="Instructor" id="Instructor_'.$CREDITS_F_ID.'" name="Instructor[]" readonly value="'.$row['teacher_name'].'">
<br><label>Instructor</label>
</div>

<div class="mgn2"></div>
<div class="ae-td kp-pst ">
<input type="text" class="Credits" id="Credits_'.$CREDITS_F_ID.'" name="Credits[]" readonly value="'.$row_CREDITS_F['subject_grade'].'">
<label>Credits</label>
</div>

<div class="mgn2"></div>
<div class="ae-td kp-pst ">
<input type="text" class="Date_Taken" id="Date_Taken_'.$CREDITS_F_ID.'" name="Date_Taken[]" readonly value="'.$row_F_SUB_Y['student_year_enroll'].'">
<br><label>Date Taken</label>
</div>

<div class="mgn2"></div>
<div class="ae-td kp-pst ">
<input type="text" class="Grades" id="Grades_'.$CREDITS_F_ID.'" name="Grades[]"   readonly value="'.$DYNAMIC_ROW['Letter_Mark'].'">
<br><label>Grades</label>
</div>
<div class="mgn2"></div>
<div class="ae-td  kp-pst ">
<input type="text" class="Progress" id="Progress_'.$CREDITS_F_ID.'" name="Progress[]"  readonly value="'.$DYNAMIC_ROW['Progress'].'">
<br><label>Progress</label>
</div>

<div class="mgn2"></div>
<div class="wrn-btn">
<button id="button-this-retake_'.$CREDITS_F_ID.'_'.$Student_ID.'" class="btn_Retake" name="button">
<a>Retake Exam</a></button>
</div>
<div class="mgn2"></div>
<div class="scs-btn">
<button id="button-this-retake_'.$CREDITS_F_ID.'_'.$Student_ID.'"   class="btn_Proceed" name="button">
<a>Finish Course</a></button>
</div>
</div>
<div  id="inp1"></div>
</div>
';
}
}
}
}
}
}else {
  echo "1";
}
 ?>
 <script type="text/javascript">
  $(document).ready(function () {
    $(".btn_Retake").on("click", function(e) {
      var ToExplode = this.id;
      var Array_Series =  ToExplode.split('_');
      var Array_Series1 = Array_Series[1];
      var Array_Series2 = Array_Series[2];
      $.ajax({
        url: "includes/Retake.php",
        type: "post",
        data: {Array_Series1,Array_Series2},
        success : function(data){
if (data == "1") {
    alert("Update Successfully!");
    setInterval(function(){
$("#Fetched_All").load(window.location.href + " #Fetched_All" );
}, 1000);
    window.location.reload(true);
}else {
  alert("Error Please Try Again Later");
}
        }
      });
    });

    $(".btn_Proceed").on("click", function(e) {
      var ToExplode = this.id;
      var Array_Series =  ToExplode.split('_');
      var Array_Series1 = Array_Series[1];
      var Array_Series2 = Array_Series[2];
      $.ajax({
        url: "includes/Proceed.php",
        type: "post",
        data: {Array_Series1,Array_Series2},
        success : function(data){
  if (data == "1") {
    alert("Update Successfully!");
    setInterval(function(){
  $("#Fetched_All").load(window.location.href + " #Fetched_All" );
}, 1000);
    window.location.reload(true);
} else if (data =="2") {
    alert("Update Successfully, student move to next sem! enroll your student again for next take");

    setInterval(function(){
  $("#Fetched_All").load(window.location.href + " #Fetched_All" );
}, 1000);
    window.location.reload(true);
}else if (data =="3") {
    alert("Update Successfully, student move to next year! enroll your student again for next take");

    setInterval(function(){
  $("#Fetched_All").load(window.location.href + " #Fetched_All" );
}, 1000);

    window.location.reload(true);
}else if (data =="4") {
    alert("Update Successfully, Your student now graduated!");

    window.location.reload(true);
}

      else {
  alert("Error Please Try Again Later");
  window.location.reload(true);
  alert(data);
      }
        }
      });
    });
  });</script>
