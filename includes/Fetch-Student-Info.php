<?php
include("../config/config.php");
$Student_id1 = filter_var($_POST['Student_id'], FILTER_SANITIZE_STRING);
$Student_id = mysqli_real_escape_string($con, $Student_id1);
$Teacher_ID1 = filter_var($_POST['Teacher_ID'], FILTER_SANITIZE_STRING);
$Teacher_ID= mysqli_real_escape_string($con, $Teacher_ID1);

$SQL_FETCH1 = mysqli_query($con,"SELECT * FROM students INNER JOIN subjects ON subjects.course_id = students.course_id AND subjects.subject_year = students.subject_year_level AND subjects.subject_semester = students.student_sem_level
  WHERE students.student_id = '$Student_id' AND students.teacher_id = '$Teacher_ID'");

  while($row=mysqli_fetch_assoc($SQL_FETCH1)){
    $NEWROW = $row['subject_id'];
    $SQL_FETCH0 = "SELECT * FROM `student_subjects` WHERE `subject_id` = '$NEWROW' AND `student_id` = '$Student_id' AND `status` = '0'";
    $result_FETCH0 = mysqli_query($con,$SQL_FETCH0);
    if (mysqli_num_rows($result_FETCH0) > 0) {
    echo '<tr>
    <td name="Student_Name[]" value="'.$row['student_firstname'].'-'.$row['student_lastname'].'">'.$row['student_firstname'].' '.$row['student_lastname'].'</td>
    <td name="Course_ID[]" value="'.$row['course_id'].'">'.$row['course_id'].'</td>
    <td name="Std_Year_LVL[]" value="'.$row['subject_year_level'].'">'.$row['subject_year_level'].'</td>
    <td name="Std_Sem_LVL[]" value="'.$row['student_sem_level'].'">'.$row['student_sem_level'].'</td>
    <td name="Sub_ID[]"  value="'.$row['subject_id'].'">'.$row['subject_id'].'</td>
    <td name="Sub_Name[]"  value="'.$row['subject_name'].'">'.$row['subject_name'].'</td>
    <td name="Sub_Year[]" value="'.$row['subject_year'].'">'.$row['subject_year'].'</td>
    <td name="Sub_Sem_LVL[]" value="'.$row['subject_semester'].'">'.$row['subject_semester'].'</td>
    <td> <div class="ae-td">
    <select name="Letter_Grade[]" id="Letter_Grades_'.$row['subject_id'].'">
      <option value="A+" id="Letter_Grade_'.$row['subject_id'].'" >A+</option>
      <option value="A" id="Letter_Grade_'.$row['subject_id'].'" >A</option>
      <option value="A−" id="Letter_Grade_'.$row['subject_id'].'" >A−</option>
      <option value="B+" id="Letter_Grade_'.$row['subject_id'].'" >B+</option>
      <option value="B" id="Letter_Grade_'.$row['subject_id'].'" >B</option>
      <option value="B−" id="Letter_Grade_'.$row['subject_id'].'" >B−</option>
      <option value="C+" id="Letter_Grade_'.$row['subject_id'].'" >C+</option>
      <option value="C" id="Letter_Grade_'.$row['subject_id'].'" >C</option>
      <option value="C-" id="Letter_Grade_'.$row['subject_id'].'" >C-</option>
      <option value="D+" id="Letter_Grade_'.$row['subject_id'].'" >D+</option>
      <option value="D" id="Letter_Grade_'.$row['subject_id'].'" >D</option>
      <option value="D-" id="Letter_Grade_'.$row['subject_id'].'" >D-</option>
      <option value="F" id="Letter_Grade_'.$row['subject_id'].'" >F</option>
    </select>
      <label>Grade Rating</label>
    </div></td>
    <td>   <div class="ae-td">
         <input type="number" value="100" id="MARK_'.$row['subject_id'].'" class="MARK" name="Letter_Mark[]" min="1" max="100" required="required">
         <label>Grade Mark</label>
       </div></td>
       <script type="text/javascript">
       $(document).ready(function () {
         $("#Letter_Grades_'.$row['subject_id'].'").on("click", function() {
           var ThisID = this.value;
           var Grade;
           switch (ThisID) {
        case "A+":
        Grade = "100";
        break;
        case "A":
        Grade = "96";
        break;
        case "A−":
        Grade = "92";
        break;
        case "B+":
        Grade = "89";
        break;
        case "B":
        Grade = "86";
        break;
        case "B−":
        Grade = "82";
        break;
        case "C+":
        Grade = "79";
        break;
        case "C":
        Grade = "76";
        break;
        case "C-":
        Grade = "72";
        break;
        case "D+":
        Grade = "69";
        break;
        case "D":
        Grade = "66";
        break;
        case "D-":
        Grade = "62";
        break;
        case "F":
        Grade = "59";
}
  document.getElementById("MARK_'.$row['subject_id'].'").value = Grade;
         });


         if ($("#MARK_'.$row['subject_id'].'").val() <= 0) {
       $("#MARK_'.$row['subject_id'].'").val("1");
     }else if($("#MARK_'.$row['subject_id'].'").val() >= 101) {
       $("#MARK_'.$row['subject_id'].'").val("100");
       }



       $("#MARK_'.$row['subject_id'].'").on("change", function() {
       if ($("#MARK_'.$row['subject_id'].'").val() <= 0) {
       $("#MARK_'.$row['subject_id'].'").val("1");
     }else if($("#MARK_'.$row['subject_id'].'").val() >= 101) {
       $("#MARK_'.$row['subject_id'].'").val("100");
       }
       });

       $(document).on("keyup", "#MARK_'.$row['subject_id'].'", function(e) {
       if ($("#MARK_'.$row['subject_id'].'").val() <= 0) {
       $("#MARK_'.$row['subject_id'].'").val("1");
     }else if($("#MARK_'.$row['subject_id'].'").val() >= 101) {
       $("#MARK_'.$row['subject_id'].'").val("100");
} if($("#MARK_'.$row['subject_id'].'").val() == "100" ) {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "0";} else
 if($("#MARK_'.$row['subject_id'].'").val() >= "97" ) {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "0";} else
if($("#MARK_'.$row['subject_id'].'").val() == "96" ) {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "1";} else
if($("#MARK_'.$row['subject_id'].'").val() >= "93" ) {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "1";}else
if($("#MARK_'.$row['subject_id'].'").val() == "92") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "2";}else
if($("#MARK_'.$row['subject_id'].'").val() >= "90") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "2";}else
if($("#MARK_'.$row['subject_id'].'").val() == "89") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "3";}else
if($("#MARK_'.$row['subject_id'].'").val() >= "87") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "3";}else
if($("#MARK_'.$row['subject_id'].'").val() == "86") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "4";}else
if($("#MARK_'.$row['subject_id'].'").val() >= "83") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "4";}else
if($("#MARK_'.$row['subject_id'].'").val() == "82") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "5";}else
if($("#MARK_'.$row['subject_id'].'").val() >= "80") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "5";}else
if($("#MARK_'.$row['subject_id'].'").val() == "79") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "6";}else
if($("#MARK_'.$row['subject_id'].'").val() >= "77") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "6";}else
if($("#MARK_'.$row['subject_id'].'").val() == "76") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "7";}else
if($("#MARK_'.$row['subject_id'].'").val() >= "73") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "7";}else
if($("#MARK_'.$row['subject_id'].'").val() == "72") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "8";}else
if($("#MARK_'.$row['subject_id'].'").val() >= "70") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "8";}else
if($("#MARK_'.$row['subject_id'].'").val() == "69") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "9";}else
if($("#MARK_'.$row['subject_id'].'").val() >= "67") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "9";}else
if($("#MARK_'.$row['subject_id'].'").val() == "66") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "10";}else
if($("#MARK_'.$row['subject_id'].'").val() >= "63") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "10";}else
if($("#MARK_'.$row['subject_id'].'").val() == "62") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "11";}else
if($("#MARK_'.$row['subject_id'].'").val() >= "60") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "11";}else
if($("#MARK_'.$row['subject_id'].'").val() == "59") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "12";}else
if($("#MARK_'.$row['subject_id'].'").val() >= "1") {
document.getElementById("Letter_Grades_'.$row['subject_id'].'").selectedIndex = "12";}
       });
       });
       </script>

       ';
     }
  }
   ?>
