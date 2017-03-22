<?php

require_once('../include/mysqli_connection.php');

/* Check if the request is ajax!
	if the request is ajax execute the insert function
*/
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	if (isset($_POST['assess_name']) && $_POST !== FALSE) {

		$assess_name = $dbcon->real_escape_string(strip_tags($_POST['assess_name']));
		$assess_type = $dbcon->real_escape_string(strip_tags($_POST['category']));

		$q = "INSERT INTO assessment_tbl (assessment_name, assessment_type)
				VALUES ('$assess_name', '$assess_type')";

		$r = $dbcon->query($q);

		$id = $dbcon->insert_id;

		if ($r && $dbcon->affected_rows === 1) {

			foreach ($_POST['question'] as $key => $value) {
				$question = $dbcon->real_escape_string(strip_tags($value));
				$q2 = "INSERT INTO assessment_question_tbl (assessment_id, question)
						 VALUES ('$id', '$question')";
				$r2 = $dbcon->query($q2);
			}

			$advice = $_POST['advice'];
			foreach ($_POST['choice'] as $key => $value) {
				$choice = $dbcon->real_escape_string(strip_tags($value));
				$advice_sanitize = $dbcon->real_escape_string(strip_tags($advice[$key]));
				$q3 = "INSERT INTO assessment_choice_advice_tbl (assessment_id, choice, advice)
						 VALUES ('$id', '$choice', '$advice_sanitize')";

				$r3 = $dbcon->query($q3);
			}

			echo json_encode(array('status'=>'true'));

		} else {
			echo json_encode(array(
				'status'=>'false',
				'message'=>'There was something wrong in your code! '  .  $dbcon->error
			));
		}
		mysqli_close($dbcon);
	}

}
