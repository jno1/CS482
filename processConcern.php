<?php

$complete = $_POST['complete'];
$forward = $_POST['forward'];
$dept = $_POST['dept'];
$ID = $_POST['ID'];

//echo $complete;
//echo $forward;
//echo $dept;

include ("dbConnect.php");

  if($complete != NULL)
  {
    $result = $conn->query("UPDATE feedback SET status = 'complete' WHERE feedbackID = '$ID'");
  }

  if($forward != NULL && $dept != '')
  {
    $result2 = $conn->query("UPDATE feedback SET department = '$dept' WHERE feedbackID = '$ID'");

  }

  header('Location: viewConcerns.php');


?>