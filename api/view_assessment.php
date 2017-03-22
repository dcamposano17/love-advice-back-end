<?php

require_once('../include/mysqli_connection.php');

/* Check if the request is ajax!
	if the request is ajax execute the insert function
*/
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	if (isset($_POST['id']) && $_POST !== FALSE) {

      $id = $dbcon->real_escape_string(trim($_POST['id']));
      $q = "SELECT * FROM assessment_tbl WHERE id = '$id' LIMIT 1";
      $r = $dbcon->query($q);
      $data = array();
      if ($r && $r->num_rows === 1) {
         $row = $r->fetch_object();

         array_push($data, array(
            'id'=>$row->id,
            'stud_no'=>$row->stud_no,
            'last_name'=>$row->lastname,
            'first_name'=>$row->firstname,
            'middle_name'=>$row->middlename,
            'program'=>$row->program,
            'gender'=>$row->gender
         ));
         echo json_encode(array(
            'status'=>'true',
            'data'=>$data
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
