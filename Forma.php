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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
			<form id="form" method="post" action="Formdba.php" role="form">
			
				<div class="form-group">
					<label for="fname">First Name:</label>
					<input type="text" class="form-control" id="fname" placeholder="Enter First name" name="fname">
					</div>
				<div>
					<label for="lname">Last Name:</label>
					<input type="text" class="form-control" id="lname" placeholder="Enter Last name" name="email">
				</div>
				
			 <div class="form-group">
					<label for="address">Address:</label>
					<input type="address" class="form-control" id="address" placeholder="Enter Address" name="address">
				</div>
						
				<div class="form-group">
					<label for="alarmAd">Address of Alarmed Premise:</label>
					<input type="alarmAd" class="form-control" id="alarmAd" placeholder="Enter Address" name="alarmAd">
				</div>
				
			<div>
				<p><b>ALERTING DEVICE(s) - check applicable box</b></p>
				
						<div class="radio">
						<label><input  type="radio" name="AD"> SILENT - no audible signals emitted</label></div>
						
						<div class="radio">
						<label><input  type="radio" name="AD"> AUDIBLE INTERIOR - alerting devices audible within premises only</label></div>
						
						<div class="radio">
						<label><input  type="radio" name="AD"> AUDIBLE EXTERIOR - alerting devices audible outside of premises</label></div>
						<div class="radio">
						<label><input  type="radio" name="AD"> AUDIBLE INTERIOR / EXTERIOR - alerting devices audible inside and outside	</label></div>	
					
			</div>
				
			<div>
				<p><b>TYPE OF ALARM SYSTEM - check applicable box</b></p>
				
						<div class="radio" >
						<label><input class="radio" type="radio" name="TA"> LOCAL ALARM - alarm sounds within or outside of premises ONLY - no connections</label></div>
						<div class="radio" >
						<label><input class="radio" type="radio" name="TA"> CENTRAL STATION ALARM - system interconnected to a private security and /or monitoring facility by any method</label></div>
			</div>
				
			<div>
				<p><b>LOCAL ORDINANCE COMPLIANCE - check applicable box</p>
				<p>A.	Systems equipped with an audible alerting device which is perceptible outside of the alarmed premises must incorporate a device which will silence such audible signals within twenty (20) minutes of its activation.</b></p>
					
					<label class="radio" >
						<div>
						<input class="radio" type="radio" name="LO"> SILENT - no audible signals emitted</div>
						<div>
						<input class="radio" type="radio" name="LO"> System equipped with silencing device as required</div>
						
						<div>
						<input class="radio" type="radio" name="LO"> System not so equipped</div>
						<div>
						<input class="radio" type="radio" name="LO"> Not applicable - no audible signal perceptible outside of premises</div>
				</label>
				</div>
				
				<div>
					
					<p><b>B. Central Station Alarm users must ensure that, prior to police notification of an alarm
					activation, the central  station monitoringfacility must first attempt to verify the authenticity of the alarm and the need for emergency response by police personnel. ThisMUSTinclude an attempt to contact personsat the alarmed premises. (Thisrequirement doesnot apply to holdup, panicor fire signals).</p></b>
						
						<label class="radio" >
							<div>
							<input class="radio" type="radio" name="CS"> Central Station facility required to make verification calls as required</div>
							<div>
							<input class="radio" type="radio" name="CS"> Central Station facility does not make verification calls</div>
							
							<div>
							<input class="radio" type="radio" name="CS"> Not applicable - not central station alarm</div>
	 				</label>
					</div>	
					
					
					<p><b>ALARM SERVICE AGENCY - firm which currently services your system</b></p>
						<div class="form-group">
							<label for="ACname">Name of Alarm Company:</label>
							<input type="text" class="form-control" id="ACname" placeholder="Enter Alarm Company" name="ACname">
						
						</div>
						
					 <div class="form-group">
							<label for="ACaddress">Address:</label>
							<input type="text" class="form-control" id="ACaddress" placeholder="Enter Alarm Company Address" name="ACAddress">
						</div>
								
						<div class="form-group">
							<label for="ACphone">Telephone:</label>
							<input type="text" class="form-control" id="ACphone" placeholder="Enter Telephone number" name="Aphone">
						</div>
						
						
						<p><b>EMERGENCY CONTACT LIST - persons (including yourself) who should be contacted in the event of an on premises emergency. A minimum of two names should he submitted, preferably persons who have access to the promises and are familiar with the alarm system.</b></p>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="Ename1">1. Emergency Contact: * </label>
								<input type="text" class="form-control" id="Ename1" placeholder="Enter name" name="Ename1">
								</div>
								</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="Ephone1">Telephone: * </label>
								<input type="tel" class="form-control" id="Ephone1" placeholder="Enter telephone" name="Ephone1">
							</div>
							</div>
							</div>
							
					<div class="row">
						<div class="col-md-6">	
							<div class="form-group">
								<label for="Ename2">2. Emergency Contact: * </label>
								<input type="text" class="form-control" id="Ename2" placeholder="Enter name" name="Ename2">
								</div>
								</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="Ephone2">Telephone: * </label>
								<input type="tel" class="form-control" id="Ephone2" placeholder="Enter telephone" name="Ephone2">
							</div>
							</div>
							</div>
					<div class="row">
						<div class="col-md-6">		
							<div class="form-group">
								<label for="Ename3">3. Emergency Contact: </label>
								<input type="text" class="form-control" id="Ename3" placeholder="Enter name" name="Ename3">
								</div>
								</div>
						<div class="col-md-6">
							<div class="form-group">
										<label for="Ephone3">Telephone:  </label>
								<input type="tel" class="form-control" id="Ephone3" placeholder="Enter telephone" name="Ephone3">
							</div>
							</div>
							</div>
							<p><center>PLEASE CONTACT THE CLERK'S OFFICE IN WRITING OF ANY CHANGES IN YOUR CONTACT LIST</center></p>
				<p><b>I hereby apply for an Alarm Users Permit pursuant to the provisions of Local Law No. 1-1988 of the Town of Mamaroneck, Now York. I certify that the information I have provided herein is accurate. Furthermore, I have received a copy of the current local ordinance regulating and controlling
				alarm systems within the Unincorporated Area of the Town of Mamaroneck. I have read same and understand it.
				</b></p>
									<div class="form-group">
										<label for="appElecSig">Signature of Applicant:</label>
										<input type="etext" class="form-control" id="appElecSig" placeholder="Electronic Signature " name="appElecSig">
									
									</div>
									<p><center><b>NOTICE: It is a crime, punishable as a Class A misdemeanor, to knowingly make a false statement herein (Section 210. 45 New York State Penal Law)</b></center></p>

				<button type="submit" onclick="alertMsg()" class="btn btn-primary">Submit</button>

		</form>
		
</div>
</fieldset>
<script>
	function alertMsg() {
		alert("Your form has been submitted");
	}
</script>
</div>

</body>
</html>
