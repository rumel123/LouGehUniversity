<?php

include("../config/config.php");
$StudentFname1 = filter_var($_POST['StudentFname'], FILTER_SANITIZE_STRING);
$StudentFname = mysqli_real_escape_string($con, $StudentFname1);
$StudentLname1 = filter_var($_POST['StudentLname'], FILTER_SANITIZE_STRING);
$StudentLname = mysqli_real_escape_string($con, $StudentLname1);
$StudentCourse1 = filter_var($_POST['StudentCourse'], FILTER_SANITIZE_STRING);
$StudentCourse = mysqli_real_escape_string($con, $StudentCourse1);
$StudentBirthDate1 = filter_var($_POST['StudentBirthDate'], FILTER_SANITIZE_STRING);
$StudentBirthDate = mysqli_real_escape_string($con, $StudentBirthDate1);
$StudentYearLevel1 = filter_var($_POST['StudentYearLevel'], FILTER_SANITIZE_STRING);
$StudentYearLevel = mysqli_real_escape_string($con, $StudentYearLevel1);
$StudentSemesterLevel1 = filter_var($_POST['StudentSemesterLevel'], FILTER_SANITIZE_STRING);
$StudentSemesterLevel = mysqli_real_escape_string($con, $StudentSemesterLevel1);
$StudentUsername1 = filter_var($_POST['StudentUsername'], FILTER_SANITIZE_STRING);
$StudentUsername = mysqli_real_escape_string($con, $StudentUsername1);
$StudentPassword1 = filter_var($_POST['StudentPassword'], FILTER_SANITIZE_STRING);
$StudentPassword = mysqli_real_escape_string($con, $StudentPassword1);
$Teacher_LIST1 = filter_var($_POST['Teacher_LIST'], FILTER_SANITIZE_STRING);
$Teacher_LIST = mysqli_real_escape_string($con, $Teacher_LIST1);
$DataArray = $_POST['DataArray'];
function UserID($lenght = 8) {
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
  }

  $USER_ID = 'UI-'.UserID();
  $STUDENT_ID = 'SI-'.UserID();
  $TC_ID = 'TI-'.UserID();


  $Date = date("Y/m/d");
$SQL_FETCH_STUDENT_ID = "SELECT * FROM students
    INNER JOIN user ON user.username = students.student_username
    WHERE students.student_username = '$StudentUsername'
    AND students.student_firstname = '$StudentFname' AND students.student_lastname = '$StudentLname' AND students.course_id = '$StudentCourse' ";
$result_FETCH_STUDENT = mysqli_query($con,$SQL_FETCH_STUDENT_ID);
if (mysqli_num_rows($result_FETCH_STUDENT) > 0) {

 }
else {
  for($Array_Series=0; $Array_Series < count($DataArray); $Array_Series++)
  {
    $subject_id = $DataArray[$Array_Series]['subject_id'];
    $SQL_INSERT_STUD_SUB = mysqli_query($con,"INSERT INTO
      `student_subjects`(`student_id`, `subject_id`, `status`, `taken_course_id`) VALUES
        ('$STUDENT_ID','$subject_id','0','$TC_ID')");
  }
 $SQL_INSERT_STUDENT = mysqli_query($con,"INSERT INTO `students`(`student_id`, `teacher_id`, `course_id`, `subject_year_level`, `user_id`, `student_firstname`, `student_lastname`, `student_username`, `student_birthdate`, `student_year_enroll`, `student_sem_level`)
                    VALUES ('$STUDENT_ID','$Teacher_LIST','$StudentCourse','$StudentYearLevel','$USER_ID','$StudentFname','$StudentLname','$StudentUsername','$StudentBirthDate','$Date','$StudentSemesterLevel')");
 $SQL_INSERT_USER = mysqli_query($con,"INSERT INTO `user`(`User_ID`, `User_level`, `username`, `password`, `gender`, `firstname`, `lastname`, `birthdate`, `contactnumber`, `email`) VALUES
                                       ('$USER_ID','STUDENT','$StudentUsername','$StudentPassword','UNKNOWN','$StudentFname','$StudentLname','$StudentBirthDate','UNKNOWN','UNKNOWN');");

                                                        echo "1";

 }

?>
