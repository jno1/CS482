<!DOCTYPE html>
<html lang="en">
	<head>

	</head>
	<body>
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
		$server= 'localhost';
		$username = 'root';
		$dbpassword = 'root';
		$dbname = "CT_Users";
		$conn = new mysqli($server, $username, $dbpassword, $dbname);

		if (mysqli_connect_errno()) 
		{ 
			exit;
		}	

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
		echo $user;
        $sql = "INSERT INTO payments (user_ID, ccNumber, ccSecCode, ccExpDate, ccType, form_ID, amountPaid) VALUES ('$user', '$card', '$ss', '$ex', '$type', 1, 44)";
			

			if($conn->query($sql))
			{
				echo "Your payment was successfully registed to the database, Thank you."; 
			}
			else
			{
				echo "Error: ".$sql."<br>".$conn->error;
			}

			
		
			
	
	
		
	

		

	$conn->close();

	?>
</body>
</html>

















