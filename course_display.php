<?php
	require('conn.php');
	/*if(isset($_POST["s_exam"])){
		$exam=$_POST['s_exam'];
		require('conn.php');
		$sql="SELECT * FROM course WHERE req_exam='$exam'";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			$row=$result->fetch_assoc();
			echo '<select class="course" name="course" required="required" onchange="showMaxQual()">';
				echo '<option  value="">Select Course</option>';
			while($row)
			{
				echo '<option value="'.$row[courses].'">'.$row[courses].'</option>';
				$row=$result->fetch_assoc();
			}
			echo '</select>';
		}
	}*/
	$exam=$_GET['q'];
	$sql="SELECT * FROM course WHERE req_exam='$exam'";
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		echo '<select class="course" name="course" required="required" onchange="showtitle()">
				<option  value="">Select Course</option>';
		while($row=$result->fetch_assoc())
		{
			echo '<option value="'.$row[courses].'">'.$row[courses].'</option>';
		}
		echo '</select>';
	}
	$conn->close();
?>


