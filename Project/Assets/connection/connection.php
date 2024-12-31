<?php
$Servername="localhost";
$Username="root";
$Password="";
$Database="db_miniproject";
$Conn=mysqli_connect($Servername,$Username,$Password,$Database);
if(!$Conn)
{
	echo "COnnection Failed";
	
	}
?>









