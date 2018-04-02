<?php

$fName = filter_var($_POST['first'], FILTER_SANITIZE_STRING);
$lName = filter_var($_POST['last'], FILTER_SANITIZE_STRING);
$user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$newPass = filter_var($_POST['newPass'], FILTER_SANITIZE_STRING);
$confirmNewPass = filter_var($_POST['confirmNewPass'], FILTER_SANITIZE_STRING);
$secQuestAns = filter_var($_POST['secQuestAns'], FILTER_SANITIZE_STRING);

if(!empty($fName) && !empty($lName) && !empty($user) && !empty($newPass) && !empty($confirmNewPass) && !empty($secQuestAns))
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

        $result = $db->query("UPDATE users SET pass = '$hashPass' WHERE fName = '$fName' AND lName = '$lName' AND secQuest = '$secQuestAns' AND userName = '$user'");
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
    <title>Recover Password</title>
</head>
<body>
    <p>
        <a href="login.html">Sign In</a>
    </p>
</body>
</html>