<?php
include("config/config.php");
include("includes/header.php");
if (!(isset($_SESSION["User_ID"]))) {
header("location:sign-in");
}
if ($_SESSION['lvl'] == 'TEACHER') {
  header("location:Teacher-DashBoard");
}
if ($_SESSION['lvl'] == 'STUDENT') {
  header("location:student-DashBoard");
}
echo '<h1 align="center">'. $_SESSION['username'].'-Welcome </h1>';

echo '<p align="center"><a href="includes/logout.php">Logout</a></p> ';
 ?>


 <div class="">
<br><div class="ab-t flx fs" style="float:center;">
  <button class="btn btn-primary" data-toggle="modal" data-target="#AddCourse">Add Course</button>
  <div class="mgn2"></div>
  <?php
  $buttsub = "SELECT * FROM `courses`";
  $result_buttsub = mysqli_query($con,$buttsub);
  if (mysqli_num_rows($result_buttsub) > 0) {
echo '<button class="btn btn-primary" data-toggle="modal" data-target="#AddSubject">Add Subject</button>
<div class="mgn2"></div>';
  }
  else {
echo '<button type="button" class="btn btn-primary" disabled>Add Subject</button>
<div class="mgn2"></div>';
  }
   ?>

<?php
$buttteac = "SELECT * FROM `subjects`";
$result_buttteac = mysqli_query($con,$buttteac);
if (mysqli_num_rows($result_buttteac) > 0) {
echo '<button class="btn btn-primary" data-toggle="modal" data-target="#AddTeacher">Add Teacher</button>
<div class="mgn2"></div>';
}
else
{
  echo '<button type="button" class="btn btn-primary" disabled>Add Teacher</button>
  <div class="mgn2"></div>';
}
 ?>

  <?php
  $buttstu = "SELECT * FROM `teacher`  ";
  $result_buttstu = mysqli_query($con,$buttstu);
  if (mysqli_num_rows($result_buttstu) > 0) {
echo ' <button class="btn btn-primary" data-toggle="modal" data-target="#AddStudent">Enroll Student</button>
 <div class="mgn2"></div>';
  }
  else {
    echo '<button type="button" class="btn btn-primary" disabled>Enroll Student</button>
    <div class="mgn2"></div>';
  }
   ?>



    <?php
    $buttpro = "SELECT * FROM `student_grades` ";
    $result_buttpro = mysqli_query($con,$buttpro);
    if (mysqli_num_rows($result_buttpro) > 0) {
echo '
<button class="btn btn-primary" data-toggle="modal" data-target="#StudentProceed">Student Proceed</button>
<div class="mgn2"></div>';
    }
    else {
echo '<button type="button" class="btn btn-primary" disabled>Student Proceed</button>
<div class="mgn2"></div>';
    }
     ?>

     <?php
     $buttgra = "SELECT * FROM `graduated`";
     $result_buttgra = mysqli_query($con,$buttgra);
     if (mysqli_num_rows($result_buttgra) > 0) {
echo '
<button class="btn btn-primary" data-toggle="modal" data-target="#StudentGraduated">Student Graduated</button>
</div>';
     }
     else {
echo '<button type="button" class="btn btn-primary" disabled>Student Graduated</button>
<div class="mgn2"></div>';
     }
      ?>





   <div class="mgn2"></div>
   <br>
   <br>
   <br>

   <div id="AddTeacher" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog mod-800">
   <div class="modal-content ">
     <div class="modal-header flx sb">
        <div class="ae-t">
       ADD TEACHER
       </div>
       <div class="ae-c ">
         <div class="ab-t flx sb">



         </div>
       </div>
     </div>
     <div class="modal-body">
       <br>
       <div>
         <div class="fd-clm flx sb">
           <div class="ae-td">
             <input type="text" id="TN" required="required">
             <label>Teacher Name</label>
           </div>
           <div class="mgn"></div>
           <div class="ae-td">
             <select name="Courses" id="Course">
 <?php
 $SQL_FETCH1 = mysqli_query($con,"SELECT * FROM `Courses`");

   while($row=mysqli_fetch_assoc($SQL_FETCH1)){
     echo '<option value="'.$row['Course_code'].'" id="CourseOption" class="CoursesOpt">'.$row['Course_name'].'</option>';
   }
  ?>
               </select>
             <label>Teaching Course</label>
           </div>
         </div>
         <div class="fd-clm flx sb">
           <div class="ae-td">
             <input type="text" id="TUN"  required="required">
             <label>Username</label>
           </div>
           <div class="mgn"></div>

           <div class="ae-td">
             <input type="password" id="TPW"  required="required">
             <label>Password</label>
           </div>
         </div>
         <div class="fd-clm flx sb">
           <div class="ae-td">
             <input type="text" id="TCN" required="required">
             <label>Contact Number</label>
           </div>
           <div class="mgn"></div>
           <div class="ae-td">
             <input type="number" id="ty" min="1" max="4" required="required">
             <label>Teaching Year</label>
           </div>
         </div>

         <br>
         <table  class="table c table-striped table-bordered" style="width:100%">
            <thead class="ae-m-th">
             <tr>
               <th>Course ID</th>
               <th>Subject Name</th>
               <th>Subject Year</th>
               <th>Subject Grade</th>
             </tr>
           </thead>
           <tbody id='Fetch-Subject'>

              </tbody>
         </table>
         <br>
       </div>

       </div>
       <hr>
       <br>
       <div class="ab-t flx fs" style="float:right;">
               <div class="scs-btn">
                 <button id="btnsaveTeach" type="button" name="button">
                   <a><span>R</span> Save</a></button>
               </div>
               <div class="mgn2"></div>
               <div class="scs-btn">
                 <button id="fetch_subject" type="button" name="button">
                   <a><span>R</span>fetch Subject</a></button>
               </div>
               <div class="mgn2"></div>
               <div class="wrn-btn">
                   <button data-dismiss="modal" aria-label="close"
                   name="button">
                     <a><span>S</span> Close</a></button>
               </div>
             </div>
     </div>
   </div>
 </div>
 <div id="AddStudent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog mod-800">
 <div class="modal-content ">
   <div class="modal-header flx sb">
        <div class="ae-t">
     Enroll STUDENTS
     </div>
     <div class="ae-c ">
       <div class="ab-t flx sb">



       </div>
     </div>
   </div>
   <div class="modal-body">
     <br>
     <div>
       <div class="fd-clm flx sb">
         <div class="ae-td">
           <input type="text" id="SFN" required="required">
           <label>Student First Name</label>
         </div>
         <div class="mgn"></div>
         <div class="ae-td">
           <input type="text" id="SLN" required="required">
           <label>Student Last Name</label>
         </div>
         <div class="ae-td">
           <select name="Courses" id="Student-Course">
<?php
$SQL_FETCH1 = mysqli_query($con,"SELECT * FROM `Courses`");

 while($row=mysqli_fetch_assoc($SQL_FETCH1)){
   echo '<option value="'.$row['Course_code'].'" id="CourseOption" class="CoursesOpt">'.$row['Course_name'].'</option>';
 }
?>
             </select>
           <label>Course</label>
         </div>
       </div>
       <div class="fd-clm flx sb">
         <div class="ae-td">
           <input type="date" name="B_date" id="B_dt" data-date-format="mm-dd-yyyy"
              class="date-range-filter" required>
           <label>Birth Date</label>
         </div>
         <div class="mgn"></div>

         <div class="ae-td">
           <input type="number" id="SYL" min="1" max="4"  required="required">
           <label>Year Level</label>
         </div>
         <div class="mgn"></div>

         <div class="ae-td">
           <input type="number" id="SSL" min="1" max="2" required="required">
           <label>Semester Level</label>
         </div>
       </div>
       <div class="fd-clm flx sb">

         <div class="mgn"></div>
         <div class="ae-td">
           <input type="text" id="SUN" required="required">
           <label>Student UserName</label>
         </div>
         <div class="mgn"></div>
         <div class="ae-td">
           <input type="password" id="SPW" required="required">
           <label>Student Password</label>
         </div>
       </div>
       <div class="fd-clm flx sb">
         <div class="ae-td">
           <div class="ae-td">
             <select name="Teacher_LIST" id="Teacher_LIST" >
           </select>
             <label>Teacher Course</label>
           </div>
         </div>
         <div class="mgn"></div>

         <div class="mgn"></div>

       </div>

       <br>
       <table  class="table c table-striped table-bordered TableTunner" style="width:100%">
          <thead class="ae-m-th">
           <tr>
             <th>Course ID</th>
             <th>Subject ID</th>
             <th>Subject Name</th>
             <th>Subject Year</th>
             <th>Subject Semester</th>
             <th>Subject Grade</th>
           </tr>
         </thead>
         <tbody id='Fetch-Subject-Student'>

            </tbody>
       </table>
       <br>
     </div>

     </div>
     <hr>
     <br>
     <div class="ab-t flx fs" style="float:right;">
             <div class="scs-btn">
               <button id="Student-Save" type="button" name="button">
                 <a><span>R</span> Save</a></button>
             </div>
             <div class="mgn2"></div>
             <div class="scs-btn">
               <button id="Student-Fetch-Subject" type="button" name="button">
                 <a><span>R</span>fetch Info</a></button>
             </div>
             <div class="mgn2"></div>
             <div class="wrn-btn">
                 <button data-dismiss="modal" aria-label="close"
                 name="button">
                   <a><span>S</span> Close</a></button>
             </div>
           </div>
   </div>
 </div>
</div>


<div id="AddSubject" class="modal fade" tabindex="-1" role="dialog"
aria-hidden="true">
  <button type="button" id="closeModal" class="close" data-dismiss="modal"
  aria-label="close" name="button"><span area-hidden="true">&times;</span>
  </button>
  <div class="modal-dialog mod" role="document">
    <div class="modal-content mod">
      <div class="modal-header flx sb">
         <div class="ae-t">Add Subject</div>
      </div>
      <div class="modal-body">
        <br>
        <div class="ae-m-b">
             <div class="ae-td">
            <select name="Courses" id="Subject_Course">
 <?php
 $SQL_FETCH1 = mysqli_query($con,"SELECT * FROM `Courses`");

  while($row=mysqli_fetch_assoc($SQL_FETCH1)){
    echo '<option value="'.$row['Course_code'].'" id="CourseOption_'.$row['Course_code'].'" class="CoursesOpt">'.$row['Course_name'].'</option>
   ';
}
 ?>
              </select>
            <label>Choose Course</label>
          </div>
          <div class="mgn2"></div>
          <div class="mgn2"></div>
           <div class="ae-td">
            <input type="date" name="B_date" id="Sub_dt" data-date-format="mm-dd-yyyy"
               class="date-range-filter" required>
            <label>Subject Date  Add</label>
          </div>
          <div class="mgn2"></div>
          <div class="mgn2"></div>
          <div class="ae-td">
            <input type="text" name="Sub_Cred_Points" id="Sub_Cred_Points"  disabled required>
            <label>Total Credits</label>
          </div>
        </div>


        <hr>
        <br>

        <div class="flx sb">
          <div class="ae-m-h flx sb">
            <a href="#">Subject</a>
          </div>
          <div class="kbtn">
            <button id="btnaddMN" name="button">
              <a><span></span>Add</a></button>
          </div>
        </div>
        <br>
        <br>
        <div class="out1">

        						<div class="out1">
        <div class="ae-m-b">
           <div class="ae-td">
              <input type="text" class="Subject_Name"   name="Subject_Name[]" required>
              <label>Subject Name</label>
          </div>
           <div class="ae-td">
            <input type="number" class="SYL" name="Year_Level[]" min="1" max="4"  required="required">
            <label>Year Level</label>
          </div>

          <div class="ae-td mpxh">
              <input type="number" class="Subject_Grade" min="1" max="6" value="" name="Subject_Grade[]" oninput="SolvingCredits()" required>
              <label>Credits</label>
          </div>
          <div class="ae-td">
            <input type="number" class="SSL" name="Semester_Level[]" min="1" max="2" required="required">
            <label>Semester Level</label>
          </div>

        </div>
        <div  id="inp1"></div>
      </div>

      </div>

        <hr>
        <br>
        <br>
        <div class="flx sb">
          <div class="scs-btn">
            <button id="btnsaveSUBJECT" type="button" name="button" >
              <a><span>R</span>SAVE</a></button>
          </div>
          <div class="ab-t flx fs" style="float:right;">

            <div class="wrn-btn">
                <button data-dismiss="modal" aria-label="close"
                name="button">
                  <a><span>S</span> Close</a></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>

  <div id="AddCourse" class="modal fade" tabindex="-1" role="dialog" aria-hidden="false">
	<button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="close"
	name="button"><span area-hidden="true">&times;</span>
	</button>
	<div class="modal-dialog" role="document">
		<div class="modal-content mod">
			<div class="modal-header flx sb">
				<div class="ae-t">
						Add Courses
				</div>
			</div>
			<div class="modal-body">

				<div class="ae-mbw cv">
					<div class="ae-cv cvl">
					 	<div class="ae-td">
								<input type="text" id="Course_Name"  required>
								<label>Course Name</label>
						</div>
				     <div class="ae-td">
              <input type="date" name="B_date" id="Year_Begin" data-date-format="mm-dd-yyyy"
                 class="date-range-filter" required>
              <label>Year Commenced</label>
            </div>
				 		<div class="ae-td">
								<input type="text" id="Course_Code"  required>
								<label>Course Code</label>
						</div>
				 		<div class="ae-td">
								<input type="number" id="Total_Credit_Points" min='0' required>
<label>Course Credit Points</label>
						</div>
					</div>

				</div>
				<br>
				<div class="kbtn scs bbtn" style="float:left;">
					<button id="SaveCourse"  type="button" name="button">
						<a><span class="mdi mdi-check-bold bi-clr"></span>Save</a></button>
				</div>
			</div>
		</div>
	</div>
</div>



<div id="StudentProceed" class="modal fade" tabindex="-1" role="dialog"
aria-hidden="true">
  <button type="button" id="closeModal" class="close" data-dismiss="modal"
  aria-label="close" name="button"><span area-hidden="true">&times;</span>
  </button>
  <div class="modal-dialog mod" role="document">
    <div class="modal-content mod">
      <div class="modal-header flx sb">
         <div class="ae-t">Student Ranking Proceed</div>
      </div>
      <div class="modal-body">
        <br>

        <div class="ae-m-b">
             <div class="ae-td">
            <select name="Subject_Course_P" id="Subject_Course_P">
 <?php
 $SQL_FETCH1 = mysqli_query($con,"SELECT * FROM `Courses`");

  while($row=mysqli_fetch_assoc($SQL_FETCH1)){
    echo '<option value="'.$row['Course_code'].'-'.$row['Total_Credit_Points'].'" id="CourseOption_'.$row['Course_code'].'" class="Subject_Course_Pc">'.$row['Course_name'].'</option>
   ';
}
 ?>
              </select>
            <label>Choose Course</label>
          </div>
          <div class="mgn2"></div>
          <div class="mgn2"></div>

          <div class="mgn2"></div>
          <div class="mgn2"></div>
          <div class="ae-td">
            <select name="Student_Name" id="Student_Name">

</select>
 <label>Student Name</label>
          </div>
        </div>
            <br>
        <div class="ae-m-b">
            <label>Total Course Credit</label>
          <div class="ae-td ">
            <input type="text" name="Total_Course_Credit" id="Total_Course_Credit"  disabled required>

          </div>
  <div class="mgn2"></div>
          <div class="mgn2"></div>
          <div class="mgn2"></div>
            <label>Year Level</label>
          <div class="ae-td">
            <input type="text" name="Year_Level" id="Year_Level"  disabled required>

          </div>
          <div class="mgn2"></div>
          <div class="mgn2"></div>
          <label>Semester Level</label>
          <div class="ae-td">
            <input type="text" name="Semester_Level" id="Semester_Level"  disabled required>

          </div>
          <div class="mgn2"></div>
          <div class="mgn2"></div>
            <label>Student ID</label>
          <div class="ae-td">
            <input type="text" name="Student_ID" id="Student_ID"  disabled required>

          </div>
        </div>



        <hr>
        <br>

        <div class="flx sb">
          <div class="ae-m-h flx sb">
            <a href="#">Subjects</a>
          </div>
          <div class="kbtn">
            <button id="btn_Fetch_Subjects_All" name="button">
              <a><span></span>Fetch</a></button>
          </div>
        </div>
        <br>
        <br>
        <div id="Fetch_Here_Dynamic_Subject">

      </div>

        <hr>
        <br>
        <br>
        <div class="flx sb">

          <div class="ab-t flx fs" style="float:right;">

            <div class="wrn-btn">
                <button data-dismiss="modal" aria-label="close"
                name="button">
                  <a><span>S</span> Close</a></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>

  <div id="StudentGraduated" class="modal fade" tabindex="-1" role="dialog"
  aria-hidden="true">
    <button type="button" id="closeModal" class="close" data-dismiss="modal"
    aria-label="close" name="button"><span area-hidden="true">&times;</span>
    </button>
    <div class="modal-dialog mod" role="document">
      <div class="modal-content mod">
        <div class="modal-header flx sb">
           <div class="ae-t">List of Student Graduated</div>
        </div>
        <div class="modal-body">
          <br>





          <hr>
          <br>
          <table  class="table c table-striped table-bordered TableTunner" style="width:100%">
             <thead class="ae-m-th">
              <tr>
                <th>STUDENT ID</th>
                <th>COURSE NAME</th>
                <th>COURSE TOTAL CREDIT</th>
                <th>ENROLLED</th>
                <th>YEAR GRADUATE</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>STATUS</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $SQL_FETCH_GRADUATE = mysqli_query($con,"SELECT * FROM `graduated`");

                while($GRADROW=mysqli_fetch_assoc($SQL_FETCH_GRADUATE)){
                  $COURSE_CODE = $GRADROW['course_id'];

                  $SQL_GRADUATE_COURCE_CHECK = "SELECT   `Course_name` , `Total_Credit_Points` FROM `courses` WHERE  `Course_code` = '$COURSE_CODE'";
                  $result_GRADUATE_COURCE_CHECK = mysqli_query($con,$SQL_GRADUATE_COURCE_CHECK);
                  if (mysqli_num_rows($result_GRADUATE_COURCE_CHECK) > 0) {
                    $GRADUATE_COURCE_CHECK_ROW = mysqli_fetch_assoc($result_GRADUATE_COURCE_CHECK);
                    $Course_name = $GRADUATE_COURCE_CHECK_ROW['Course_name'];
                    $Total_Credit_Points = $GRADUATE_COURCE_CHECK_ROW['Total_Credit_Points'];

                  echo '<tr>
                                <td>'.$GRADROW['student_id'].'</td>
                                <td>'.$Course_name.'</td>
                                <td>'.$Total_Credit_Points.'</td>
                                <td>'.$GRADROW['date_start'].'</td>
                                <td>'.$GRADROW['date_finished'].'</td>
                                <td>'.$GRADROW['student_firstname'].'</td>
                                <td>'.$GRADROW['student_lastname'].'</td>
                                <td>GRADUATED</td>
                         </tr>';
                       }

                }
               ?>
               </tbody>
          </table>

          <br>
          <br>
          <div class="flx sb">

            <div class="ab-t flx fs" style="float:right;">

              <div class="wrn-btn">
                  <button data-dismiss="modal" aria-label="close"
                  name="button">
                    <a><span>S</span> Close</a></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>


  </div>
 <script type="text/javascript">
  $(document).ready(function () {
     $("#btn_Fetch_Subjects_All").on("click", function() {
       var ValnS = $('#Subject_Course_P').val();
       var ValyS = ValnS.split('-');
       var Subject_Course_P = ValyS[0];
       var Student_Name = $('#Student_Name').val();
       var Total_Course_Credit = $('#Total_Course_Credit').val();
       var Year_Level = $('#Year_Level').val();
       var Semester_Level = $('#Semester_Level').val();
       var Student_ID = $('#Student_ID').val();
        $.ajax({
          url: "includes/Fetch-Dynamic-Subject.php",
          type: "post",
          data: {Subject_Course_P,
                 Student_Name,
                 Total_Course_Credit,
                 Year_Level,
                 Semester_Level,
                 Student_ID},
          success : function(data){
            if (data == "1") {
              alert("Theres nothing to Fetch, Maybe the Teacher Doesn`t Done The Recording? ");
            }
                     $('#Fetch_Here_Dynamic_Subject').html(data);
            }
        });
     });
    $("#Subject_Course_P").on("click", function() {
      var ValnS = this.value;
      var ValyS = ValnS.split('-');
      var Val = ValyS[0];
      document.getElementById('Total_Course_Credit').value = ValyS[1];
    });
    $("#Student_Name").on("click", function() {
      var Student_Name_Container_Value = this.value;
      var ValnS = $("#Subject_Course_P").val();
      var ValyS = ValnS.split('-');
      var Val = ValyS[0];
      $.ajax({
         url: "includes/Fetch-Name-Stud.php",
         type: "post",
         data: {Val},
         success : function(data){
                    $('#Student_Name').html(data);
         }
           });
           var ValyS1 = Student_Name_Container_Value.split('*');
           var Valsyl = ValyS1[0];
  $('#Year_Level').val(Valsyl);
           var Valssl = ValyS1[1];
  $('#Semester_Level').val(Valssl);
           var Valssi = ValyS1[2];
  $('#Student_ID').val(Valssi);

    });


  $("#Subject_Course").on("click", function() {
    var Val = this.value;
    $.ajax({
       url: "includes/Course-Credit-Score.php",
       type: "post",
       data: {Val},
       success : function(data){
                  $('#Sub_Cred_Points').val(data);
       }
     });
  });

    $("#fetch_subject").on("click", function() {
    let Course = $('#Course').val();
    let ty = $('#ty').val();
     $.ajax({
        url: "includes/fetch-Subject-Data.php",
        type: "post",
        data: {Course,ty},
        success : function(data){
                 $('#Fetch-Subject').html(data);
        }
      });
    });

if ($('#ty').val() <= 0) {
$('#ty').val('1');
}else if($('#ty').val() >= 5) {
$('#ty').val('4');
}
  $('#ty').on('change', function() {
    if ($('#ty').val() <= 0) {
    $('#ty').val('1');
    }else if($('#ty').val() >= 5) {
    $('#ty').val('4');
    }
  });

	$(document).on('keyup', '#ty', function(e) {
    if ($('#ty').val() <= 0) {
    $('#ty').val('1');
    }else if($('#ty').val() >= 5) {
    $('#ty').val('4');
    }
  });
  ///////////////////////////////////////
  if ($('#SYL').val() <= 0) {
$('#SYL').val('1');
}else if($('#SYL').val() >= 5) {
$('#SYL').val('4');
}
$('#SYL').on('change', function() {
if ($('#SYL').val() <= 0) {
$('#SYL').val('1');
}else if($('#SYL').val() >= 5) {
$('#SYL').val('4');
}
});

$(document).on('keyup', '#SYL', function(e) {
if ($('#SYL').val() <= 0) {
$('#SYL').val('1');
}else if($('#SYL').val() >= 5) {
$('#SYL').val('4');
}
});

if ($('#SSL').val() <= 0) {
$('#SSL').val('1');
}else if($('#SSL').val() >= 2) {
$('#SSL').val('2');
}
$('#SSL').on('change', function() {
if ($('#SSL').val() <= 0) {
$('#SSL').val('1');
}else if($('#SSL').val() >= 3) {
$('#SSL').val('2');
}
})

$(document).on('keyup', '#SSL', function(e) {
if ($('#SSL').val() <= 0) {
$('#SSL').val('1');
}else if($('#SSL').val() >= 3) {
$('#SSL').val('2');
}
});



////////////////////////////////////////////
 $("#fetch_subject").on("click", function() {
 let Course = $('#Course').val();
 let ty = $('#ty').val();
  $.ajax({
     url: "includes/fetch-Subject-Data.php",
     type: "post",
     data: {Course,ty},
     success : function(data){
              $('#Fetch-Subject').html(data);
     }
   });
 });
   $("#Student-Fetch-Subject").on("click", function() {
   let SemLevel = $('#SSL').val();
   let Student_Course = $('#Student-Course').val();
   let YearLevel = $('#SYL').val();
   var vasl= 0;
   $.ajax({
     url: "includes/fetch-Teacher.php",
     type: "post",
     data: {Student_Course,YearLevel},
     success : function(data){
       if (data == '') {
          alert("theres no available teacher and subject for a moment, please contact the admin for registering the course");
       }else {
         $('#Teacher_LIST').html(data);

       }

     }
   });
     var vals = document.getElementById('Teacher_LIST').innerHTML;
   if (vals) {
     $.ajax({
       url: "includes/fetch-Student-Subjects.php",
       type: "post",
       data: {Student_Course,YearLevel,SemLevel},
       success : function(data){

                $('#Fetch-Subject-Student').html(data);
       }
     });


   }

 });
   $("#btnsaveTeach").on("click", function() {
   let tn = $('#TN').val();
   let Course = $('#Course').val();
   let tun = $('#TUN').val();
   let tpw = $('#TPW').val();
   let tcn = $('#TCN').val();
   let ty = $('#ty').val();
   if (/^\s*$/.test(tn) || /^\s*$/.test(Course) || /^\s*$/.test(tun) || /^\s*$/.test(tpw)
  || /^\s*$/.test(tcn)   || /^\s*$/.test(ty))
  {
     alert("Please Fill up all blanks!");
  }else {
    $.ajax({
       url: "includes/insert-Teacher.php",
       type: "post",
       data: {tn,Course,tun,tpw,tcn,ty},
       success : function(data){
         if (data == 1) {

           alert("Teacher Add Successfully");
   window.location.reload(true);
         }
         else if (data == 2) {
               alert("Teacher is Exist");

         }else {
             alert("Error Try Again Later");

         }
       }
     });
  }

 });
 $("#Student-Save").on("click", function() {
 let DataArray = $(this).serializeArray();
 let StudentFname = $('#SFN').val();
 let StudentLname = $('#SLN').val();
 let StudentCourse = $('#Student-Course').val();
 let StudentBirthDate= $('#B_dt').val();
 let StudentYearLevel = $('#SYL').val();
 let StudentSemesterLevel = $('#SSL').val();
 let StudentUsername = $('#SUN').val();
 let StudentPassword = $('#SPW').val();
 let Teacher_LIST = $('#Teacher_LIST').val();
 let subject_id = document.getElementById('fssa').innerHTML;


 if (/^\s*$/.test(Teacher_LIST) || /^\s*$/.test(StudentFname) || /^\s*$/.test(StudentLname) || /^\s*$/.test(StudentCourse) || /^\s*$/.test(StudentBirthDate)
|| /^\s*$/.test(StudentYearLevel)   || /^\s*$/.test(StudentSemesterLevel) || /^\s*$/.test(StudentUsername) || /^\s*$/.test(StudentPassword))
{
   alert("Please Fill up all blanks or try to fetch first! if nothing happened, please choose your birthday on the small callendar icon");


}else {
let subsp = subject_id.split(',');
for (var i = 1; i < subsp.length ; i++) {
    DataArray.push({
      subject_id: subsp[i]
    });
}


    $.ajax({
       url: "includes/insert-Student.php",
       type: "post",
       data: {StudentFname,
         DataArray,
      StudentLname,
      StudentCourse,
      StudentBirthDate,
      StudentYearLevel,
      StudentSemesterLevel,
      StudentUsername,
      StudentPassword, Teacher_LIST},
       success : function(data){
         if (data == 1) {
           alert("Student Enroll Successfully");
    window.location.reload(true);
         }
         else if (data == 2) {
           alert("Existed Student Enroll Successfully");
    window.location.reload(true);

         }else if (data == 3) {
               alert("No Teacher Available for this Courses");

         }else {
             alert("Error Try Again Later");

         }
       }
     });



}
});

////////////////////////////Add Subject///////////////////////////

$('.out1').on('click', 'button', function(){
  $(this).closest('li').remove();
});


$("#btnaddMN").on("click", function() {

// count++;
$("#inp1").append('<li><div class="ae-m-b"> ' +
'<div class="ae-td">' +
'<input type="text" class="Subject_Name"  name="Subject_Name[]" required>' +
'<label>Subject Name</label>' +
'</div> ' +
'<div class="ae-td">' +
'<input type="number" class="SYL" name="Year_Level[]" min="1" max="4"  required="required">' +
'<label>Year Level</label>' +
'</div> ' +
'<div class="ae-td mpxh">' +
'<input type="number" class="Subject_Grade" min="1" max="6" value="" name="Subject_Grade[]" oninput="SolvingCredits()" required>' +
'<label>Credits</label>' +
'</div> ' +
'<div class="ae-td">' +
'<input type="number" class="SSL" name="Semester_Level[]" min="1" max="2" required="required">' +
'<label>Semester Level</label>' +
'</div>' +
'<button class="pos-vb" id="v-itm" onclick="checkValue(this);"><span>S</span></button>'+
'</div></li>');

if ($('.SSL').val() <= 0) {
$('.SSL').val('1');
}else if($('.SSL').val() >= 2) {
$('.SSL').val('2');
}
$('.SSL').on('change', function() {
if ($('.SSL').val() <= 0) {
$('.SSL').val('1');
}else if($('.SSL').val() >= 3) {
$('.SSL').val('2');
}
})

$(document).on('keyup', '.SSL', function(e) {
if ($('.SSL').val() <= 0) {
$('.SSL').val('1');
}else if($('.SSL').val() >= 3) {
$('.SSL').val('2');
}
});

if ($('.SYL').val() <= 0) {
$('.SYL').val('1');
}else if($('.SYL').val() >= 5) {
$('.SYL').val('4');
}
$('.SYL').on('change', function() {
if ($('.SYL').val() <= 0) {
$('.SYL').val('1');
}else if($('.SYL').val() >= 5) {
$('.SYL').val('4');
}
});

$(document).on('keyup', '.SYL', function(e) {
if ($('.SYL').val() <= 0) {
$('.SYL').val('1');
}else if($('.SYL').val() >= 5) {
$('.SYL').val('4');
}
});
});


/////////////////////////////////////////////
if ($('.SSL').val() <= 0) {
$('.SSL').val('1');
}else if($('.SSL').val() >= 2) {
$('.SSL').val('2');
}
$('.SSL').on('change', function() {
if ($('.SSL').val() <= 0) {
$('.SSL').val('1');
}else if($('.SSL').val() >= 3) {
$('.SSL').val('2');
}
})

$(document).on('keyup', '.SSL', function(e) {
if ($('.SSL').val() <= 0) {
$('.SSL').val('1');
}else if($('.SSL').val() >= 3) {
$('.SSL').val('2');
}
});

if ($('.SYL').val() <= 0) {
$('.SYL').val('1');
}else if($('.SYL').val() >= 5) {
$('.SYL').val('4');
}
$('.SYL').on('change', function() {
if ($('.SYL').val() <= 0) {
$('.SYL').val('1');
}else if($('.SYL').val() >= 5) {
$('.SYL').val('4');
}
});

$(document).on('keyup', '.SYL', function(e) {
if ($('.SYL').val() <= 0) {
$('.SYL').val('1');
}else if($('.SYL').val() >= 5) {
$('.SYL').val('4');
}
});

$("#btnsaveSUBJECT").on("click", function() {

	var Subject_Name_Sample = Array.prototype.slice.call(document.getElementsByName('Subject_Name[]'));
	var Subject_Name = Subject_Name_Sample.map((o) => o.value);
	var Year_Level_Sample = Array.prototype.slice.call(document.getElementsByName('Year_Level[]'));
	var Year_Level = Year_Level_Sample.map((o) => o.value);
	var Subject_Grade_Sample = Array.prototype.slice.call(document.getElementsByName('Subject_Grade[]'));
	var Subject_Grade = Subject_Grade_Sample.map((o) => o.value);
	var Semester_Level_Sample = Array.prototype.slice.call(document.getElementsByName('Semester_Level[]'));
	var Semester_Level = Semester_Level_Sample.map((o) => o.value);
  let DataArray = $(this).serializeArray();
  let Error_Array = [];
	var Subject_Course = $('#Subject_Course').val();
	var Sub_dt = $('#Sub_dt').val();

  if (/^\s*$/.test(Subject_Course) || /^\s*$/.test(Sub_dt)){
			alert('please fill up all forms');
	}else if(typeof  Subject_Name != "undefined"
						&& Subject_Name != null
						&& Subject_Name.length != null
						&& Subject_Name.length > 0
						&& Year_Level != "undefined"
						&& Year_Level != null
						&& Year_Level.length != null
						&& Year_Level.length > 0
						&& Subject_Grade != "undefined"
						&& Subject_Grade != null
						&& Subject_Grade.length != null
						&& Subject_Grade.length > 0
						&& Semester_Level != "undefined"
						&& Semester_Level != null
						&& Semester_Level.length != null
						&& Semester_Level.length > 0){
						for (var i = 0; i < Subject_Name.length; i++) {
								if (  Subject_Name[i] == "" || Subject_Name[i] == " " || Year_Level[i] == "" || Year_Level[i] == " " ||
                  Subject_Grade[i] == "" || Subject_Grade[i] == " " ||  Semester_Level[i] == ""||Semester_Level[i] == " " ) {
									Error_Array.push(1);
								}else {
									Error_Array.push(0);
								}
								DataArray.push({
                  Subject_Name:Subject_Name[i],
                  Year_Level:Year_Level[i],
                  Subject_Grade:Subject_Grade[i],
                  Semester_Level:Semester_Level[i]
									});
							}	if (Error_Array.includes(1) == true) {
              	alert('Please fill up all forms');
              }
							else
							{
						 	$.ajax({
										url: "includes/insert-new-subjects.php",
										data: {DataArray,Subject_Course,Sub_dt},
										type: "post",
										success : function(data){
                      if (!!data) {
                        alert('Inputed Subject ' + data +' is Exist');
                      }else {
                          alert('Subject Add');
                    window.location.reload(true);
                      }
										}});
							}
	}else{
	alert('Please fill up all forms');
	}
});


$("#SaveCourse").on("click", function() {
  var Course_Name = $('#Course_Name').val();
  var Year_Begin = $('#Year_Begin').val();
	var Course_Code = $('#Course_Code').val();
	var Total_Credit_Points = $('#Total_Credit_Points').val();

  $.ajax({
        url: "includes/insert-Course.php",
        data: {Course_Name,Year_Begin,Course_Code,Total_Credit_Points},
        type: "post",
        success : function(data){
          if (data == '1') {
            alert('Course Added');
      window.location.reload(true);
    }else if (data == '2'){
              alert('Course Already Exist');
          }
        }
      });

});

});
function SolvingCredits() {
let TotalAll = 0;
let TotalAll1 = 0;
let TotalCrid = parseInt($('#Sub_Cred_Points').val());
var sa =  document.getElementsByName('Subject_Grade[]');
var tc = parseInt(TotalCrid);
  if (!TotalCrid) {
  alert("Please Choose or Enter Your Course");

    for (var i = 0; i < sa.length; i++) {
  document.getElementsByName('Subject_Grade[]')[i].value = "";
}
}else {
  for (var i = 0; i < sa.length; i++) {
    TotalAll +=  parseInt(sa[i].value);
  }
  TotalAll1 = TotalCrid - TotalAll;

   if (parseInt(TotalAll1)  < 0) {
     alert("Total of Credits must not be Greater than the Credit Requirement of Courses");
     for (var i = 0; i < sa.length; i++) {
     document.getElementsByName('Subject_Grade[]')[i].value = "";
     }
   }
}
}
 </script>
