<?php
// include Database connection file
include("ajax/conn.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $stud_no = $_POST['stud_no'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $program = $_POST['program'];
    $gender = $_POST['gender'];

    // Update User details
    $query = "UPDATE students_tbl SET stud_no = '$stud_no', lastname = '$lastname', firstname = '$firstname', middlename = '$middlename', program = '$program',gender = '$gender' WHERE id = '$id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}