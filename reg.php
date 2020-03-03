<?php
	if(isset($_POST["regno"])){
		if(isset($_POST["qual"]))
		{
			//Getting the qualified exam
			$qual = $_POST["qual"];
			//Getting the registration number_format
			$regno = $_POST["regno"];
			//Connectng to Database
			$conn=new mysqli('localhost','root','rp143143','FVBCT');
			if($conn->connect_error)
			{
				die("Connection Error".$conn->connect_error);
			}
			$sql="SELECT * FROM $qual where regid=$regno;
			$result=$conn->query($sql);
			if($result->num_rows>0)
			{
				echo '<h1>Multiple Rows Selected</h1>'; 
			}
			if($qual !== "Select Exam"){
				echo '<select name="qual" required>';
				echo '<option value="">Select Exam</option>';
				foreach($courseArr[$course] as $value){
					echo "<option>". $value . "</option>";
				echo "</select>";	
            }
        } 
    }
    ?>


