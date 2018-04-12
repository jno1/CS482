<?php 

	session_start();
	if (isset($_SESSION['username']))
	{
		$currUserID = $_SESSION['username'];
	}
	else
	{
		header("Location: logout.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>City Town</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	body{font-family: 'Quicksand', sans-serif;}
	.w3-theme {color:#fff !important;background-color:#024575 !important}

	.w3-text-theme-d1 {color:#024575 !important}
	.w3-text-theme-d2 {color:#e9f5ff !important}
	.w3-hover-text-theme-d1 {color: #e9f5ff !important}
ul {
    list-style-type: none;
    margin: 9px;
    padding: 0;
    width: 200px;
    background-color: #f7f7f7;
    height: 100%;
    position: fixed;
    overflow: auto;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   
}

li a {
    display: block;
    color:#666666;
    padding: 16px 4px;
    text-decoration: none;
}

li a.active {
    background-color:#024575;
    color: white;
}

li a:hover:not(.active) {
    background-color: #024575 ;
    color: white;
}

h1{
    align-text:left;
}

table {
	border: 2px solid black;
	background-color: #e9f5ff;
}

th {
	border-bottom: 5px solid #000;
}

td {
	border-bottom: 2px solid #666;
}

</style>
</head>
<body style="overflow:hidden;">

<!-- Top Bar -->
<div class="w3-bar  w3-theme w3-large" >
  	<span> Welcome, <?php echo $currUserID;?> <a href="logout.php"><b>(logout)</b></a></span>

 	 <span class="w3-bar-item w3-text-theme-d2 w3-right">City Town</span>
	<span class="w3-bar-item w3-text-theme-d2 w3-left"></span>
</div>
<!-- End of Top Bar -->

<!-- Name and Date -->

<div class="w3-col s8 w3-bar w3-text-grey" style="margin-left:5px">
      <b><p id="time"></p></b>
    </div>
<!-- End  -->

<!-- Left Column -->
<header class="w3-container w3-text-grey">

    <h5><b><i class="fa fa-user-circle "></i> MY ACCOUNT</b></h5>

 </header>





<ul>

  	<li><a class="active" href="FireHome.php"><i class="fa fa-home"></i> HOME</a></li>
	<li><a href="dropdown_BloodTypes.php"> <i class="fa fa-credit-card-alt"></i>  MY PAYMENTS</a></li>
	<li><a href="viewConcerns.php"><i class="fa fa-question"></i>  MY CONCERNS</a></li>
	<li><a href="accountsettings.php"><i class="fa fa-cog"></i>  ACCOUNT SETTINGS</a></li>
</ul>

<script>
var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>

<div class="w3-content w3-margin-top" style="max-width:1400px;">
<div class="w3-row-padding">
  
<div class="w3-twothird" style="margin-left:300px">

<?php

try {
  $con= new PDO('mysql:host=localhost;dbname=CT_Users', "root", "root");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = "SELECT * FROM feedback WHERE department = 'Fire Department'";
  //first pass just gets the column names
  print "<table> ";
  $result = $con->query($query);
  //return only the first row (we only need field names)
  $row = $result->fetch(PDO::FETCH_ASSOC);
  print " <tr> ";
  foreach ($row as $field => $value){
   print " <th>$field</th> ";
  } // end foreach
  print " </tr> ";
  //second query gets the data
  $data = $con->query($query);
  $data->setFetchMode(PDO::FETCH_ASSOC);
  foreach($data as $row){
   print " <tr> ";
   foreach ($row as $name=>$value){
   print " <td>$value</td> ";
   } // end field loop
   echo "<td><a class='active' href='approveConcern.php'>Approve</a></td>";
   //<input type='submit' name='Approve' value='Approve' formaction='approveConcern.php'></td>";
   //echo "<td><input type='submit' name='Deny' value='Deny' onclick=document.location.href='denyConcern.php'></td>";
   print " </tr> ";
  } // end record loop
  print "</table> ";
  } catch(PDOException $e) {
   echo 'ERROR: ' . $e->getMessage();
  } // end try

?>


<script type="text/javascript">
function redir()
{
	window.location = "approveConcern.php";
}
</script>





