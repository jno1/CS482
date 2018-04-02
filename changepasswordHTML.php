<?php 
	session_start();
	if (isset($_SESSION['username']))
	{
		$currUserID = $_SESSION['username'];
	}
	else
	{
		header("Location: logout.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>City Town</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	body{font-family: 'Quicksand', sans-serif;}
	.w3-theme {color:#fff !important;background-color:#024575 !important}

	.w3-text-theme-d1 {color:#024575 !important}
	.w3-text-theme-d2 {color:#e9f5ff !important}
	.w3-hover-text-theme-d1 {color: #e9f5ff !important}
ul {
    list-style-type: none;
    margin: 9px;
    padding: 0;
    width: 200px;
    background-color: #f7f7f7;
    height: 100%;
    position: fixed;
    overflow: auto;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   
}

li a {
    display: block;
    color:#666666;
    padding: 16px 4px;
    text-decoration: none;
}

li a.active {
    background-color:#024575;
    color: white;
}

li a:hover:not(.active) {
    background-color: #024575 ;
    color: white;
}

h1{
    align-text:left;
}
#message {
	display:none;
	background: #f1f1f1;
	color: #000;
	position: relative;
	padding: 20px;
	margin-top: 10px;
}

#message p {
	padding: 10px 35px;
	font-size: 18px;
}
</style>
</head>
<body style="overflow:hidden;">

<!-- Top Bar -->
<div class="w3-bar  w3-theme w3-large" >
  	<span> Welcome, <?php echo $currUserID;?> <a href="logout.php"><b>(logout)</b></a></span>
			
				
 	 <span class="w3-bar-item w3-text-theme-d2 w3-right">City Town</span>
	<span class="w3-bar-item w3-text-theme-d2 w3-left"></span>
</div>
<!-- End of Top Bar -->

<!-- Name and Date -->

<div class="w3-col s8 w3-bar w3-text-grey" style="margin-left:5px">
      <b><p id="time"></p></b>
    </div>
<!-- End  -->

<!-- Left Column -->
<header class="w3-container w3-text-grey">

    <h5><b><i class="fa fa-user-circle "></i> MY ACCOUNT</b></h5>

 </header>



<ul>

  	<li><a class="active" href="Frontendhome.php"><i class="fa fa-home"></i> HOME</a></li>
	<li><a href="dropdown_BloodTypes.php"> <i class="fa fa-credit-card-alt"></i> CASE HISTORY</a></li>
	<li><a href="cityTownConcerns.php"><i class="fa fa-question"></i>  MY CONCERNS</a></li>
	<li><a href="accountsettings.php"><i class="fa fa-cog"></i>  ACCOUNT SETTINGS</a></li>
</ul>

<!-- End  -->

	


<!-- Javascript for date -->
<script>
var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>
<!-- End  -->

<!--  Right Column -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">
<div class="w3-row-padding">
  
<div class="w3-twothird" style="margin-left:300px">
		

		<div class="w3-container w3-card w3-white w3-margin-bottom">
		<h2 class="w3-text-grey w3-padding-16"><i class="fa fa-cog fa-fw w3-margin-right w3-xxlarge w3-text-theme"></i>Account settings</h2>
			<b>Change Password</b>
				<form action="changepassword.php">
		<fieldset>
			<legend></legend>
    		Current Password: <input type="password" name="oldpassword" placeholder=""> <br><br>
    		
    		New Password: <input type="password" name="password" placeholder=""> <br><br>

			<div id="message">
				<h3>Password must contain the following:</h3>
				<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
				<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
				<p id="number" class="invalid">A <b>number</b></p>
				<p id="length" class="invalid">Minimum <b>8 characters</b></p>
			</div>

			<script>
			var myInput = document.getElementById("password");
			var letter = document.getElementById("letter");
			var capital = document.getElementById("capital");
			var number = document.getElementById("number");
			var length = document.getElementById("length");

			// When the user clicks on the password field, show the message box
			myInput.onfocus = function() {
				document.getElementById("message").style.display = "block";
			}

			// When the user clicks outside of the password field, hide the message box
			myInput.onblur = function() {
				document.getElementById("message").style.display = "none";
			}

			// When the user starts to type something inside the password field
			myInput.onkeyup = function() {
				// Validate lowercase letters
				var lowerCaseLetters = /[a-z]/g;
				if(myInput.value.match(lowerCaseLetters)) {  
					letter.classList.remove("invalid");
					letter.classList.add("valid");
				} else {
					letter.classList.remove("valid");
					letter.classList.add("invalid");
				}
	
				// Validate capital letters
				var upperCaseLetters = /[A-Z]/g;
				if(myInput.value.match(upperCaseLetters)) {  
					capital.classList.remove("invalid");
					capital.classList.add("valid");
				} else {
					capital.classList.remove("valid");
					capital.classList.add("invalid");
				}

				// Validate numbers
				var numbers = /[0-9]/g;
				if(myInput.value.match(numbers)) {  
					number.classList.remove("invalid");
					number.classList.add("valid");
				} else {
					number.classList.remove("valid");
					number.classList.add("invalid");
				}
	
				// Validate length
				if(myInput.value.length >= 8) {
					length.classList.remove("invalid");
					length.classList.add("valid");
				} else {
					length.classList.remove("valid");
					length.classList.add("invalid");
				}
			}
			</script>
	    		Re-enter Password: <input type="password" name="password1" placeholder=""> <br><br>


    		<br><br>

    		<input type="submit" value="Submit">
			<button type="reset" value="Reset">Reset</button> 
		</fieldset>
	</form>
								

	</div>
	
</div>

			
		<!-- End Right Column -->
</div>
</div>

</body>
</html>
