<?php

  include('../include/mysqli_connection.php');

  //delete
  if (isset($_POST['delete'])){
    $ID = $dbcon->real_escape_string($_POST['ID']);
    $StudentName = $dbcon->real_escape_string($_POST['Student Name']);
    $StudentNumber = $dbcon->real_escape_string($_POST['Student Number']);
    $Program = $dbcon->real_escape_string($_POST['Program']);
    $Gender = $dbcon->real_escape_string($_POST['Gender']);

    $delete_student_query = "DELETE from students_tbl where id = '$ID' limit 1";

    $result = $dbcon->query($delete_student_query);

  if($dbcon->affected_rows){
    echo 'Entry Deleted Successfully!';
  } else{
    echo 'There was something wrong in your code!' .  mysqli_error($dbcon);
    }
    mysqli_close($dbcon);
}
?>