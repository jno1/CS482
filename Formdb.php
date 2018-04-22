<!DOCTYPE html>
<html lang="en">
	<head>

	</head>
	<body>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>City Town New Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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

  	<li><a class="active" href="FrontendHome.php"><i class="fa fa-home"></i> HOME</a></li>
	<li><a href="dropdown_BloodTypes.php"> <i class="fa fa-credit-card-alt"></i>  MY PAYMENTS</a></li>
	<li><a href="cityTownConcerns.php"><i class="fa fa-question"></i>  MY
	CONCERNS</a></li>
	<li><a href="accountsettingsHTML.php"><i class="fa fa-cog"></i>  ACCOUNT SETTINGS</a></li>
</ul>

	<script>
var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>

	<div class="container" style="margin-left:220px" >
	  <fieldset>
		 <h2>ALARM USER PERMIT APPLICATION</h2>
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
		include ("dbConnect.php");

		$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
		$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
		$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		$AlarmAd = filter_var($_POST['AlarmAd'], FILTER_SANITIZE_STRING);
		$AD = filter_var($_POST['AD'], FILTER_SANITIZE_STRING);
		$TA = filter_var($_POST['TA'], FILTER_SANITIZE_STRING);
		$LO = filter_var($_POST['LO'], FILTER_SANITIZE_STRING);
		$CS = filter_var($_POST['CS'], FILTER_SANITIZE_STRING);
		$ACname = filter_var($_POST['ACname'], FILTER_SANITIZE_STRING);
		$ACaddress = filter_var($_POST['ACAddress'], FILTER_SANITIZE_STRING);
		$ACphone= filter_var($_POST['ACphone'], FILTER_SANITIZE_STRING);
		$Ename1 = filter_var($_POST['Ename1'], FILTER_SANITIZE_STRING);
		$Ephone1 = filter_var($_POST['Ephone1'], FILTER_SANITIZE_STRING);
		$Ename2 = filter_var($_POST['Ename2'], FILTER_SANITIZE_STRING);
		$Ephone2 = filter_var($_POST['Ephone2'], FILTER_SANITIZE_STRING);
		$Ename3 = filter_var($_POST['Ename3'], FILTER_SANITIZE_STRING);
		$Ephone3 = filter_var($_POST['Ephone3'], FILTER_SANITIZE_STRING);
		$appElecSig = filter_var($_POST['appElecSig'], FILTER_SANITIZE_STRING);

	
			$sql1 = "Select police, fire, alarm, totaldepts From TypeOfForm";
			$result1 = $conn->query($sql1) or die('Could not run query: '.$conn->error);
			$row = $result->fetch_assoc(); 
			$po = $row["$police"];
			$fi = $row["fire"];
			$al = $row["alarm"];
			$tot = $row["totaldepts"]

	
	$sql = "INSERT INTO forms(type_ID, user_ID, dept_ID, fname, lname, address, AlarmAd, AD, TA, LO, CS, ACname, ACAddress, ACphone, Ename1, Ephone1, Ename2, Ephone2, Ename3, Ephone3, appElecSig, totaldepts) VALUES(1, 1, 1, '$fname', '$lname', '$address', '$AlarmAd', '$AD','$TA','$LO','$CS','$ACname', '$ACAddress', '$ACphone', '$Ename1', '$Ephone1', '$Ename2', '$Ephone2', '$Ename3','$Ephone3', '$appElecSig', '$tot')";
		if($conn->query($sql))
			{

				$sql = "INSERT INTO formapproval(type_ID, user_ID, dept_ID, fname, lname, address, AlarmAd, AD, TA, LO, CS, ACname, ACAddress, ACphone, Ename1, Ephone1, Ename2, Ephone2, Ename3,Ephone3, appElecSig) VALUES(1, 1, 1, '$fname', '$lname', '$address', '$AlarmAd', '$AD','$TA','$LO','$CS','$ACname', '$ACAddress', '$ACphone', '$Ename1', '$Ephone1', '$Ename2', '$Ephone2', '$Ename3','$Ephone3', '$appElecSig')";
				$sql = "INSERT INTO forms(type_ID, user_ID, dept_ID, fname, lname, address, AlarmAd, AD, TA, LO, CS, ACname, ACAddress, ACphone, Ename1, Ephone1, Ename2, Ephone2, Ename3,Ephone3, appElecSig) VALUES(1, 1, 1, '$fname', '$lname', '$address', '$AlarmAd', '$AD','$TA','$LO','$CS','$ACname', '$ACAddress', '$ACphone', '$Ename1', '$Ephone1', '$Ename2', '$Ephone2', '$Ename3','$Ephone3', '$appElecSig')";

				echo "Your form was submitted, Thank you."; 
			}
			else
			{
				echo "Error: ".$sql."<br>".$conn->error;
			}
	
	
	
	
	
	
	
	?>


			<br><br>

			<p><b>Please click pay to enter your payment information</b></p>
			<form id="form" method="post" action="paymentpageHTML.php" role="form">
			
						<button type="submit" class="btn btn-primary">Pay</button>
		</form>
		</div>

			</fieldset>
	</div>
	</body>
		</html>


