<?php
		
	header('Content-type: application/json; charset=UTF-8');
		 
	require_once 'include/conn.php';
	
	if (isset($_POST['id']) && !empty($_POST['id'])) {
			
		$id = intval($_POST['id']);
		$query = "SELECT * FROM students_tbl WHERE id=:id";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);						
		
		echo json_encode($row);
		exit;
	}