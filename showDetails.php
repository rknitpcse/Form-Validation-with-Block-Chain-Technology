<html>
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Details</title>
		<meta name="Keyword content="FillDetails">
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  		<link rel="stylesheet" href="/resources/demos/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script type="text/javascript">
    	
    	</script>
		<style>
		#img{
  			display: block;
  			margin-left: auto;
  			margin-right: auto;
		    }
		body {
  			padding: 25px;
			background-color: #b7edff;
  			<!--background: url(Images/add.jpg);
  			background-repeat: no-repeat;
  			background-size: 1920px 1200px;-->
			}
			
			td{	
				color:#000000;
				}
			#ButtonClose{
				display: inline-block;
				padding: 8px 10px;
				width: 90px;
				font-size: 20px;
				cursor: pointer;
				text-align: center;
				text-decoration: none;
				outline: none;
				color: #fff;
				background-color: #4CAF50;
				border: none;
				border-radius: 8px;
				box-shadow: 0 3px #999;
			}
			#ButtonClose:hover {background-color: #3e8e41}
			#ButtonClose:active {
				background-color: #3e8e41;
				box-shadow: 0 3px #666;
				transform: translateY(4px);
			}	
			#ButtonPrint{
				display: inline-block;
				padding: 8px 10px;
				width: 90px;
				font-size: 20px;
				cursor: pointer;
				text-align: center;
				text-decoration: none;
				outline: none;
				color: #fff;
				background-color: #4CAF50;
				border: none;
				border-radius: 8px;
				box-shadow: 0 3px #999;
			}
			#ButtonPrint:hover {background-color: #3e8e41}
			#ButtonPrint:active {
				background-color: #3e8e41;
				box-shadow: 0 3px #666;
				transform: translateY(4px);
			}
		</style>
	</head>
	<body onload="hiding_QE()">
	<div align="left" style="color: black"><p id="date"></p>
		<?php
		   require('conn.php');
					$id=$_GET['id'];
					$sql="SELECT Uid,status FROM userdetails WHERE Uid='$id'";
					$result=$conn->query($sql);
					if($result->num_rows==1)
					{
						$row=$result->fetch_assoc();
						echo "Application Number: ".$row['Uid']."<br>";
						echo "Status: ".$row['status'];
					}
					else{
						echo 'Invalid Application ID';
					}
		?>
	</div>
	<div align="right" style="color: black"><p id="date"></p>
		<?php
		echo date("F D d Y");
		?>
	</div>
		<div align="center" >	
			<h2 style="color: #000000"> Your Details</h2>
				<form name="fillDetails"  method="POST"  action="insert.php" enctype="multipart/form-data" >
					<table align="center" cellpadding = "8">
					<?php
					require('conn.php');
					$id=$_GET['id'];
					$sql="SELECT * FROM userdetails WHERE Uid='$id'";
					$result=$conn->query($sql);
					if($result->num_rows==1)
					{
						$row=$result->fetch_assoc();
						echo '<tr id="idrow1">
							<td >Full Name:</td>
							<td>'.$row['FullName'].'</td>
						</tr> 
						<!------------Fathers Name--------------------------------------------------->
  						<tr id="idrow2">
							<td> Guardians Name:</td>
							<td>'.$row['Father'].'</td>
						</tr>
						<!----- Gender ----------------------------------------------------------->
						<tr id="idrow7">
							<td>Gender:</td>
							<td>'.$row['Gender'].'</td>
						</tr>
						<!-----------Date of Birth--------------------------------------------------------->
  						<tr id="idrow3">
							<td> Date of Birth:</td>
							<td>'.$row['DOB'].'</td>
						</tr>
						<!-------------Adhar Number---------------------------------------------------->
						<tr id="idrow4">
							<td> Adhar Number:</td>
							<td>'.$row['Aadhar'].'</td>
						</tr>
						<!----- Email Id ---------------------------------------------------------->
						<tr id="idrow5">
							<td>Email Id:</td>
							<td>'.$row['Email'].'</td>
						</tr>
 						<!----- Mobile Number ---------------------------------------------------------->
						<tr id="idrow6">
							<td>Contact Number:</td>
							<td>'.$row['Contact'].'</td>
						</tr>
						<!-- Examination Type -------------------------------------------->
						<tr id="idrow7">
							<td>Examination Type:</td>';
							if($row['entrance_exam']=="UEE")
								$exam="University Entrance Exam";
							else
								$exam="Other Competative Examinations";
					echo '<td>'.$exam.'</td>	
						</tr>
						<!-- choose qualified entrance exam ------------------------->';
						if($row['entrance_exam']!="UEE")
						{
						echo '<tr id="idrow8">
							<td>Qualified Exam:</td>
							<td>'.strtoupper($row['entrance_exam']).'</td>
						</tr>';
						}
						echo '<tr id="idrow10">
							<td>Score:</td>
							<td>'.$row['score'].'</td>
						</tr>
						<!-- Choose Offered Course from DB--------------------------------------->
 						<tr>
							<td>Choosen Course:</td>
							<td>'.$row['Course'].'</td>
					</tr>
					<!-- Maximum Qualification as per Choosen Offered Course from DB--------------------------------------->
 					<tr id="idrow12">
						<td>Maximum Qualification:</td>
						<td >'.$row['Qualification'].'</td>
					</tr>
 					<!----- Correspondence Address ---------------------------------------------------------->
					<tr id="idrow13">
						<td>Correspondence Address:</td>
						<td>'.$row['CAddress'].'</tr>
					<tr id="idrow15">
						<td>Permanent Address:</td>
						<td>'.$row['PAddress'].'</td>
					</tr>
					<tr id="idrow16">
						<td>Your Image:</td>
						<td><img id="photo" src="'.$row['photo'].'" height="120px" width="100px"/>	</td>                            
					</tr>
					<tr id="idrow17">
						<td>Choose Signature:</td>
						<td><img id="sign" src="'.$row['sign'].'"  height="60px" width="160px"/></td>
					</tr>
					<tr id="idrow18">
						<td>Submit Date Time:</td>
						<td>'.$row['submit_timing'].'</td>
					</tr>
					<tr id="idrow19">
						<td>Submitting System IP(IPv6):</td>
						<td>'.$row['ip'].'</td>
					</tr>';
					}
					else
						echo 'Invalid Application ID';
					?>
				</table>
				<br><br>
				<input type="button" id="ButtonPrint" onclick="window.print();return false;" value='Print'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="index.html"><input type="button" id="ButtonClose" onClick=reload(); value='Close'></a>
			</form>
	     	</div>
	</body>
</html>
