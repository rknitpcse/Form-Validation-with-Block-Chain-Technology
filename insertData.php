<?php
$conn=new mysqli('localhost','root','Rishu@9122','FVBCT');
if($conn->connect_error)
{
    die("Connection Error".$conn->connect_error);
}
$fname=$_POST['fullName'];
$uname=$_POST['uName'];
$regno=$_POST['reg'];
$father=$_POST['father'];
$dob=$_POST['dob'];
$adhar=$_POST['adhar'];
$email=$_POST['email'];
$mobile=$_POST['mobileNumber'];
$gender=$_POST['Gender'];
$addr=$_POST['Address'];
$hobby=$_POST['Hobby'];
$sql="INSERT INTO UserDetails VALUES('$fname','$uname','$regno','','','','','','','','')";
?>
