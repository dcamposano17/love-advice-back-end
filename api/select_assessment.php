<?php

require_once('../include/mysqli_connection.php');

/* Check if the request is ajax!
	if the request is ajax execute the insert function
*/
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	if (isset($_POST['id']) && $_POST !== FALSE) {

		$assess_id = $dbcon->real_escape_string(strip_tags($_POST['id']));

		$q = "SELECT * FROM assessment_tbl WHERE id = '$assess_id' LIMIT 1";

		$r = $dbcon->query($q);

		if ($r && $r->num_rows > 0) {

			while ($row = $r->fetch_object()) {
				$result[] = $row;
			}

			$q2 = "SELECT * FROM assessment_question_tbl WHERE assessment_id = '$assess_id'";

			$r2 = $dbcon->query($q2);

			if ($r2 && $r2->num_rows > 0) {

				while ($row2 = $r2->fetch_object()) {
					$result2[] = $row2;
				}

				$q3 = "SELECT * FROM assessment_choice_advice_tbl WHERE assessment_id = '$assess_id'";

				$r3 = $dbcon->query($q3);

				if ($r3 && $r3->num_rows > 0) {

					while ($row3 = $r3->fetch_object()) {
						$result3[] = $row3;
					}

					echo json_encode(array(
						'status'=>'true',
						'assessment_tbl'=>$result,
						'assessment_question_tbl'=>$result2,
						'assessment_choice_advice_tbl'=>$result3
					));
				}

			}
		}

		mysqli_close($dbcon);
	}

}
