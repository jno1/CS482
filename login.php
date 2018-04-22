<?php

session_start();

include ("dbConnect.php");

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

if(isset($_POST['username']))
{
	if(isset($_POST['password']))
	{
		$result = $conn->query("SELECT * FROM users WHERE userName = '$username'");

		if($result == true)
		{
			
			
			$row = $result->fetch_assoc();
			$_SESSION['username'] = $row['userName'];
			$hashPass = $row["pass"];
			$deptID = $row['dept_ID'];
			$result2 = password_verify($password, $hashPass);

			//get different departments pages for backend
			
			//$sql = "SELECT deptName FROM department where deptID = '$deptID'";

			function one($deptID, $result2)
			{

				if($result2 == true && $deptID == NULL)
				{
					$redirect = "FrontendHome.php";
				}
				if($result2 == true && $deptID == 1)
				{
					$redirect = "police.html";
				}
				if($result2 == true && $deptID == 2)
				{
					$redirect = "fire.html";
				}
				if($result2 == true && $deptID == 3)
				{
					$redirect = "BackendHome.php";
				}
				if($result2 == true && $deptID == 18)
				{
					$redirect = "alogin.php";
				}
				return $redirect;

			}

			$redirect = one($deptID, $result2);
			
			header('Location:'.$redirect);


		}

		$result->free();
		$conn->close();
		
	}
	else
	{
		echo "Invalid password";
		die();
	}
}
else
{
	echo "Invalid Username";
	die();
}

?>