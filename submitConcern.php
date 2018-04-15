<?php

session_start();

date_default_timezone_set("America/New_York");

$feedback = $_POST['feedback'];
$department = $_POST['department'];
$explain = filter_var($_POST['explain'], FILTER_SANITIZE_STRING);
$user = $_SESSION['username'];
$now = date("D d M Y g:i:s");


if($feedback == "----" || $department == "----" || empty($explain))
{
	echo "Please fill out all fields";
}

else
{
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "CT_Users";

	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

	if(mysqli_connect_error())
	{
		die('Connect Error('.mysqli_connect_errno().')'.mysql_error());
	}

	else
	{
		$concern = "INSERT INTO feedback (userName, concernType, department, reason, dateSubmitted, wasReviewed) VALUES ('$user', '$feedback', '$department', '$explain', '$now', 0)";
		echo $now;
		if($conn->query($concern))
		{
			echo "Thank you for your submission ".$_SESSION['username']."";
			header('Location: FrontendHome.php');
		}

		$concern->free();
		$conn->close();
	}
}

?>

