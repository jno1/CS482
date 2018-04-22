<?php
include ("dbConnect.php");

$fName = filter_var($_POST['first'], FILTER_SANITIZE_STRING);
$lName = filter_var($_POST['last'], FILTER_SANITIZE_STRING);
$deptID = filter_var($_POST['deptID'], FILTER_SANITIZE_STRING);

if(isset($_POST['first']) && isset($_POST['last']) && isset($_POST['deptID']))
{
	

    $string = "";

    $result = $db->query("SELECT userName FROM users WHERE fName = '$fName' AND lName = '$lName' AND dept_ID = '$deptID'");
    if($result->num_rows == 0)
    	echo "Information does not match";

    $row = $result->fetch_assoc();

    $string = "Username: ".$row['userName'];

    echo $string;

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Recover Username</title>
</head>
<body>
	<p>
		<a href="login.html">Sign In</a>
	</p>
</body>
</html>