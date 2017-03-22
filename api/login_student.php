<?php 

include('../include/mysqli_connection.php');

$stud_no = ($_POST['stud_no']);
$middlename = ($_POST['middlename']);

$login_users_query = "select * from students_tbl where stud_no like '$stud_no' and middlename like '$middlename';";
$result = mysqli_query($dbcon,$login_users_query);

if(mysqli_num_rows($result)>0)
{
	$row = mysqli_fetch_assoc($result);

	$data['status']="success";
	$data['message']="User logged in successfully!";
	$data['id']=$row["id"];
	$data['stud_no']=$row["stud_no"];
	$data['lastname']=$row["lastname"];
	$data['firstname']=$row["firstname"];
	$data['middlename']=$row["middlename"];
	$data['program']=$row["program"];
	$data['gender']=$row['gender'];
	echo json_encode($data);
}
else
{
	$data['status']="Failed!";
	$data['message']="No record found!";
	echo json_encode($data);
}
?>