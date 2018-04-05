
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
  	<li><a class="active" href="FrontendHome.php"><i class="fa fa-home"></i> HOME</a></li>
	<li><a href="paymentpageHTML.php"> <i class="fa fa-credit-card-alt"></i>  MY PAYMENTS</a></li>
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
		<h2 class="w3-text-grey w3-padding-16"><i class="fa-fw w3-margin-right w3-xxlarge w3-text-theme"></i>Payment Page</h2>
			<b>Payment</b>
				<form action="paymentpage.php">
		<fieldset>
			<legend></legend>
			

			<p>Enter information as it appears on the card </p>
    		First Name: <input type="first" name="first" placeholder=""> <br><br>
    		Last Name: <input type="last" name="last" placeholder=""> <br><br>
    		Card Number: <input type="card" name="card" placeholder=""> <br><br>
    		security code: <input type="ss" name="ss" placeholder=""> <br><br>
    		Card Expiration:
			<select name='expireMM' id='expireMM'>
   				<option value=''>Month</option>
   				<option value='01'>January</option>
   				<option value='02'>February</option>
    			<option value='03'>March</option>
    			<option value='04'>April</option>
   				<option value='05'>May</option>
    			<option value='06'>June</option>
    			<option value='07'>July</option>
    			<option value='08'>August</option>
    			<option value='09'>September</option>
    			<option value='10'>October</option>
    			<option value='11'>November</option>
    			<option value='12'>December</option>
			</select> 
			<select name='expireYY' id='expireYY'>
    			<option value=''>Year</option>
    			<option value='10'>2018</option>
    			<option value='11'>2019</option>
    			<option value='12'>2020</option>
    			<option value='13'>2021</option>
    			<option value='14'>2022</option>
    			<option value='15'>2023</option>
    			<option value='16'>2024</option>

</select> 
<input class="inputCard" type="hidden" name="expiry" id="expiry" maxlength="4"/>

			<hr>
			


    		<p>Billing Address:</p>
    		Address 1: <input type="address1" name="address1" placeholder=""> <br><br>
    		Address 2: <input type="address2" name="address2" placeholder=""> <br><br>
    		City <input type="city" name="city" placeholder=""> <br><br>
    		State <input type="state" name="state" placeholder=""> <br><br>
    		Zip code <input type="zipcode" name="zipcode" placeholder=""> <br><br>
    		
    		<hr>
    				




    		<br><br>

    		<input type="submit" value="submit">
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
