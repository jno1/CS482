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

  	<li><a class="active" href="Police.html"><i class="fa fa-home"></i> HOME</a></li>
	<li><a href="casehistoryhtml.php"> <i class="fa fa-credit-card-alt"></i> CASE HISTORY</a></li>
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
			<b>Case History</b>
	
		<?php
				session_start();

if (isset($_SESSION['username']))
		{
			$currUserID = $_SESSION['username'];
		//	$formid = $_SESSION['username'];
		}
		else
		{
			header("Location: logout.php");
		}
		include ("dbConnect.php");

		
		$status = $_GET['status'];
		$type = $_GET['type'];
		$sql1="select dept_ID
						from users
							where userName = '$currUserID' " ;
			$result1 = $conn->query($sql1) or die('Could not run query: '.$conn->error);
			$row1 = $result1->fetch_assoc();
			$dept = $row1["dept_ID"];		
		$sql2="select deptName
						from department
							where deptID = '$dept'" ;
			$result2 = $conn->query($sql2) or die('Could not run query: '.$conn->error);
			$row2 = $result2->fetch_assoc();
			$deptname = $row2["deptName"];						
	
			
		
		
		//Create query
		$sqlEmp1="select typeOfForm.formtype, forms.formID, forms.submitDate
						from forms, formapproval, typeOfForm
							where formapproval.state='$status'
							and	typeOfForm.police!=0
							and (typeOfForm.police - typeOfForm.totaldepts=0) 
							and forms.formID=formapproval.form_ID
							and typeOfForm.typeID=forms.type_ID; " ;
		//Execute query
		$result = $conn->query($sqlEmp1) or die('Could not run query: '.$conn->error);

		//if ($result->num_rows > 0) {
			// output data of each row
			//echo "<h3> open forms ".$ingtypeName."  </h3>";
			//echo " <table border='1'> ";
			//echo "<tr>
			//		<th> formtype </th>
			//		<th> form ID </th>
			//		<th> submission data </th>

			//	  </tr>";
			while($row = $result->fetch_assoc()) {
				
				//setcookie($cookie_name, time() + (86400 * 1), "/");

					echo "<tr>
				
					<p><td>"."------------------------------"."</td></p>
					<p><td>".$row["formID"]. "</td></p>
					<p><td>".$row["formtype"]. "</td></p>
					<p><td>".$row["submitDate"]. "</td></p>
					</tr>";
					$formid = $row["formID"];
					$_Session["form"]=$formid;
					echo "form id is " . $_Session["form"] . ".<br>";   
					echo "<tr>
					<p><td><a class='active' href='viewform.php?var=$formid&var2=$status$ '>View</a></td></p>
					</tr>";}


					
				
			
		//} 
		//else {
		//		echo "0 results";
		//}
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
