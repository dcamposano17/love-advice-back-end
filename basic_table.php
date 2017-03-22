<?php

session_start();

if(!$_SESSION['username'])
{
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <title>Love Advice</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/fullcalendar.css">
    <link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/xcharts.min.css" rel=" stylesheet">
    <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/icons/computer.png">
  </head>


  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">Love <span class="lite">Advice</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">
                </ul>
                <!--  search form end -->
            </div>

            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">


                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/camposano.jpg">
                            </span>
                            <span class="username">Guidance Counselor<span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i>Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
         <div id="sidebar"  class="nav-collapse ">
         	<!-- sidebar menu start-->
	         <ul class="sidebar-menu">
		         <li class="sub-menu">
		            <a href="javascript:;" class="">
		               <i class="icon_profile"></i>
		               <span>Manage Users</span>
		               <span class="menu-arrow arrow_carrot-right"></span>
		            </a>
		            <ul class="sub">
		               <li><a class="" href="basic_table.php">Students Table</a></li>
		         	</ul>
		         </li>
		         <li class="sub-menu">
		         	<a class="" href="assessment.php">
		               <i class="icon_datareport"></i>
		               <span>Create Assessment</span>
		         	</a>
		         </li>
               <li class="sub-menu">
		         	<a class="" href="chat.php">
		               <i class="fa fa-comments"></i>
		               <span>Chat</span>
		         	</a>
		         </li>
	         </ul>
	         <!-- sidebar menu end-->
         </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-group"></i> Students Table</h3>
				</div>
			</div>
         <!-- page start-->
         <div class="row">
            <div class="col-md-12">
					<button class="btn btn-info" data-title="Add" data-toggle="modal" data-target="#insert_student"><i class="icon_plus_alt2"></i> Add New Student</button>
					<br /><br />
               <section class="panel">
						<table class="table table-striped table-advance table-hover">
            			<tbody>
                        <tr>
                           <th><i class="icon_id"></i> ID</th>
                           <th><i class="icon_profile"></i> Student Name</th>
                           <th><i class="icon_ul"></i> Student Number</th>
                           <th><i class="icon_id-2"></i> Program</th>
                           <th><i class="icon_question_alt2"></i> Gender</th>
                           <th><i class="icon_cogs"></i> Action</th>
                        </tr>
							  <?php
									require_once 'include/mysqli_connection.php';

									$view_users_query = "SELECT * FROM students_tbl";

									$run_query = mysqli_query($dbcon,$view_users_query);

								while ($row = mysqli_fetch_array($run_query)) {
									echo '<tr>
                      					<td>'.$row[0].'</td>
											 	<td>'.$row[2].', '.$row[3].' '.$row[4].'</td>
											 	<td>'.$row[1].'</td>
											 	<td>'.$row[5].'</td>
											 	<td>'.$row[6].'</td>
											 	<td>
											  		<div class="btn-group">
												  		<button id="'.$row[0].'" class="btn btn-primary update_student" data-title="Edit" data-toggle="modal" data-target="#update_student"><i class="icon_pencil-edit"></i> Update </button>
												  		<button id="'.$row[0].'" class="btn btn-danger delete_student" data-title="Delete" data-toggle="modal" data-target="#delete_student"><i class="fa fa-trash-o"></i> Delete </button>
				                          		<button id="'.$row[0].'" class="btn btn-success view_student" id="getUser" data-title="View"  data-toggle="modal" data-target="#view_student"><i class="fa fa-eye"></i> View</button>
													</div>
											  	</td>
										  	</tr>';
								  }
							  ?>
                  </table>
               </section>
            </div>
         </div>
         <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>


  <div class="modal fade" id="update_student" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
		 <form id="update_student_form" action="api/update_student.php" method="post">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon_close" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">
        <b>Update this entry</b></h4>
      </div>
          <div class="modal-body">
        <div class="form-group">
        <input name="update_stud_no" class="form-control " type="text" id="update_stud_no" placeholder="Student Number" required>
        </div>
        <div class="form-group">
        <input name="update_last_name" class="form-control " type="text" id="update_last_name" placeholder="Last Name" required>
        </div>
        <div class="form-group">
        <input name="update_first_name" class="form-control " type="text" id="update_first_name" placeholder="First Name" required>
        </div>
        <div class="form-group">
        <input name="update_middle_name" class="form-control " type="text" id="update_middle_name" placeholder="Middle Name" required>
        </div>
        <div class="form-group">
        <input name="update_program" class="form-control " type="text" id="update_program" placeholder="Program" required>
        </div>
        <div class="form-group">
        <input name="update_gender" class="form-control " type="text" id="update_gender" placeholder="Gender" required>
        </div>
        </div>
        <div class="modal-footer ">
			  	<input type="hidden" id="update_id" name="update_id">
        		<button type="submit" class="btn btn-primary btn-lg" style="width: 100%;"> Update</button>
      </div>
        </div>
 		 </form>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>
  <!-- container section end -->



  <div class="modal fade" id="delete_student" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon_close" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading"><b>Delete this entry</b></h4>
      </div>
          <div class="modal-body">

       <div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Do you really want to delete this record?</div>

      </div>
        <div class="modal-footer ">
        <input id="btn_delete_student" type="Submit" class="btn btn-danger" name="delete" value="Yes"></input>
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        <input type="hidden" id="delete_id">
      </div>
        </div>
    </div>
    </div>


<div id="view_student" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog">
                  <div class="modal-content">

                       <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">
                              <i class="icon_profile"></i><b> Student Profile</b>
                            </h4>
                       </div>
                       <div class="modal-body">

                           <div id="modal-loader" style="display: none; text-align: center;">
                            <img src="img/ajax-loader.gif">
                           </div>

                           <div id="dynamic-content">

                           <div class="row">
                                <div class="col-md-12">

                              <div class="table-responsive">

                                <table class="table table-striped table-bordered">
                              <tr>
                              <th>Student Number: </th>
                              <td id="view_stud_no"></td>
                                </tr>

                                <tr>
                              <th>Last Name: </th>
                              <td id="view_last_name"></td>
                                </tr>

                                <tr>
                                <th>First Name: </th>
                                <td id="view_first_name"></td>
                                </tr>

                                <tr>
                                <th>Middle Name: </th>
                                <td id="view_middle_name"></td>
                                </tr>

                                <tr>
                                <th>Program: </th>
                                <td id="view_program"></td>
                                </tr>

                                <tr>
                                <th>Gender: </th>
                                <td id="view_gender"></td>
                                </tr>

                                </table>

                                </div>

                                </div>
                          </div>

                          </div>

                        </div>
                        <div class="modal-footer">
									<input type="hidden" id="view_id">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                 </div>
              </div>
       </div><!-- /.modal -->
       <form method="post" action="api/addstudent.php" id="add_student_form">
       <!-- Modal -->
      <div class="modal fade" id="insert_student" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon_close" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading"><b>Insert New Student</b></h4>
        </div>
        <div class="modal-body">
        <div class="form-group">
        	<label for="stud_no">Student Number:</label>
        	<input value="00820130868" class="form-control " type="text" id="stud_no" name="stud_no" required>
        </div>
        <div class="form-group">
	        <label for="lastname">Last Name:</label>
	        <input value="Llyod" class="form-control " type="text" id="lastname" name="lastname" required>
        </div>
        <div class="form-group">
	        <label for="firstname">First Name:</label>
	        <input value="John" class="form-control " type="text" id="firstname" name="firstname" required>
        </div>
        <div class="form-group">
	        <label for="middlename">Middle Name:</label>
	        <input value="Argenela" class="form-control " type="text" id="middlename" name="middlename" required>
        </div>
        <div class="form-group">
	        <label for="program">Program:</label>
	        <input value="BSIT" class="form-control " type="text" id="program" name="program" required>
        </div>
        <div class="form-group">
	        <label for="gender">Gender:</label>
	        <input value="Male" class="form-control " type="text" id="gender" name="gender" required>
        </div>
        </div>
	       <div class="modal-footer ">
	        <button id="add_student" type="submit" class="btn btn-success btn-lg" style="width: 100%;" name="btnInsert"> Insert</button>
        </div>
        </div>
    <!-- /.modal-content -->
    </div>
      <!-- /.modal-dialog -->
    </div>
  <!-- container section end -->
  </form>

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js" ></script>
  <!-- jQuery full calendar -->
  <script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
  <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
  <!--script for this page only-->
  <script src="js/calendar-custom.js"></script>
  <script src="js/jquery.rateit.min.js"></script>
  <!-- custom select -->
  <script src="js/jquery.customSelect.min.js" ></script>
  <script src="assets/chart-master/Chart.js"></script>

  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
  <!-- custom script for this page-->
  <script src="js/sparkline-chart.js"></script>
  <script src="js/easy-pie-chart.js"></script>
  <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="js/jquery-jvectormap-world-mill-en.js"></script>
  <script src="js/xcharts.min.js"></script>
  <script src="js/jquery.autosize.min.js"></script>
  <script src="js/jquery.placeholder.min.js"></script>
  <script src="js/gdp-data.js"></script>
  <script src="js/morris.min.js"></script>
  <script src="js/sparklines.js"></script>
  <script src="js/charts.js"></script>
  <script src="js/jquery.slimscroll.min.js"></script>

	<script type="text/javascript">
		$(function() {

			reload_table('#delete_student')
			reload_table('#update_student')

			$('#add_student_form').submit(function(e){
				e.preventDefault()
				$.ajax({
		         url: $(this).attr('action'),
		         type: 'POST',
		         dataType: 'JSON',
		         data: $('#add_student_form').serialize(),
		         success: function(json) {
						console.log(json)
		            if (json.status === 'true') {
							alert('Successfully inserted the student!')
							location.reload()
		            }
		         },
		         error: function(err) {
		            console.log(err)
		         }
		      })
			}) // End of insert function!

			$('.update_student').click(function(){
				$('#update_id').val($(this).attr('id'))
			})

			$('.view_student').click(function(){
				$('#view_id').val($(this).attr('id'))
			})

			$('#update_student').on('show.bs.modal', function(){
				$.ajax({
		         url: 'api/view_student.php',
		         type: 'POST',
		         dataType: 'JSON',
		         data: {id: $('#update_id').val()},
		         success: function(json) {
		            if (json.status === 'true') {
							var count = json.data.length - 1
							$('#update_stud_no').val(json.data[count].stud_no)
							$('#update_last_name').val(json.data[count].last_name)
							$('#update_first_name').val(json.data[count].first_name)
							$('#update_middle_name').val(json.data[count].middle_name)
							$('#update_program').val(json.data[count].program)
							$('#update_gender').val(json.data[count].gender)
		            }
		         },
		         error: function(err) {
		            console.log(err)
		         }
		      })
			}) // End of show modal!

			$('.delete_student').click(function(){
				$('#delete_id').val($(this).attr('id'))
			})
			$('#update_student_form').submit(function(e){
				e.preventDefault()
				$.ajax({
		         url: $(this).attr('action'),
		         type: 'POST',
		         dataType: 'JSON',
		         data: $('#update_student_form').serialize(),
		         success: function(json) {
						console.log(json)
		            if (json.status === 'true') {
							alert('Update successfully!')
							$('#update_student').modal('hide')
		            }
		         },
		         error: function(err) {
		            console.log(err)
		         }
		      })
			})

			$('#view_student').on('show.bs.modal', function(){
				$.ajax({
		         url: 'api/view_student.php',
		         type: 'POST',
		         dataType: 'JSON',
		         data: {id: $('#view_id').val()},
		         success: function(json) {
		            if (json.status === 'true') {
							var count = json.data.length - 1
							$('#view_stud_no').text(json.data[count].stud_no)
							$('#view_last_name').text(json.data[count].last_name)
							$('#view_first_name').text(json.data[count].first_name)
							$('#view_middle_name').text(json.data[count].middle_name)
							$('#view_program').text(json.data[count].program)
							$('#view_gender').text(json.data[count].gender)
		            }
		         },
		         error: function(err) {
		            console.log(err)
		         }
		      })
			}) // End of show modal!

			$('#btn_delete_student').click(function(){
				$.ajax({
					url: 'api/delete_student.php',
					type: 'POST',
					dataType: 'JSON',
					data: {id: $('#delete_id').val()},
					success: function(json) {
						if (json.status === 'true') {
							$('#delete_student').modal('hide')
						}
					},
					error: function(err) {
						console.log(err)
					}
				})
			}) // End of click function!

			function reload_table(id){
				$(id).on('hidden.bs.modal', function(){
					location.reload()
				})
			}

		}) // End of ready function!
	</script>
  </body>
</html>
