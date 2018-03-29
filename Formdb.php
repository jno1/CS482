<?php
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "root";
		$dbname = "CT_Users";
		$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
		if(mysqli_connect_error())
		{
			die('Connect Error('.mysqli_connect_errno().')'.mysql_error());
		}
		
	$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
	$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
	$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
	$AlarmAd = filter_var($_POST['AlarmAd'], FILTER_SANITIZE_STRING);
	$AD = filter_var($_POST['AD'], FILTER_SANITIZE_STRING);
	$TA = filter_var($_POST['TA'], FILTER_SANITIZE_STRING);
	$LO = filter_var($_POST['LO'], FILTER_SANITIZE_STRING);
	$CS = filter_var($_POST['CS'], FILTER_SANITIZE_STRING);
	$ACname = filter_var($_POST['ACname'], FILTER_SANITIZE_STRING);
	$ACaddress = filter_var($_POST['ACAddress'], FILTER_SANITIZE_STRING);
	$ACphone= filter_var($_POST['ACphone'], FILTER_SANITIZE_STRING);
	$Ename1 = filter_var($_POST['Ename1'], FILTER_SANITIZE_STRING);
	$Ephone1 = filter_var($_POST['Ephone1'], FILTER_SANITIZE_STRING);
	$Ename2 = filter_var($_POST['Ename2'], FILTER_SANITIZE_STRING);
	$Ephone2 = filter_var($_POST['Ephone2'], FILTER_SANITIZE_STRING);
	$Ename3 = filter_var($_POST['Ename3'], FILTER_SANITIZE_STRING);
	$Ephone3 = filter_var($_POST['Ephone3'], FILTER_SANITIZE_STRING);
	$appElecSig = filter_var($_POST['appElecSig'], FILTER_SANITIZE_STRING);

	


	
	$sql = "INSERT INTO forms(fname, lname, address, AlarmAd, AD, TA, LO, CS, ACname, ACAddress, ACphone, Ename1, Ephone1, Ename2, Ephone2, Ename3,Ephone3, appElecSig) VALUES('$fname', '$lname', '$address', '$AlarmAd', '$AD','$TA','$LO','$CS','$ACname', '$ACAddress', '$ACphone', '$Ename1', '$Ephone1', '$Ename2', '$Ephone2', '$Ename3','$Ephone3', '$appElecSig')";
	
	?>