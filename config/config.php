<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "Lou-Geh-University");
if(mysqli_connect_errno())
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

$connect = new PDO('mysql:host=localhost;charset=utf8;dbname=Lou-Geh-University', 'root', '');

$error_array = array();
?>
