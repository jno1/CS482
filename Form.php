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
		<p><b>APPLICANT - owner or tenant of record</b></p>
		<form action="paymentpage.html">
			<div class="form-group">
				<label for="fnmae">Name:</label>
				<input type="email" class="form-control" id="fname" placeholder="Enter First name" name="email">
				<input type="lname" class="form-control" id="lname" placeholder="Enter Last name" name="email">
			</div>
			
		 <div class="form-group">
				<label for="address">Address:</label>
				<input type="address" class="form-control" id="address" placeholder="Enter Address" name="address">
			</div>
					
			<div class="form-group">
				<label for="alarmAd">Address of Alarmed Premise:</label>
				<input type="alarmAd" class="form-control" id="alarmAd" placeholder="Enter Address" name="alarmAd">
			</div>
			
		<div class="form-check">
			<p><b>ALERTING DEVICE(s) - check applicable box</b></p>
			<div>
			<label class="form-check-label" >
					<div>
					<input class="form-check-input" type="checkbox" name="remember"> SILENT - no audible signals emitted</div>
					<div>
					<input class="form-check-input" type="checkbox" name="remember"> AUDIBLE INTERIOR - alerting devices audible within premises only</div>
					
					<div>
					<input class="form-check-input" type="checkbox" name="remember"> AUDIBLE INTERIOR - alerting devices audible within premises only</div>
					<div>
					<input class="form-check-input" type="checkbox" name="remember"> AUDIBLE EXTERIOR - alerting devices audible outside of premises</div>
					<div>
					<input class="form-check-input" type="checkbox" name="remember"> AUDIBLE INTERIOR / EXTERIOR - alerting devices audible inside and outside	
		</div>	
		</label>			
		</div>
			
		<div class="form-check">
			<p><b>TYPE OF ALARM SYSTEM - check applicable box</b></p>
			<div>
			<label class="form-check-label" >
					<div>
					<input class="form-check-input" type="checkbox" name="remember"> LOCAL ALARM - alarm sounds within or outside of premises ONLY - no connections</div>
					<div>
					<input class="form-check-input" type="checkbox" name="remember"> CENTRAL STATION ALARM - system interconnected to a private security and /or monitoring facility by any method
		</div>
		</label>
		</div>
			
		<div class="form-check">
			<p><b>LOCAL ORDINANCE COMPLIANCE - check applicable box</p>
			<p>A.	Systems equipped with an audible alerting device which is perceptible outside of the alarmed premises must incorporate a device which will silence such audible signals within twenty (20) minutes of its activation.</b></p>
				<div>
				<label class="form-check-label" >
					<div>
					<input class="form-check-input" type="checkbox" name="remember"> SILENT - no audible signals emitted</div>
					<div>
					<input class="form-check-input" type="checkbox" name="remember"> System equipped with silencing device as required</div>
					
					<div>
					<input class="form-check-input" type="checkbox" name="remember"> System not so equipped</div>
					<div>
					<input class="form-check-input" type="checkbox" name="remember"> Not applicable - no audible signal perceptible outside of premises
			</div>
			</label>
			</div>
			
			<div class="form-check">
				
				<p><b>B.        Central Station Alarm users must ensure that, prior to police notification of an alarm
				activation, the central  station monitoringfacility must first attempt to verify the authenticity of the alarm and the need for emergency response by police personnel. ThisMUSTinclude an attempt to contact personsat the alarmed premises. (Thisrequirement doesnot apply to holdup, panicor fire signals).</p></b>
					<div>
					<label class="form-check-label" >
						<div>
						<input class="form-check-input" type="checkbox" name="remember"> Central Station facility required to make verification callsasrequired</div>
						<div>
						<input class="form-check-input" type="checkbox" name="remember"> Central Station facility doesnot make verification calls</div>
						
						<div>
						<input class="form-check-input" type="checkbox" name="remember"> Not applicable - not central station alarm
				</div>
				</label>
				</div>	
				
				<p><b>ALARM SERVICE AGENCY - firm which currently services your system</b></p>
					<div class="form-group">
						<label for="fnmae">Name of Alarm Company:</label>
						<input type="email" class="form-control" id="fname" placeholder="Enter name" name="email">
					
					</div>
					
				 <div class="form-group">
						<label for="address">Address:</label>
						<input type="address" class="form-control" id="address" placeholder="Enter Address" name="address">
					</div>
							
					<div class="form-group">
						<label for="alarmAd">Telephone:</label>
						<input type="alarmAd" class="form-control" id="alarmAd" placeholder="Enter telephone number" name="alarmAd">
					</div>
					
					
					<p><b>EMERGENCY CONTACT LIST - persons (including yourself) who should be contacted in the event of an on premises emergency. A minimum of two names should he submitted, preferably persons who have access to the promises and are familiar with the alarm system.</b></p>
						<div class="form-group">
							<label for="fnmae">1. Name: </label>
							<input type="email" class="form-control" id="fname" placeholder="Enter name" name="email">
							
							<input type="email" class="form-control" id="fname" placeholder="Enter telephone" name="email">
						
						</div>
						
					 <div class="form-group">
							<label for="fnmae">2. Name: </label>
							<input type="email" class="form-control" id="fname" placeholder="Enter name" name="email">
							
							<input type="email" class="form-control" id="fname" placeholder="Enter telephone" name="email">
						</div>
								
						<div class="form-group">
							<label for="fnmae">3. Name: </label>
							<input type="email" class="form-control" id="fname" placeholder="Enter name" name="email">
							
							<input type="email" class="form-control" id="fname" placeholder="Enter telephone" name="email">
						</div>
						<p><center>PLEASE CONTACT THE CLERK'S OFFICE IN WRITING OF ANY CHANGES IN YOUR CONTACT LIST</center></p>
			<p><b>I hereby apply for an Alarm Users Permit pursuant to the provisions of Local Law No. 1-1988 of the Town of Mamaroneck, Now York. I certify that the information I have provided herein is accurate. Furthermore, I have received a copy of the current local ordinance regulating and controlling
			alarm systems within the Unincorporated Area of the Town of Mamaroneck. I have read same and understand it.
			</b></p>
								<div class="form-group">
									<label for="fnmae">Signature of Applicant:</label>
									<input type="email" class="form-control" id="fname" placeholder="Electronic Signature " name="email">
								
								</div>
								<p><center><b>NOTICE: It is a crime, punishable as a Class A misdemeanor, to knowingly make a false statement herein (Section 210. 45 New York State Penal Law)</b></center></p>

			<button type="submit" class="btn btn-primary"><a href="paymentpageHTML.php">Submit</button></a>
	</form>
	</div>

		</fieldset>
</div>
</body>
	</html>
