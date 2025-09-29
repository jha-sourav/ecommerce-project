<?php
$uname="root";
$host="localhost";
$pwd="";
$db="project1";
$conn=mysqli_connect($host,$uname,$pwd,$db);
if(!$conn)
{
	die("Not connected!!");
}
?>