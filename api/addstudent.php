<?php

require_once('../include/mysqli_connection.php');

/* Check if the request is ajax!
	if the request is ajax execute the insert function
*/
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	if (isset($_POST['stud_no']) && $_POST !== FALSE) {

		$stud_no = $dbcon->real_escape_string(trim($_POST["stud_no"]));
		$lastname = $dbcon->real_escape_string($_POST["lastname"]);
		$firstname = $dbcon->real_escape_string($_POST["firstname"]);
		$middlename = $dbcon->real_escape_string($_POST["middlename"]);
		$program = $dbcon->real_escape_string($_POST["program"]);
		$gender = $dbcon->real_escape_string($_POST["gender"]);

		$add_student_query = "INSERT INTO students_tbl(stud_no,lastname,firstname,middlename,program,gender)
									 VALUES ('$stud_no','$lastname','$firstname','$middlename','$program','$gender');";

		if($dbcon->query($add_student_query) === TRUE) {

			echo json_encode(array(
				'status'=>'true'
			));
		} else {
			echo json_encode(array(
				'status'=>'false',
				'message'=>'There was something wrong in your code! '  .  $dbcon->error
			));
		}
		mysqli_close($dbcon);
	}

}
