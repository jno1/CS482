<!DOCTYPE html>
<html lang="en">
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

#messages {
			display:none;
			background: #f1f1f1;
			color: #000;
			position: relative;
			padding: 20px;
			margin-top: 10px;
	}

	#messages p {
			padding: 10px 35px;
			font-size: 18px;
	}

	
	/* Add a green text color and a checkmark when the requirements are right */
	.valid {
			color: green;
	}

	.valid:before {
			position: relative;
			left: -35px;
			content: "✔";
	}

	/* Add a red text color and an "x" when the requirements are wrong */
	.invalid {
			color: red;
	}

	.invalid:before {
			position: relative;
			left: -35px;
			content: "✖";
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

    <h5><b><i class="fa fa-user-circle "></i> ADMINISTRATIVE ACCOUNT</b></h5>

 </header>



<ul>
  	<li><a class="active" href="alogin.php"><i class="fa fa-home"></i> HOME</a></li>
	<li><a href="createUser.php"> <i class="fa fa-credit-card-alt"></i>  CREATE USER</a></li>
	<li><a href="deleteUser.php"><i class="fa fa-question"></i>  DELETE USER</a></li>
	<li><a href="updatePW.php"><i class="fa fa-cog"></i>  UPDATE PASSWORD</a></li>
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
		<h2 class="w3-text-grey w3-padding-16"><i class="fa-fw w3-margin-right w3-xxlarge w3-text-theme"></i>Update Password</h2>
				<form action="UpdateUser.php">
		<fieldset>
			<legend></legend>
			

			<p>Enter the following information </p>
    			Username: <input type="text" placeholder="Enter username" name="user"><p>
	New Password: <input type="password" id="psw" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pass" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><p>

	<div id="messages">
		<h3>Password must contain the following:</h3>
		<p id="letters" class="invalid">A <b>lowercase</b> letter</p>
		<p id="capitals" class="invalid">A <b>capital (uppercase)</b> letter</p>
		<p id="numbers" class="invalid">A <b>number</b></p>
		<p id="lengths" class="invalid">Minimum <b>8 characters</b></p>
	</div>

	<script>
	var myInputs = document.getElementById("psw");
	var letters = document.getElementById("letters");
	var capitals = document.getElementById("capitals");
	var numbers = document.getElementById("numbers");
	var lengths = document.getElementById("lengths");

	// When the user clicks on the password field, show the message box
	myInputs.onfocus = function() {
		document.getElementById("messages").style.display = "block";
	}

	// When the user clicks outside of the password field, hide the message box
	myInputs.onblur = function() {
		document.getElementById("messages").style.display = "none";
	}

	// When the user starts to type something inside the password field
	myInputs.onkeyup = function() {
		// Validate lowercase letters
		var lowerCaseLetter = /[a-z]/g;
		if(myInputs.value.match(lowerCaseLetter)) {  
			letters.classList.remove("invalid");
			letters.classList.add("valid");
		} else {
			letters.classList.remove("valid");
			letters.classList.add("invalid");
		}
	
		// Validate capital letters
		var upperCaseLetter = /[A-Z]/g;
		if(myInputs.value.match(upperCaseLetter)) {  
			capitals.classList.remove("invalid");
			capitals.classList.add("valid");
		} else {
			capitals.classList.remove("valid");
			capitals.classList.add("invalid");
		}

		// Validate numbers
		var number = /[0-9]/g;
		if(myInputs.value.match(number)) {  
			numbers.classList.remove("invalid");
			numbers.classList.add("valid");
		} else {
			numbers.classList.remove("valid");
			numbers.classList.add("invalid");
		}
	
		// Validate length
		if(myInputs.value.length >= 8) {
			lengths.classList.remove("invalid");
			lengths.classList.add("valid");
		} else {
			lengths.classList.remove("valid");
			lengths.classList.add("invalid");
		}
	}
	</script>									
	Confirm New Password: <input type="password" id="passConfirm" placeholder="Re-enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"name="passConfirm" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><p>    				

    		<br><br>

    		<input type="submit" onclick="alertMsg()" value="Submit">
			<button type="reset" value="Reset">Reset</button> 
			
			<script>
				function alertMsg(){
					alert("Successfully updated user");
				}
			</script>
		</fieldset>
	</form>
								

	</div>
	
</div>

			
		<!-- End Right Column -->
</div>
</div>

</body>
</html>