<?php

require_once('../include/mysqli_connection.php');

/* Check if the request is ajax!
	if the request is ajax execute the insert function
*/
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	if (isset($_POST['id']) && $_POST !== FALSE) {

		$id = $dbcon->real_escape_string(trim($_POST["id"]));
		$delete_student = "DELETE FROM students_tbl WHERE id = '$id' LIMIT 1";

		if($dbcon->query($delete_student) === TRUE) {

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
