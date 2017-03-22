<?php

include('../include/mysqli_connection.php');

if(isset($_POST["stud_no"])) {
	$stud_no = $_POST["stud_no"];
	$lastname = $_POST["lastname"];
	$firstname = $_POST["firstname"];
	$middlename = $_POST["middlename"];
	$program = $_POST["program"];
	$gender = $_POST["gender"];
	$query = "INSERT INTO students_tbl(stud_no,lastname,firstname,middlename,program,gender) VALUES ('$stud_no','$lastname','$firstname','$middlename','$program','$gender');";
	 
	if(mysqli_query($dbcon, $query)){
	    echo 'Data successfully inserted!';
	    alert('success');
	} else {
		echo 'There was something wrong in your code! '  .  mysqli_error($dbcon);
	}
	 mysqli_close($dbcon);
}
?>