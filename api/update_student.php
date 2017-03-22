<?php

require_once('../include/mysqli_connection.php');

/* Check if the request is ajax!
	if the request is ajax execute the insert function
*/
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	if (isset($_POST['update_id']) && $_POST !== FALSE) {

		$id = $dbcon->real_escape_string(trim($_POST["update_id"]));
		$stud_no = $dbcon->real_escape_string(trim($_POST["update_stud_no"]));
		$lastname = $dbcon->real_escape_string($_POST["update_last_name"]);
		$firstname = $dbcon->real_escape_string($_POST["update_first_name"]);
		$middlename = $dbcon->real_escape_string($_POST["update_middle_name"]);
		$program = $dbcon->real_escape_string($_POST["update_program"]);
		$gender = $dbcon->real_escape_string($_POST["update_gender"]);

		$update_student = "UPDATE students_tbl SET stud_no = '$stud_no', lastname = '$lastname',
		 						 firstname = '$firstname', middlename = '$middlename', program = '$program',
								 gender = '$gender' WHERE id = '$id' LIMIT 1";

		if($dbcon->query($update_student) === TRUE) {

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
