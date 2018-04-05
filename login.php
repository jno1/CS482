<?php

session_start();

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

if(isset($_POST['username']))
{
	if(isset($_POST['password']))
	{
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "root";
		$dbname = "CT_Users";

		$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

		if(mysqli_connect_error())
		{
			die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
		}

		else
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

					if($result2 == true && $deptID != NULL)
					{
						$redirect = "BackendHome.php";
					}
					
					if($result2 == true && $deptID == 18)
					{
						$redirect = "alogin.php";
					}

					return $redirect;

				}

				$redirect = one($deptID, $result);

				header('Location:'.$redirect);


			}

			$result->free();
			$conn->close();
		}
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