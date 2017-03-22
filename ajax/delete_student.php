<?php
include('include/conn.php');
$id = $_GET['id'];
mysql_query($con,"delete from students_tbl where id = '$id") or die(mysql_error());
header('location:basic_table.php');
?>