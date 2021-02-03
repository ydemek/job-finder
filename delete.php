<?php


include("config.php");

if($_REQUEST['term'])	{
	$us = $_REQUEST['term'];

	$sql = "DELETE FROM users WHERE username='".$us."'";
	$query = mysqli_query($conn, $sql);
}
?>
