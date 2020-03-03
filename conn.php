<?php
$conn=new mysqli('localhost','root','rp143143','FVBCT');
if($conn->connect_error)
{
	die("Connection Error".$conn->connect_error);
}
?>