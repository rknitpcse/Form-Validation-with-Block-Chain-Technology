<?php
$conn=new mysqli('localhost','root','Rishu@9122','FVBCT');
if($conn->connect_error)
{
    die("Connection Error".$conn->connect_error);
}
$user=$_POST['UserId'];
$pass=$_POST['Password'];
$sql="SELECT * FROM UsersLogin WHERE UName='$user'";
$result=$conn->query($sql);
if($result->num_rows==1)
{	
       while($row=$result->fetch_assoc())
	{
   		if($pass==$row['Pswd'])
 		{
	                 header('Location:./afterlogin.htm');
		}
		else
 			echo  '<script type="text/javascript">alert("Password Incorrect");
               window.location="http://localhost/FVBCT/login.htm"</script>';
	}
}
else
	echo  '<script type="text/javascript">alert("Invalid User");
               window.location="http://localhost/FVBCT/login.htm"</script>';
$conn->close();
?>
