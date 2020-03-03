<?php
        $course = $_GET["q"];
        require('conn.php');
		$sql="SELECT * FROM course WHERE courses='$course'";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			$row=$result->fetch_assoc();
			$qual=$row['maxqual'];
			$qual= explode(",", $qual); 
			echo '<select name="qual" required>';
			echo '<option value="">Select Qualification</option>';
            foreach($qual as $value){
                echo '<option value="'.$value.'">'. $value .'</option>';
            }
            echo "</select>";
		}
		else 
	        echo "Invalid Selection";
?>


