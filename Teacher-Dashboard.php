<?php
include("config/config.php");
include("includes/header.php");
if (!(isset($_SESSION["User_ID"]))) {
header("location:sign-in");
}

$userID =  $_SESSION['User_ID'];
echo '<h1 align="center">'. $_SESSION['username'].'-Welcome </h1>';

echo '<p align="center"><a href="includes/logout.php">Logout</a></p> ';
$SQL_TEACH_FETCH = "SELECT `teacher_id` FROM `teacher` WHERE `User_ID` = '$userID'";
                   $TEACH_FETCH_RESULT = mysqli_query($con,$SQL_TEACH_FETCH);
                     $RESULT_ROW_TEACH = mysqli_fetch_assoc($TEACH_FETCH_RESULT);
                     $TeacherID = $RESULT_ROW_TEACH['teacher_id'];

 ?>
 <select name="Student" id="Student">
<?php
$SQL_FETCH1 = mysqli_query($con,"SELECT * FROM `students` WHERE `teacher_id` = '$TeacherID'");

while($row=mysqli_fetch_assoc($SQL_FETCH1)){
echo '<option value="'.$row['student_id'].'" >'.$row['student_firstname'].' '.$row['student_lastname'].'</option>';
}
?>
   </select>


   <label>Select Student</label>

 <table  class="table c table-striped table-bordered TableTunner"   style="width:100%">
    <thead class="ae-m-th">
     <tr>
       <th>Student Name</th>
       <th>Student Course</th>
       <th>Student Year</th>
       <th>Student Sem</th>
       <th>Subject ID</th>
       <th>Subject Name</th>
       <th>Subject Year</th>
       <th>Subject Sem</th>
       <th>Subject Grade</th>
       <th>Subject Mark</th>
     </tr>
   </thead>
   <tbody id='Fetch_Student_info' >


      </tbody>
 </table>
 <div class="ab-t flx fs" style="float:left;">
 <div class="kbtn scs bbtn" style="float:left;">
    <button id="Fetch_Student_Data"  type="button" name="button">
      <a><span class="mdi mdi-check bi-clr"></span>FETCH DATA</a></button>
  </div>
  <div class="mgn2"></div>

  <div class="mgn2"></div>
  <div class="mgn2"></div>
  <div class="mgn2"></div>
  <div class="kbtn scs bbtn" style="float:left;">
    <div class="mgn2"></div>
     <button id="Submit_Grade"  type="button" name="button">
       <a><span class="mdi mdi-check bi-clr"></span>Submit Grade</a></button>
   </div>
 </div>
 <script type="text/javascript">
 $(document).ready(function () {

      $('#Submit_Grade').on('click', function(e) {
	let DataArray = $(this).serializeArray();
  var TableTunner = $(".TableTunner tr").length;

  if (TableTunner > 1) {

      var Student_Name = document.getElementsByName('Student_Name[]');
      var Course_ID = document.getElementsByName('Course_ID[]');
      var Std_Year_LVL = document.getElementsByName('Std_Year_LVL[]');
      var Std_Sem_LVL = document.getElementsByName('Std_Sem_LVL[]');
      var Sub_Name = document.getElementsByName('Sub_Name[]');
      var Sub_Year = document.getElementsByName('Sub_Year[]');
      var Sub_Sem_LVL = document.getElementsByName('Sub_Sem_LVL[]');
      var Sub_ID = document.getElementsByName('Sub_ID[]');

    /*var Student_Name_Sample = Array.prototype.slice.call(document.getElementsByName('Student_Name[]'));
    var Student_Name = Student_Name_Sample.map((o) => o.value);
    var Course_ID_Sample = Array.prototype.slice.call(document.getElementsByName('Course_ID[]'));
    var Course_ID = Course_ID_Sample.map((o) => o.value);
    var Std_Year_LVL_Sample = Array.prototype.slice.call(document.getElementsByName('Std_Year_LVL[]'));
    var Std_Year_LVL = Std_Year_LVL_Sample.map((o) => o.value);
    var Std_Sem_LVL_Sample = Array.prototype.slice.call(document.getElementsByName('Std_Sem_LVL[]'));
    var Std_Sem_LVL = Std_Sem_LVL_Sample.map((o) => o.value);
    var Sub_Name_Sample = Array.prototype.slice.call(document.getElementsByName('Sub_Name[]'));
    var Sub_Name = Sub_Name_Sample.map((o) => o.value);
    var Sub_Year_Sample = Array.prototype.slice.call(document.getElementsByName('Sub_Year[]'));
    var Sub_Year = Sub_Year_Sample.map((o) => o.value);
    var Sub_Sem_LVL_Sample = Array.prototype.slice.call(document.getElementsByName('Sub_Sem_LVL[]'));
    var Sub_Sem_LVL = Sub_Sem_LVL_Sample.map((o) => o.value);
    var Sub_ID_Sample = Array.prototype.slice.call(document.getElementsByName('Sub_ID[]'));
    var Sub_ID = Sub_ID_Sample.map((o) => o.value);*/
    var Letter_Grade_Sample = Array.prototype.slice.call(document.getElementsByName('Letter_Grade[]'));
    var Letter_Grade = Letter_Grade_Sample.map((o) => o.value);
    var Letter_Mark_Sample = Array.prototype.slice.call(document.getElementsByName('Letter_Mark[]'));
    var Letter_Mark = Letter_Mark_Sample.map((o) => o.value);
    let Student_id = $('#Student').val();
    let Teacher_ID = '<?php echo $TeacherID; ?>';
								for (var i = 0; i < TableTunner - 1; i++) {
                  DataArray.push({
             Student_Name: Student_Name[i].innerHTML,
             Course_ID: Course_ID[i].innerHTML,
             Std_Year_LVL: Std_Year_LVL[i].innerHTML,
             Std_Sem_LVL: Std_Sem_LVL[i].innerHTML,
             Sub_Name: Sub_Name[i].innerHTML,
             Sub_Year: Sub_Year[i].innerHTML,
             Sub_Sem_LVL: Sub_Sem_LVL[i].innerHTML,
             Letter_Grade: Letter_Grade[i],
             Letter_Mark: Letter_Mark[i],
             Sub_ID: Sub_ID[i].innerHTML
                  });

                }

          $.ajax({
                      url: "includes/insert_Student_Grades.php",
                      data: {Student_id,
													DataArray,
                          Teacher_ID},
                      type: "post",
                      success : function(data){
                        if (data == 1) {
                          alert("Grade Updated");
                window.location.reload(true);
                        }
                        else {
                              alert("Error"); 
                        }
                      }});
  }
  else {
    alert('Please fetch the Data First');
  }

});



   $("#Fetch_Student_Data").on("click", function() {
     let Student_id = $('#Student').val();
       let Teacher_ID = '<?php echo $TeacherID; ?>';
     $.ajax({
          url: "includes/Fetch-Student-Info.php",
          type: "post",
          data: {Student_id,Teacher_ID},
          success : function(data){
                   $('#Fetch_Student_info').html(data);
          }
        });

   });

 });

 </script>
