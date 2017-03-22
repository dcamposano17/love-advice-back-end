<?php

session_start();

if(!$_SESSION['username']) {
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
	 					<h3 class="page-header"><i class="fa fa-group"></i>List of available assessment</h3>
	 				</div>
	 			</div>
            <!-- page start-->
				<div class="row">
					<div class="col-md-12">
						<table class="table table-striped table-advance table-hover">
							<tbody>
								<tr>
									<th><i class="icon_profile"></i> Assessment Name</th>
									<th><i class="icon_ul"></i> Assessment type</th>
                           <th><i class="icon_cogs"></i> Action</th>
								</tr>
							  <?php
									require_once 'include/mysqli_connection.php';

									$view_users_query = "SELECT * FROM assessment_tbl";

									$run_query = mysqli_query($dbcon, $view_users_query);

									while ($row = mysqli_fetch_array($run_query)) {
										echo '<tr>
													<td>'.$row[1].'</td>
													<td>'.$row[2].'</td>
													<td>
														<div class="btn-group">
															<button id="'.$row[0].'" class="btn btn-danger delete_assessment" data-title="Delete" data-toggle="modal" data-target="#delete_assessment"><i class="fa fa-trash-o"></i> Delete </button>
															<button id="'.$row[0].'" class="btn btn-success edit_assessment" data-title="Edit"><i class="icon_pencil-edit"></i> Edit </button>
															<button id="'.$row[0].'" class="btn btn-primary view_assessment" data-title="View" data-toggle="modal" data-target="#view_assessment"><i class="fa fa-eye"></i> View </button>
														</div>
													</td>
												</tr>';
								  }
							  ?>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4" id="assessment_message" style="display: none;">
						<div class="alert alert-info" role="alert"><p id="assessment_message_text"><strong>Successfully created an assessment!</strong></p></div>
					</div>
				</div>
            <div class="row">
					<form action="api/create_assessment.php" method="post" id="create_assessment_form">
						<div class="col-md-4">
							<h4>Create an assessment</h4>
							<div class="form-group">
				         	<label for="assess_name">Assessment name:</label>
				         	<input maxlength="100" class="form-control " type="text" id="assess_name" name="assess_name" required>
				         </div>
							<div class="form-group">
				         	<label for="category">Assessment Category:</label>
								<select class="form-control" name="category" id="category" required>
									<option value="">Select a category</option>
									<option value="Family">Family</option>
									<option value="Friends">Friends</option>
									<option value="Special someone">Special someone</option>
								</select>
							</div>
							<div id="div_num_question">
							</div>
							<button id="btn_assessment" type="submit" class="btn btn-danger" style="width: 100%; margin-bottom: 10px;">Create assessment</button>
							<div class="row" style="display: none;" id="div_edit_buttons">
								<div class="col-md-12">
									<button id="btn_edit_assessment"  class="btn btn-success edit_button" style="width: 100%; margin-bottom: 10px;">Edit assessment</button>
									<button id="btn_cancel_assessment" class="btn btn-warning edit_button" style="width: 100%;">Cancel</button>
								</div>
							</div>
							<input type="hidden" name="edit_assessment" id="edit_assessment">
						</div>
						<div id="div_questions">
							<h4 id="list_questions_h4"></h4>
							<div id="list_of_questions">

							</div>
						</div>

						<div class="col-md-4">
							<div id="div_choices" style="display: none;">
								<div class="row">
									<div class="col-md-12">
										<h4>Choices and Advices</h4>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
					  					 	<label for="assess_name">Choice #1:</label>
					  					 	<input value="choice 1" maxlength="100" class="form-control " type="text" id="choice_1" name="choice[]" required>
										</div>
									</div>
									<!-- value="choice 1" -->
									<div class="col-md-6">
										<div class="form-group">
											<label for="assess_name">Choice #2:</label>
											<input value="choice 2" maxlength="100" class="form-control " type="text" id="choice_2" name="choice[]" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
					  					 	<label for="assess_name">Choice #3:</label>
					  					 	<input value="choice 3" maxlength="100" class="form-control " type="text" id="choice_3" name="choice[]" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="assess_name">Choice #4:</label>
											<input value="choice 4" maxlength="100" class="form-control " type="text" id="choice_4" name="choice[]" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="assess_name">Advice in choice 1 who most answer in choice #1:</label>
											<textarea id="advice_1" name="advice[]" style="resize: none" placeholder="Enter your advice:" class="form-control" required>Sample advice 1</textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="assess_name">Advice in choice 2 who most answer in choice #2:</label>
											<textarea id="advice_2" name="advice[]" style="resize: none" placeholder="Enter your advice:" class="form-control" required>Sample advice 2</textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="assess_name">Advice in choice 3 who most answer in choice #3:</label>
											<textarea id="advice_3" name="advice[]" style="resize: none" placeholder="Enter your advice:" class="form-control" required>Sample advice 3</textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="assess_name">Advice in choice 4 who most answer in choice #4:</label>
											<textarea id="advice_4" name="advice[]" style="resize: none" placeholder="Enter your advice:" class="form-control" required>Sample advice 4</textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
            </div>
            <!-- page end-->
         </section>
      </section>
      <!--main content end-->
  	</section>
	<div class="modal fade" id="delete_assessment" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	  		  	<div class="modal-header">
		  			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon_close" aria-hidden="true"></span></button>
		  			<h4 class="modal-title custom_align" id="Heading"><b>Delete status</b></h4>
		  	 	</div>
	  		  	<div class="modal-body">
	  	  			<div class="alert alert-danger">
						<span class="fa fa-exclamation-triangle"></span> Do you really want to delete this assessment?
					</div>
	  	 		</div>
		  		<div class="modal-footer ">
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			  		<input id="btn_delete_assessment" type="Submit" class="btn btn-danger" name="delete" value="Yes"></input>
			  		<input type="hidden" id="delete_id">
			  	</div>
	  		</div>
	   </div>
	</div>
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
  		$(function(){

			$('.edit_assessment').click(function(){
				$('#list_of_questions').html('')
				$.ajax({
		         url: 'api/select_assessment.php',
		         type: 'POST',
		         dataType: 'JSON',
		         data: {id: $(this).attr('id')},
		         success: function(json) {
						console.log(json)
		            if (json.status === 'true') {
							$('#num_question').hide()
							$('#div_edit_buttons').show()
							$('#btn_assessment').hide()
							$('#edit_assessment').val(json.assessment_tbl[0].id)
							$('#assess_name').val(json.assessment_tbl[0].assessment_name)
							$('#category option[value='+json.assessment_tbl[0].assessment_type+']').attr('selected','selected');
							$('#div_questions').addClass('col-md-4')
							$('#div_choices').show()
							for (var i = 0; i < json.assessment_question_tbl.length; i++) {
								$('#list_questions_h4').text('List of question')
								$('#list_of_questions').css({'height': '450px', 'overflow-y': 'scroll', 'padding-right': '50px'})
								$('#list_of_questions').append(
									'<div class="form-group">'+
										'<label for="question">Question #'+(i+1)+':</label>'+
										'<textarea style="resize: none" placeholder="Enter your question:" id="question_'+i+'" name="question[]" class="form-control text_questions" required>'
										+json.assessment_question_tbl[i].question+'</textarea>'+
									'</div>')
							}

							for (var i = 0; i < json.assessment_choice_advice_tbl.length; i++) {
								$('#choice_'+(i+1)+'').val(json.assessment_choice_advice_tbl[i].choice)
								$('#advice_'+(i+1)+'').val(json.assessment_choice_advice_tbl[i].advice)
							}


		            }
		         },
		         error: function(err) {
		            console.log(err)
		         }
		      })
			})

			$('#btn_cancel_assessment').click(function(e){
				e.preventDefault()
				$('#div_edit_buttons').hide()
				$('#btn_assessment').show()
				$('#create_assessment_form')[0].reset();
				$('#category option[value=""]').attr('selected','selected');
				$('#div_choices').hide()
				$('#list_of_questions').html('')
				$('#list_questions_h4').text('')
				$('#list_of_questions').removeAttr('style')
			})

			$('#btn_edit_assessment').click(function(e){
				e.preventDefault()
				$.ajax({
					url: 'api/delete_assessment.php',
					type: 'POST',
					dataType: 'JSON',
					data: {id: $('#edit_assessment').val()},
					success: function(json) {
						console.log(json)
						if (json.status === 'true') {
							$('#btn_edit_assessment').html('Editing&nbsp&nbsp<img height="20" src="img/loader.gif"/>')
							insert_assessment('Successfully edit create an assessment', $('#create_assessment_form').attr('action'))
						}
					},
					error: function(err) {
						console.log(err)
					}
				})
			})

			$('.delete_assessment').click(function(){
				$('#delete_id').val($(this).attr('id'))
			})

			$('#btn_delete_assessment').click(function(){
				$.ajax({
		         url: 'api/delete_assessment.php',
		         type: 'POST',
		         dataType: 'JSON',
		         data: {id: $('#delete_id').val()},
		         success: function(json) {
						console.log(json)
		            if (json.status === 'true') {
							alert('Deleted successfully!')
							$('#delete_id').val('')
							$('#delete_assessment').modal('hide')
		            }
		         },
		         error: function(err) {
		            console.log(err)
		         }
		      })
			})

			$('#delete_assessment').on('hidden.bs.modal', function(){
				if ($('#delete_id').val() == '') {
					location.reload()
				}
			})

			$('#category').change(function(){
				if (!$('#div_edit_buttons').is(":visible")) {
					if ($(this).val() !== '') {
						$('#div_num_question').html(
						'<div class="form-group" >'+
							'<label for="assess_name">Number of questions:</label>'+
							'<input maxlength="2" class="form-control" type="number" id="num_question" name="num_question" required>'+
						'</div>')
					} else {
						$('#div_num_question').html('')
					}
				}
			})

			$(document).on('input', '#num_question', function(){
				$('#list_of_questions').html('')
				$('#list_questions_h4').text('')
				var num_question = $(this).val()
				if (num_question.length === 0) {
					$('#list_questions_h4').text('')
					$('#list_of_questions').removeAttr('style')
					$('#div_questions').removeClass('col-md-4')
					$('#div_choices').hide()
				} else {
					$('#div_questions').addClass('col-md-4')
					$('#div_choices').show()
					if (num_question <= 20) {
						$('#list_questions_h4').text('List of question')
						for (var i = 1; i < parseInt(num_question) + 1; i++) {
							$('#list_of_questions').css({'height': '450px', 'overflow-y': 'scroll', 'padding-right': '50px'})
							$('#list_of_questions').append(
								'<div class="form-group">'+
									'<label for="question">Question #'+i+':</label>'+
									'<textarea style="resize: none" placeholder="Enter your question:" id="question_'+i+'" name="question[]" class="form-control text_questions" required>Sample question '+i+'</textarea>'+
								'</div>')
						}
					} else {
						$('#div_choices').hide()
						$('#list_of_questions').removeAttr('style')
						$('#list_of_questions').html('<h3 style="color: #ff2d55">Maximum of 20 question only!</h3>')
					}
				}
			}) // End of input function!

			$('#create_assessment_form').submit(function(e){
				e.preventDefault()
				$('#btn_assessment').html('Creating&nbsp&nbsp<img height="20" src="img/loader.gif"/>')
				insert_assessment('Successfully create an assessment', $(this).attr('action'))
			})

			function insert_assessment(message_text, action){
				$.ajax({
		         url: action,
		         type: 'POST',
		         dataType: 'JSON',
		         data: $('#create_assessment_form').serialize(),
		         success: function(json) {
						console.log(json)
		            if (json.status === 'true') {
							// Display the alert message!
							$('#assessment_message_text').text(message_text)
							$('#assessment_message').fadeIn()
							$('#assessment_message').fadeOut(2000, function(){
								location.reload()
							})
							$('#div_choices').hide()
							$('#btn_assessment').html('Create assessment')
							$('#btn_edit_assessment').html('Edit assessment')
							$('#create_assessment_form')[0].reset();
							$('#category option[value=""]').attr('selected','selected');
							$('#list_of_questions').html('')
							$('#list_questions_h4').text('')
							$('#list_of_questions').removeAttr('style')
		            }
		         },
		         error: function(err) {
		            console.log(err)
		         }
		      })
			}
		}) // End of ready function!
   </script>
  	</body>
</html>
