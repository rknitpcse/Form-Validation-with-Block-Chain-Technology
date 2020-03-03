<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<?php
 require('conn.php');
 if(isset($_POST['sbt']))
 {
	 $appno=$_POST['appNo'];
	 $sql="SELECT Uid,status,FullName FROM userdetails WHERE Uid='$appno'";
	 $result=$conn->query($sql);
	 if($result->num_rows==1)
	 {
		 $row=$result->fetch_assoc();
		 echo '<h2>Successfully Submitted Forms:-</h2>
		       <table>
                <tr>
					<th>Application No.</th>
					<th>Full Name</th>
					<th>Status</th>
					<th>More Details</th>
				</tr>
				<tr>
					<td>'.$row['Uid'].'</td>
					<td>'.$row['FullName'].'</td>
					<td>'.$row['status'].'</td>
					<td><a href="showDetails.php?id='.$row['Uid'].'">Click Here</a></td>
				</tr>
			  </table>';
	 }
	 else
	 {
		 echo '<script type="text/javascript">alert("Application ID does not exist.");
               window.location="admission.html"</script>';
	 }
		 
 }
 ?>

</body>
</html>
