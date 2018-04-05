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
	
		
		if(isset($username)) 
		{
			$sqlEmp=("select * 
						from users 
							where userName='$username' ");
			$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);
			$sql=("DELETE FROM users WHERE username='".$username."'");					
			if ($conn->query($sql) == TRUE ) 
			{
		    	echo "delete successfully";
				$redirect = "deleteUser.php";
				header('Location:'.$redirect);
		   
			} 
			else 
			{
		   		echo "Error: " . $sql . "<br>" . $conn->error;
			}
	
		}
	
		
		else{
			echo "User does not exist";
		}
		
	$conn->close();
?>