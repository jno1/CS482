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


<div class="w3-bar  w3-theme w3-large">
  	<span> Welcome, <?php echo $currUserID;?> <a href="logout.php"><b>(logout)</b></a></span>
				
 	 <span class="w3-bar-item w3-text-theme-d2 w3-right">City Town</span>
	<span class="w3-bar-item w3-text-theme-d2 w3-left"></span>
</div>



<div class="w3-col s8 w3-bar w3-text-grey" style="margin-left:5px">
	<b><p id="time"></p></b>
</div>




<header class="w3-container w3-text-grey">

    <h5><b><i class="fa fa-user-circle "></i> ADMINISTRATIVE ACCOUNT</b></h5>


  </header>



<ul>

  	<li><a class="active" href="alogin.php"><i class="fa fa-home"></i> HOME</a></li>
	<li><a href="createUser.php"> <i class="fa fa-credit-card-alt"></i>  CREATE USER</a></li>
	<li><a href="deleteUser.php"><i class="fa fa-question"></i>  DELETE USER</a></li>
	<li><a href="updatePW.php"><i class="fa fa-cog"></i>  UPDATE PASSWORD</a></li>
</ul>



<script>
var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>
<div class="w3-content w3-margin-top" style="max-width:1400px;">
<div class="w3-row-padding">
  
<div class="w3-twothird" style="margin-left:300px">
		
	<div class="w3-container w3-card w3-white w3-margin-bottom">
		<h2 class="w3-text-grey w3-padding-16"><i class="fa fa-dashboard fa-fw w3-margin-right w3-xxlarge w3-text-theme"></i>My Dashboard</h2>
			<fieldset>
				<legend></legend>
				<p>Current Users </p>
				<?php
				if (isset($_SESSION['username']))
						{
							$currUserID = $_SESSION['username'];
						}
						else
						{
							header("Location: logout.php");
						}
						$server= 'localhost';
						$username = 'root';
						$dbpassword = 'root';
						$dbname = "CT_Users";
						$conn = new mysqli($server, $username, $dbpassword, $dbname);
						
						if (mysqli_connect_errno()) 
						{ 
							exit;
						}
						
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
						$sqlEmp1="select lName, fName, userName, email, phoneNumber, cellNumber
										from users
											Order By lName, fName;";
						//Execute query
						$result = $conn->query($sqlEmp1) or die('Could not run query: '.$conn->error);

						if ($result->num_rows > 0) {
							// output data of each row
							//echo "<h3> open forms ".$ingtypeName."  </h3>";
							//echo " <table border='1'> ";
							//echo "<tr>
							//		<th> formtype </th>
							//		<th> form ID </th>
							//		<th> submission data </th>

							//	  </tr>";
							while($row = $result->fetch_assoc()) {
								$formid = $row['$formid'];

								echo "<tr>
								
									<p>Name: <td>".$row["lName" ]. "</td>, <td>".$row["fName" ]. "</td> </p> 
									<p>Username: <td>". $row["userName"]. "</td></p>
									<p>Email: <td>". $row["email"]. "</td></p>
									<p>Phone Number: <td>". $row["phoneNumber"]. "</td></p>

									<p><td>"."------------------------------"."</td></p>

									
								</tr>";
							}
						} else {
								echo "0 results";
						}
						$conn->close();

						?>
	    		

			</fieldset>
		</form>
					
	</div>
</div>

			
		<!-- End Right Column -->
</div>
</div>

</body>
</html>
