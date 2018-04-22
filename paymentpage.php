
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
	<li><a href="paymentpagesHTML.php"> <i class="fa fa-credit-card-alt"></i>  MY PAYMENTS</a></li>
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
		<h2 class="w3-text-grey w3-padding-16"><i class="fa-fw w3-margin-right w3-xxlarge w3-text-theme"></i>Payment</h2>



			

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


		$card = $_GET['card'];
		$ss = $_GET['ss'];
		$MM = $_GET['expireMM'];
		$YY = $_GET['expireYY'];
		$type = $_GET['cardtype'];
		$ex = $MM . $YY;
			$sql1=("select * 
						from users 
							where userName='$currUserID' "); 
			

		$result = $conn->query($sql1) or die('Could not run query: '.$conn->error);
		$row = $result->fetch_assoc();
		$user = $row["userID"];
        $sql = "INSERT INTO payments (user_ID, ccNumber, ccSecCode, ccExpDate, ccType, form_ID, amountPaid) VALUES ('$user', '$card', '$ss', '$ex', '$type', 1, 50)";
			

			if($conn->query($sql))
			{
			  // $sql = "INSERT INTO payments (user_ID, ccNumber, ccSecCode, ccExpDate, ccType, form_ID, amountPaid) VALUES ('$user', '$card', '$ss', '$ex', '$type', 1, 44)";
				echo "Your payment was successfully registed, Thank you.". "<br />";
				echo  "<br />";
				echo "reciept";
				echo  "<br />";
				echo "first name: ".$_GET['first'];;
				echo  "<br />";
				echo "last name: ".$_GET['last'];
				echo  "<br />";
				echo "card number: ******".substr($card, -4);
				echo  "<br />";
				echo "expiration: "."$MM"."/"."$YY";
				echo  "<br />";
				echo $type;

				
			}
			else
			{
				echo "Error: ".$sql."<br>".$conn->error;
			}

			
		
			
	
	
		
	

		

	$conn->close();

	?>
    		<br><br>


		</fieldset>
	</form>
								

	</div>
	
</div>

			
		<!-- End Right Column -->
</div>
</div>

</body>
</html>















