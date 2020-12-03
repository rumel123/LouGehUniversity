 <?php
 include("includes/header.php"); 
 if (isset($_SESSION["User_ID"])) {
header("location:Home");
 }
  ?>

  <div class="w-g flx ctr">
     <div class="w-su c">
       <div class="gs-h">
         <a>LogIn To Lou-Geh-University</a>
       </div>
       <form   method="post">

       </form>
       <div class="fd-clm flx sb">
         <div class="ae-td">
           <input type="text" id="username" pattern="[a-zA-Z0-9]+"
           title="Special Character is Prohibited" required>
           <label>Username</label>
         </div>
         <div class="mgn"></div>

       </div>
       <div class="fd-clm flx sb">
         <div class="ae-td">
           <input type="password" name="reg_password" id="reg_password"  required>
           <label>Password</label>
         </div>
         <div class="mgn"></div>

       </div>
       <hr>
       <br>
       <div class="fd-clm flx sb">

         <div class="ae-bi-ml w-100 ">
           <div class="kbtn-su">
             <button type="button"  id="Login-Submit" value="Login"name="Login_button">
               <a>Sign In</a>
             </button>
           </div>
         </form>
           <div class="mgn"></div>

         </div>
         <div class="ae-bi-ml w-100 ">
           <div class="kbtn-su">
             <button id='Sign_up'>
               <a>Sign Up</a>
             </button>
           </div>
           <div class="mgn"></div>

         </div>
       </div>
     </div>
     <div class="su-wrn">


     <a class ="user_error" style="color:red; width:100%; height:50%; font-size:14px; line-height:200%;">

                   <!--Message of error-->
                   <a class ="user_error" style="color:red; width:100%; height:50%; font-size:14px; line-height:200%;">
     </a>

     </div>
  </div>
<script>
$('#Sign_up').on('click',function(e) {
  window.location.href = 'register';
});

$('#Login-Submit').on('click',function(e) {
  let username = $('#username').val();
  let reg_password = $('#reg_password').val();
  if (/^\s*$/.test(username) || /^\s*$/.test(reg_password))
  {
    alert("Please Fill up all blanks!");
  }
  else {
    $.ajax({
 url: "includes/inc-login.php",
 type: "post",
 data: {username,reg_password},
 cache: false,
 success : function(data){
   if (data == '1')
   {
   alert('Login Successfully ' );
   window.location.href = 'home';
  }
    else {
      alert('Incorrect Username or Password');
  window.location.reload(true);
    }
 }
});

  }
});

</script>
