<?php
include("includes/header.php");
 ?><div class="w-g flx ctr">
    <div class="w-su c">
      <div class="gs-h">
        <a>Sign Up Information</a>
        <p>Don't tell anyone about your login information.
          Make sure that your password is not easy to guess.</p>
      </div>
      <div class="fd-clm flx sb">
        <div class="ae-td">
          <input type="text" id="username" pattern="[a-zA-Z0-9]+"
          title="Special Character is Prohibited" required>
          <label>Username</label>
        </div>
        <div class="mgn"></div>
        <div class="ae-td" >
          <select id="cbGender" required>
            <option style="display:none;"></option>
            <option >Male</option>
            <option >Female</option>
            <option >Undecided</option>
          </select>
          <label>Gender</label>
        </div>
      </div>
      <div class="fd-clm flx sb">
        <div class="ae-td">
          <input type="text" id="reg_fname" value=" " required>
            <label>First Name</label>
        </div>
        <div class="mgn"></div>
        <div class="ae-td">
          <input type="text" id="reg_lname"  value="" required>
             <label>Last Name</label>
        </div>
      </div>
      <div class="fd-clm flx sb">
        <div class="flx sb">
						<div class="ae-td">
							<select name="cbBirthMonth" id="cbBirthMonth" required>
							 <option style="display:none;"></option>
							 <option >January</option>
							 <option >February</option>
							 <option >March</option>
							 <option >April</option>
							 <option >May</option>
							 <option>June</option>
							 <option>July</option>
							 <option>August</option>
							 <option>September</option>
							 <option>October</option>
							 <option>November</option>
							 <option>December</option>
						 </select>
							<label>Birth Month</label>
						</div>
						<div class="mgn"></div>
						<div class="ae-td" style="width: 150px;">
							<select id="cbDay" name="cbBirthDay"  required>
								<option style="display:none;"></option>
							</select>
							<label>Date</label>
						</div>
						<div class="mgn"></div>
						<div class="ae-td" style="width: 170px;">
							<select id="years" name="cbBirthYear"  required>
								<option style="display:none;"></option>
							</select>
							<label>Year</label>
						</div>
					</div>
        <div class="mgn"></div>
        <div class="ae-td" >
          <input id="contact" type="text" name="txtbContact" required>
          <label>Contact Number</label>
        </div>
      </div>

      <div class="ae-bi-mb" >
         <div class="ae-td" style="display:none">
          <input name="txtbLocation"  id="address" type="text" value="Please update your location">
          <label>Location (City)</label>
        </div>
      </div>

      <div class="fd-clm flx sb">
        <div class="ae-td">
          <input type="text" name="reg_email" id="reg_email" value=" " required>
          <label>Email Address</label>
        </div>

      </div>
      <div class="fd-clm flx sb">
        <div class="ae-td">
          <input type="password" name="reg_password" id="reg_password"  required>
          <label>Password</label>
        </div>
        <div class="mgn"></div>
        <div class="ae-td">
          <input type="password" name="reg_password2" id="reg_password2" required>
          <label>Confirm Password</label>
        </div>
      </div>
      <hr>
      <br>
      <div class="fd-clm flx sb">

        <div class="ae-bi-ml w-100 ">
          <div class="kbtn-su">
            <button  id="Register-Submit" name="register_button">
              <a>Sign Up</a>
            </button>
          </div>
          <div class="mgn"></div>
          <div class="kbtn-su">
            <button  id='sign_in'>
              <a>Sign In</a>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="su-wrn">


    <a class ="user_error" style="color:red; width:100%; height:50%; font-size:14px; line-height:200%;">
         <a class ="user_error" style="color:red; width:100%; height:50%; font-size:14px; line-height:200%;">
    </a>

    </div>
</div>
<script>

$( document ).ready(function() {
	var nowY = new Date().getFullYear(),options = "";
	for(var Y=nowY; Y>=1940; Y--) {options += "<option>"+ Y +"</option>";}
	$("#years").append( options );
	var day = "";
	for(var d=1;d<=31;d++){day +="<option value='"+d+"'>"+d+"</option>"}
	$("#cbDay").append( day )

	document.getElementById("contact").onkeypress = function(e){
		var length = jQuery(this).val().length;
		if(length > 10) {
					return false;
		 } else if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
					return false;
		 } else if((length == null) && (e.which == 48)) {
					return false;
		 }
	};
});


$('#sign_in').on('click',function(e) {
  window.location.href = 'sign-in';
});

$('#Register-Submit').on('click',function(e) {

let username = $('#username').val();
let cbGender = $('#cbGender').val();
let reg_fname = $('#reg_fname').val();
let reg_lname = $('#reg_lname').val();
let cbBirthMonth = $('#cbBirthMonth').val();
let cbDay = $('#cbDay').val();
let years = $('#years').val();
let contact = $('#contact').val();
let address = $('#address').val();
let reg_email = $('#reg_email').val();
let reg_password = $('#reg_password').val();
let reg_password2 = $('#reg_password2').val();

  if (/^\s*$/.test(username) || /^\s*$/.test(cbGender) || /^\s*$/.test(reg_fname) || /^\s*$/.test(reg_lname)
 || /^\s*$/.test(cbBirthMonth)  || /^\s*$/.test(cbDay)  || /^\s*$/.test(years)  || /^\s*$/.test(contact)
 || /^\s*$/.test(address)  || /^\s*$/.test(reg_email)  || /^\s*$/.test(reg_password)  || /^\s*$/.test(reg_password2)){
   alert("Please Fill up all blanks!");
  }
  else if (reg_password == reg_password2){
    $.ajax({
 url: "includes/inc-Register.php",
 type: "post",
 data: {username,cbGender,reg_fname,reg_lname,cbBirthMonth,cbDay,years,contact,address,reg_email,reg_password},
 success : function(data){
   if (data = '1')
   {
   alert('Register Successfully ' );
    window.location.reload(true);
  }
  else if (data = '2') {

    alert('Username Exist' );
  }
  else if (data = '3') {
      alert('Email Exist' );
  }
    else {
      alert('Please try again Later ');
        window.location.reload(true);
    }
 }
});
  }
  else {
       alert("It must be the same password!");
  }
});

</script>
