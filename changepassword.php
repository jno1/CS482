<?php
session_start();

$comfirmationPage = "comfirmpasschange.html";

$server= 'localhost';
$username = 'root';
$dbpassword = 'root';
$dbname = 'CT_Users';

$db = new mysqli($server, $username, $dbpassword, $dbname);
if (mysqli_connect_errno()) 
{ 
	exit;
}

$oldpass = filter_var($_POST['oldpassword'], FILTER_SANITIZE_STRING);
$newpass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$comfpass = filter_var($_POST['password1'], FILTER_SANITIZE_STRING);



if(isset($_GET['oldpassword']) && isset($_GET['password'])&& isset($_GET['password1']))
{
	if($newpass==$comfpass && $newpass= preg_match( '/[A-Z]/', $newpass ) && # uppercase char 
            preg_match( '/[a-z]/', $newpass ) && # lowercase char
            preg_match( '/\d/', $newpass ) &&    # digit
            (strlen($newpass) > 8))
{
    $hashPass = $row["password"];
    $result2 = password_verify($newpass,$hashPass);
    
    if ($result2 == true)
    {
    	$result = $db->query("UPDATE users SET pass='$newpass' WHERE userName='".$user."'");

    	header('Location:'.$employeePage);
    }
    else
    {
    	echo "entered wrong password";
    }
    }
    else
    {
       	echo "passwords did not match";
    }
    }


    $result->free();
    $db->close();
}

?>