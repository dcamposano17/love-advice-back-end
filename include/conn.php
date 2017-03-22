<?php
	
	$dbcon = mysqli_connect("localhost","root","","la_db");
	
if(mysqli_connect_errno())
{
	echo "Failed to connect".mysqli_connect_error(), mysqli_connect_errno();
	
}
?>