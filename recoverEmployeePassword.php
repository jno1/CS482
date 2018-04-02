<?php

$fName = filter_var($_POST['first'], FILTER_SANITIZE_STRING);
$lName = filter_var($_POST['last'], FILTER_SANITIZE_STRING);
$user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$deptID = filter_var($_POST['deptID'], FILTER_SANITIZE_STRING);
$newPass = filter_var($_POST['newPass'], FILTER_SANITIZE_STRING);
$confirmNewPass = filter_var($_POST['confirmNewPass'], FILTER_SANITIZE_STRING);

if(isset($_POST['first']) && isset($_POST['last']) && isset($_POST['deptID']) && isset($_POST['username']) && isset($_POST['newPass']) && isset($_POST['confirmNewPass']))
{
    if($newPass == $confirmNewPass && $newpass= preg_match( '/[A-Z]/', $newpass ) && # uppercase char 
            preg_match( '/[a-z]/', $newpass ) && # lowercase char
            preg_match( '/\d/', $newpass ) &&    # digit
            (strlen($newpass) > 8))
    {
        $server= 'localhost';
        $username = 'root';
        $dbpassword = 'root';
        $dbname = 'CT_Users';

        $db = new mysqli($server, $username, $dbpassword, $dbname);

        if (mysqli_connect_errno()) 
            exit;

        $hashPass = password_hash($newPass, PASSWORD_DEFAULT, ['cost' => 10]);

        $result = $db->query("UPDATE users SET pass = '$hashPass' WHERE fName = '$fName' AND lName = '$lName' AND dept_ID = '$deptID' AND userName = '$user'");
        if($result == TRUE)
            echo "Account updated successfully";
        else
            echo "There was a problem updating $fName $lName 's account";

        $db->close();
    }

    else
    {
        echo "Passwords do not match";
        die();
    }
	
}

else
{
    echo "All fields must be filled out";
    die();
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