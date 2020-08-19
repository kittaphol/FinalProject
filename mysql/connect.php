<?php

$connect = mysqli_connect($dbhost, $dbuser, $dbpassword, $databasename);
if($connect == null)
		{
			echo "Not Connect Database";
			exit;
		}
mysqli_query($connect, "SET NAMES UTF8");

?>