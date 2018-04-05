<?php
session_start();

$comfirmationPage = "comfirmpasschange.html";

$server= 'localhost';
		$username = 'root';
		$dbpassword = 'root';
		$dbname = "CT_Users";
		$conn = new mysqli($server, $username, $dbpassword, $dbname);
		
		if (mysqli_connect_errno()) 
		{ 
			exit;
		}
		
		$username = filter_var($_GET['user'], FILTER_SANITIZE_STRING);
		$newpass = filter_var($_GET['pass'], FILTER_SANITIZE_STRING);
		$comfpass = filter_var($_GET['passConfirm'], FILTER_SANITIZE_STRING);
	
		
		if($newpass==$comfpass) 
		{
			$sqlEmp=("select * 
						from users 
							where userName='$username' ");
			$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);
			$hashPass1 = password_hash($comfpass, PASSWORD_DEFAULT, ['cost' => 10]);
			$sql=("UPDATE users 
						Set pass = '" .$hashPass1.
							"' WHERE userName ='$username' ");					
			if ($conn->query($sql) == TRUE ) 
			{
		    	echo "update successfully";
				$redirect = "updatePW.php";
				header('Location:'.$redirect);
		   
			} 
			else 
			{
		   		echo "Error: " . $sql . "<br>" . $conn->error;
			}
	
		}
	
		
		else{
			echo "Passwords don't match";
		}
		
	$conn->close();
?>