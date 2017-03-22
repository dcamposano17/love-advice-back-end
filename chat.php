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

		<style media="screen">
			#students_chats > li {
				padding: 20px;
				background-color: #D81B60;
				border-radius: 5px;
				color: #FFF;
			}
			#students_chats > li:hover {
				background-color: #ff3f46;
			}
			#students_chats > li{
				margin-bottom: 10px;
			}
		</style>

      <!--main content start-->
      <section id="main-content">
         <section class="wrapper">
				<div class="row">
	 				<div class="col-lg-12">
	 					<h3 class="page-header"><i class="fa fa-group"></i>Student Chats</h3>
	 				</div>
	 			</div>
            <div class="row">
	 				<div class="col-md-3">
                  <ul id="students_chats">

                  </ul>
	 				</div>
               <div class="col-md-6" style="border-radius: 10px; border: 50px solid #1a2732; padding: 30px 0px 30px 0px; display:none;" id="chat">
                  <div class="row">
                     <div class="col-md-11">

                     </div>
                     <div class="col-md-11">
								<ul id="chat_bubbles" style="height: 450px; overflow-y: scroll; padding-right: 50px;  padding-left: 50px">
								</ul>
                     </div>
                  </div>
                  <div class="row">
						<div class="col-md-1">
						</div>
                     <div class="col-md-10">
                        <input placeholder="Write a message..." maxlength="500" class="form-control " type="text" id="message" name="assess_name" required>
                     </div><br />
                  </div>
	 				</div>
	 			</div>
            <!-- page start-->
            <!-- page end-->
         </section>
      </section>
      <!--main content end-->
  	</section>
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
  <!-- Firebase includes! -->
  <script src="https://www.gstatic.com/firebasejs/3.6.10/firebase.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.6.10/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.6.10/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.6.10/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.6.10/firebase-messaging.js"></script>

   <script>
	var reference
     // Initialize Firebase
     // TODO: Replace with your project's customized code snippet
     var config = {
       apiKey: "AIzaSyAsnrm2e8m5gu9dCTOT4D4kDOROmgQxagE",
       authDomain: "android-chat-84eaf.firebaseapp.com",
       databaseURL: "https://android-chat-84eaf.firebaseio.com",
       storageBucket: "gs://android-chat-84eaf.appspot.com",
       messagingSenderId: "3002171943",
     };

     firebase.initializeApp(config);

     var database = firebase.database();

      function writeUserData(message, name, message_type, ref) {
         firebase.database().ref(ref).push({
            message: message,
            name: name,
            message_type: message_type
         });
      }

      var chat = firebase.database().ref();
      chat.on('value', function(snapshot) {
         $('#students_chats').html('');
         snapshot.forEach(function(childSnapshot) {
            var childKey = childSnapshot.key;
            $('#students_chats').append('<li>'+childKey+'</li>');
         });
         //console.log(snapshot.val());
      });


      $(document).on('click', '#students_chats > li', function() {
         var chat = firebase.database().ref($(this).text());
			reference = $(this).text()
			console.log(reference.substr (reference.lastIndexOf ("_") + 1))
         chat.on('value', function(snapshot) {
            $('#chat').fadeIn();
				$('#chat_bubbles').html('')
            snapshot.forEach(function(childSnapshot) {
               if (childSnapshot.val().message_type == 2) {
                  $('#chat_bubbles').append(
                     '<li><div class="from-me">'+
                       '<p>'+childSnapshot.val().message+'</p>'+
                     '</div></li><br />');
               } else {
                  $('#chat_bubbles').append(
                     '<li><div class="from-them">'+
                       '<p>'+childSnapshot.val().message+'</p>'+
                     '</div></li><br /><br />');
               }

               console.log(childSnapshot.val().message_type);
            });
         });

			$("#message").keyup(function(e){
			    var code = e.which;
			    if(code == 13){
 					$('#chat_bubbles').html('')
 			      writeUserData($('#message').val(), "Dion Camposano", "2", reference)
					$(this).val('')
			    } // missing closing if brace
			});

			function get_user(stud_no) {
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
			}

      })

   </script>
  	</body>
</html>
