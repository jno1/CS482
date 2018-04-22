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
  background-color: #e6e6e6;
}

th {
  border-bottom: 5px solid #000;
}

td {
  border-bottom: 2px solid #000;
}

</style>
</head>
<body style="overflow:hidden;">

<!-- Top Bar -->
<div class="w3-bar  w3-theme w3-large" >
    <span> Welcome, <?php echo $currUserID;?> <a href="logout.php">(logout)</a></span>

   <span class="w3-bar-item w3-text-theme-d2 w3-right">City Town</span>
  <span class="w3-bar-item w3-text-theme-d2 w3-left"></span>
</div>
<!-- End of Top Bar -->

<!-- Name and Date -->

<div class="w3-col s8 w3-bar w3-text-grey" style="margin-left:5px">
      <p id="time"></p>
    </div>
<!-- End  -->

<!-- Left Column -->
<header class="w3-container w3-text-grey">

    <h5><i class="fa fa-user-circle "></i> MY ACCOUNT</h5>

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
  
<div class="w3-twothird" style="margin-left:215px">


  <?php

  include ("dbConnect.php");

  $sql = 'SELECT * FROM feedback WHERE status != "complete" AND department = "Fire Department"';
  $query = mysqli_query($conn, $sql);

  if(!$query)
  {
    die('SQL Error: ' . mysqli_error($conn));
  }

  ?>

  <table class="w3-table-all w3-hoverable w3-card" name="table" id="table">
    <thead>
      <tr>
        <th>Feedback ID</th>
        <th>Username</th>
        <th>Type</th>
        <th>Department</th>
        <th>Explanation</th>
        <th>Date Submitted</th>
        <th>Status</th>
        <th>Complete</th>
        <th>Forward</th>
        <th>Forwarding Department</th>
        <th>Submit</th>
      </tr>
    </thead>

    <tbody>

      <form action="processConcern.php" method="POST">

    <?php
    

    $no = 0;


    while($row = mysqli_fetch_array($query))
    {

      $rows[] = $row['feedbackID'];

      echo '<tr>';
      echo '<td>';
      echo $row['feedbackID'];
      echo '</td>';

      echo '<td>';
      echo $row['userName'];
      echo '</td>';

      echo '<td>';
      echo $row['concernType'];
      echo '</td>';

      echo '<td>';
      echo $row['department'];
      echo '</td>';

      echo '<td>';
      echo $row['reason'];
      echo '</td>';

      echo '<td>';
      echo $row['dateSubmitted'];
      echo '</td>';

      echo '<td>';
      echo $row['status'];
      echo '</td>';

      echo "<td>";
      echo "<input type='checkbox' name='complete' id='complete' value='".$no."'/>";
      echo "</td>";

      echo "<td>";
      echo "<input type='checkbox' name='forward' id='forward' value='".$no."'/>";
      echo "</td>";

      echo "<td>";
      echo "<select name='select' id='depts'>";
      echo "<option value = ></option>";
      echo "<option value = 'Fire Department'>Fire Department</option>";
      echo "<option value = 'Police Department'>Police Department</option>";
      echo "<option value = 'Town Clerk'>Town Clerk</option>";
      echo "<option value = 'Town Administrator'>Town Administrator</option>";
      echo "</td>";


      echo "<td>";
      echo "<input type='submit' name='submit".$no."' value='submit' onclick='post()'></a>";
      echo "</td>";
    
      echo "</tr>";

      

      $no++;
    }
    //print_r($rows);

    $query->free();

    ?>
</tbody>
</table>


<div id="result"></div>
<p id="demo"></p>
<p id="demo2"></p>



<script>

function post()
{
  var a = <?php echo json_encode($rows); ?>;
  //alert(a);
  var hr = new XMLHttpRequest();
  var url = "processConcern.php";

  var complete = document.getElementById("complete").value;

  var forward = document.getElementById("forward").value;
  var dept = document.getElementById("depts").value;
  //document.getElementById("demo").innerHTML = dept;

  var vars = "complete="+complete+"&forward="+forward+"&dept="+dept+"&ID="+a[forward];

  //alert(vars);

  hr.open("POST", url, true);

  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  hr.onreadystatechange = function()
  {
    if(hr.readyState == 4 && hr.status == 200)
    {
      var return_data = hr.responseText;
      document.getElementById("demo").innerHTML = return_data;
    }
  }
  hr.send(vars);
  document.getElementById("result").innerHTML = "processing...";
}


</script> 
</div>
</div>
</div>
</body>
</html>