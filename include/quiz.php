<?php

include_once 'db.php';

class Quiz{

private $db;

private $db_table = "family_question_tbl";

public function __construct(){

$this->db = new DbConnect();

}

public function getAllQuizQuestions(){

$json_array = array();

$query = "select * from family_question_tbl";

$result = mysqli_query($this->db->getDb(), $query);

if(mysqli_num_rows($result) > 0){

while ($row = mysqli_fetch_assoc($result)) {

$json_array["family_question_tbl"][] = $row;

}

}

return $json_array;

}

}

?>