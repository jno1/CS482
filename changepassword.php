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
		

		$oldpass = $_GET['oldpassword'];
		$newpass = $_GET['password'];
		$comfpass = $_GET['password1'];
	
		

		if($newpass==$comfpass) {
			$sqlEmp=("select * 
						from users 
							where userName='$currUserID' "); //currUserID
			$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);
				$row = $result->fetch_assoc();
				$hashPass = $row["pass"];
				$dehash = password_verify($oldpass, $hashPass);
				if ($dehash==true) {
					$hashPass1 = password_hash($comfpass, PASSWORD_DEFAULT, ['cost' => 10]);
					$sql=("UPDATE users 
							Set pass = '" .$hashPass1.
								"' WHERE userName ='$currUserID' ");					
					if ($conn->query($sql) == TRUE ) {
		    			echo "update successfully";
						$redirect = "changepassword.html";
						header('Location:'.$redirect);
		    
					} 
				else {
		    		echo "Error: " . $sql . "<br>" . $conn->error;

				}
		
			}
	
		
			else{
				echo "inccorect old password";
			}
		//}
	}
		
	else {
		
		echo "fields did not match";

		
	}
		

	$conn->close();

	?>
</body>
</html>










