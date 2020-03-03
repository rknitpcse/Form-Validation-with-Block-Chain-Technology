<?php
require('conn.php');
$regno=$_GET['q'];
$qualexam=$_GET['r'];
$fetch_sql="SELECT * FROM $qualexam WHERE regid='$regno'";
if($conn->query($fetch_sql))
{
   $result=$conn->query($fetch_sql);
   if($result->num_rows==1)
  {
   	$row=$result->fetch_assoc();
	$regid=$row['regid'];
    echo $row['score'];
  }
  else
    echo "Invalid number";
}
else
	echo "Invalid number";
?>