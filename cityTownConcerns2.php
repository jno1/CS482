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

</style>
</head>
<body style="overflow:hidden;">


<div class="w3-bar  w3-theme w3-large" >
  	<span> Welcome, <?php echo $currUserID;?> <a href="logout.php"><b>(logout)</b></a></span>
			
				
 	 <span class="w3-bar-item w3-text-theme-d2 w3-right">City Town</span>
	<span class="w3-bar-item w3-text-theme-d2 w3-left"></span>
</div>



<div class="w3-col s8 w3-bar w3-text-grey" style="margin-left:5px">
      <b><p id="time"></p></b>
    </div>


<header class="w3-container w3-text-grey">

    <h5><b><i class="fa fa-user-circle "></i> MY ACCOUNT</b></h5>

  </header>


<ul>

  	<li><a class="active" href="BackendHome.php"><i class="fa fa-home"></i> HOME</a></li>
	<li><a href="caseHistory.php"> <i class="fa fa-credit-card-alt"></i>  Case History</a></li>
	<li><a href="cityTownConcerns2.php"><i class="fa fa-question"></i>  MY CONCERNS</a></li>
	<li><a href="accountsettings2.php"><i class="fa fa-cog"></i>  ACCOUNT SETTINGS</a></li>
</ul>

<!-- End  -->

	


<!-- Javascript for date -->
<script>
var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>
<!-- End  -->

<!--  Right Column -->
<h2>
	<center> City Town</center>
</h2>

<div>
	<center><p><b>Concerns/Feedback</b></p><center>
		<form action="submitConcern.php" method="POST">
			Type of feedback: <select name="feedback">
				<option value="----">----</option>
				<option value="Questions">Questions</option>
				<option value="Concerns">Concerns</option>
				<option value="Comments">Comments</option>
			</select>
			<p>
			Department to send to: <select name="department">
				<option value="----">----</option>
				<option value="Town Administrator">Town Administrator</option>
				<option value="Town Clerk">Town Clerk</option>
				<option value="Police Department">Police Department</option>
				<option value="Fire Department">Fire Department</option>
			</select>
			<p>
				<textarea placeholder="Explain..." id="explain" name="explain" maxlength="1000" rows="10" cols="50" onkeyup="countChar(this)"></textarea>
			</p>
			<span id="chars">1000</span> characters remaining <p>
			<input type="submit" onclick="alertMsg()" />
		</form>
	</center>
</div>

<script>
	function alertMsg() {
		alert("Thank you for your submission");
	}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
var maxLength = 1000;
$('textarea').keyup(function() {
	var length = $(this).val().length;
	var length = maxLength-length;
	$('#chars').text(length);
});
</script>
			
		<!-- End Right Column -->
</body>
</html>
