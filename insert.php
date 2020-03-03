
<?Php
session_start();
?>

<html>
<head>
<title>Data Insert into DB</title>
</head>
<body >
<?Php
echo "Text as entered by user  : $_POST[t1] <br>";
echo "Captcha shown : $_SESSION[my_captcha] <br>";
if($_POST['t1'] == $_SESSION['my_captcha']){
	echo "Captcha validation passed successfully <br>";
	require('conn.php');
    $course=$_POST['course'];
	$sql2="SELECT * FROM course WHERE courses='$course'";
	$result=$conn->query($sql2);
	if($result->num_rows>0){
	$row=$result->fetch_assoc();
	$cid=$row['cid'];
	$cid=sprintf("%02s",$cid);
	$cid="C".$cid;
	}
	$year=date("y");
	$sql1="SELECT Uid FROM userdetails WHERE Uid LIKE '%$cid%'";
	$result=$conn->query($sql1);
	if($result->num_rows>0)
	{
	    while($row=$result->fetch_assoc())
		{
			$uid=$row['Uid'];
		}
		$suid=substr($uid,5);
	    $suid++;
	    $suid=sprintf("%04s",$suid);
	}
	else
		$suid="0001";
	$iuid=$year.$cid.$suid;
	$fname=$_POST['fname'];
	$gname=$_POST['guard'];
	$gender=$_POST['Gender'];
	$dob=$_POST['dob'];
	$adhar=$_POST['adhar'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$qual=$_POST['qual'];
	$caddr=$_POST['CAddress'];
	$paddr=$_POST['PAddress'];
	$exam=$_POST['examType'];
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$score="NA";
	if($exam=="OE")
	{
		$exam=$_POST['qualexam'];
		$score=$_POST['score'];
	}
	$target_photo_dir="UserImage/Photo/";
	$target_sign_dir="UserImage/Sign/";
	$target_photo_file=$target_photo_dir . date("d_m_y") . '_' . $_FILES["photo"]["name"];
	$target_sign_file=$target_sign_dir . date("d_m_y") . '_' . $_FILES["sign"]["name"];
	//$imageFileType= pathinfo($target_photo_file,PATHINFO_EXTENSION);
	if(move_uploaded_file($_FILES["photo"]["tmp_name"],$target_photo_file))
	{
		if(move_uploaded_file($_FILES["sign"]["tmp_name"],$target_sign_file))
		{
			echo "Files uploaded successfully<br>";
			$sql="INSERT INTO UserDetails(Uid,entrance_exam,score,FullName,Father,DOB,Aadhar,Email,Contact,Gender,PAddress,CAddress,Course,Qualification,photo,sign,ip) VALUES('$iuid','$exam','$score','$fname','$gname','$dob','$adhar','$email','$mobile','$gender','$paddr','$caddr','$course','$qual','$target_photo_file','$target_sign_file','$ipaddress')";
			if($conn->query($sql)==TRUE){
				echo "Information inserted successfully<br>";
				echo "Your registration number is ".$iuid."<br>";
			}
			else
				echo "Error in insertion<br>".$conn->error;
		}
		else
			echo "Error in uploading Sign<br>";
	}
	else
		echo "Error in uploading Photo<br>";
	$conn->close();
}
else 
{
	echo "Captcha validation failed<br>";
}
unset($_SESSION['my_captcha']);
?>
</body>
</html>


