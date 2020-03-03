<?php
if(isset($_POST['sbt']))
{
	$conn=new mysqli('localhost','root','','user');
	if($conn->connect_error)
	{
		die("Connection denied".$conn->connect_error);
	}
	$uname=$_POST['user'];
	$course=$_POST['course'];
	if($course=="MTCS")
		$cid="C01";
	else if($course=="MTIT")
		$cid="C02";
	else if($course=="MTAI")
		$cid="C03";
	$year=date("y");
	$sql1="SELECT uid FROM details";
	$result=$conn->query($sql1);
	if($result->num_rows>0)
	{
	    while($row=$result->fetch_assoc())
		{
			$uid=$row['uid'];
		}
		$suid=substr($uid,5);
	    $suid++;
	    $suid=sprintf("%02s",$suid);
	}
	else
		$suid="01";
	$iuid=$year.$cid.$suid;
	$sql="INSERT INTO details(uid,name) VALUES('$iuid','$uname')";
	if($conn->query($sql)===TRUE)
	{
		echo "Insertion successfull";
	}
	else
		echo "error in insertion".$conn->error;
	$conn->close();
}
?>

<html>
<head>
  <title>
     New User
  </title>
</head>
<body>
    <form method="POST" action="">
	   <input type="text" placeholder="Enter Name" name="user"><br><br>
	   <select name="course">
	     <option value="MTCS">M.Tech CS </option>
		 <option value="MTIT">M.Tech IT </option>
		 <option value="MTAI">M.Tech AI </option>
	   </select>
	   <input type="submit" value="Submit" name="sbt">
	</form>
</body>
</html>
  