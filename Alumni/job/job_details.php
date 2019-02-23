<?php
    require_once ('../../dbConnect.php');
    session_start();

    if(!isset($_SESSION['email'])){
      header("Location: ../../index.php");
      exit;
    }

    $id = $_GET['id'];
    $user = $_SESSION['email'];
    $row1 = $conn->query("SELECT * FROM `alumni` WHERE (email = '$user' )");
    $result1 = mysqli_fetch_array($row1);
    $row2 = $conn->query("SELECT * FROM `job` WHERE id = '$id' ");
    $result2 = mysqli_fetch_array($row2);

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
   	<meta name="description" content="">

     <title>Job List</title>

   <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/icofont.css">
    <link rel="stylesheet" href="css/slidr.css">
    <link rel="stylesheet" href="css/main.css">
	<link id="preset" rel="stylesheet" href="css/presets/preset1.css">
    <link rel="stylesheet" href="css/responsive.css">

	<!-- font -->
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>

	<!-- icons -->
	<link rel="icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="jobs_img/1.png">
    <link rel="apple-touch-icon" sizes="114x114" href="jobs_img/1.png">
    <link rel="apple-touch-icon" sizes="72x72" href="jobs_img/1.png">
    <link rel="apple-touch-icon" sizes="57x57" href="jobs_img/1.png">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Template Developed By ThemeRegion -->
  </head>
  <body>
	<!-- header -->
	<header id="header" class="clearfix">
		<!-- navbar -->
		<nav class="navbar navbar-default">
			<div class="container">
				<!-- navbar-header -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><img class="img-responsive" src="images/logo.png" alt="Logo"></a>
				</div>
				<!-- /navbar-header -->

				<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="jobs_img/uiu.png" height="35" width="45" alt=""> UIU CSE COMMUNITY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../faculty.php"><i class="fa fa-user-o" aria-hidden="true"></i> Faculty Members</a>
            </li>
            <li class="nav-item " style="border-right: 1px solid;">
              <a class="nav-link" href="../alumni.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Alumni Members</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../students.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Students</a>
            </li>
            <li class="nav-item active" style="border-right: 1px solid;">
              <a class="nav-link" href="job.php"><i class="fa fa-briefcase" aria-hidden="true"></i> Jobs<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../blog/blog.php"><i class="fa fa-book" aria-hidden="true"></i> Blog</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../alumnitimeline.php"><i class="fa fa-user" aria-hidden="true"></i> Timeline</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../../index.php"><i class="fa fa-power-off" aria-hidden="true"></i></a>
						</li>
						</ul>
        </div>
      </div>
    </nav>

	<section class="job-bg page job-details-page">
		<div class="container">

			<div class="banner-form banner-form-full job-list-form">
				<form action="#">
					<!-- category-change -->
					<div class="dropdown category-dropdown">
						<a data-toggle="dropdown" href="#"><span class="change-text">Job Category</span> <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu category-change">
							<li><a href="#">Customer Service</a></li>
							<li><a href="#">Software Engineer</a></li>
							<li><a href="#">Program Development</a></li>
							<li><a href="#">Project Manager</a></li>
							<li><a href="#">Graphics Designer</a></li>
						</ul>
					</div><!-- category-change -->

					<!-- language-dropdown -->
					<div class="dropdown category-dropdown language-dropdown">
						<a data-toggle="dropdown" href="#"><span class="change-text">Job Location</span> <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu category-change language-change">
							<li><a href="#">Location 1</a></li>
							<li><a href="#">Location 2</a></li>
							<li><a href="#">Location 3</a></li>
						</ul>
					</div><!-- language-dropdown -->

					<input type="text" class="form-control" placeholder="Type your key word">
					<button type="submit" class="btn btn-primary" value="Search">Search</button>
				</form>
			</div><!-- banner-form -->

			<div class="job-details">
				<div class="section job-ad-item">
					<div class="item-info">
						<div class="item-image-box">
							<div class="item-image">
								<img src="jobs_img/graphic.jpg" alt="Image" class="img-responsive">
							</div><!-- item-image -->
						</div>

						<div class="ad-info">
							<span><span><a href="#" class="title">Graphics Designer</a></span> @ <a href="#"> AOK Security</a></span>
							<div class="ad-meta">
								<ul>
									<li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>Dhaka</a></li>
									<li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full Time</a></li>
									<li><i class="fa fa-money" aria-hidden="true"></i>$25,000 - $35,000</li>
									<li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>Programmer</a></li>
									<li><i class="fa fa-hourglass-start" aria-hidden="true"></i>Application Deadline : Jan 10, 2018</li>
								</ul>
							</div><!-- ad-meta -->
						</div><!-- ad-info -->
					</div><!-- item-info -->
					<div class="social-media">
						<div class="button">
							<a href="resume.php" class="btn btn-primary"><i class="fa fa-briefcase" aria-hidden="true"></i>Apply For This Job</a>
						</div>

					</div>
				</div><!-- job-ad-item -->

				<div class="job-details-info">
					<div class="row">
						<div class="col-sm-8">
							<div class="section job-description">
								<div class="description-info">
									<h1>Description</h1>
									<p></p>
								</div>
								Graphics Designer (Export Design Studio Team)
<h3>Education:</h3>
Graduate in any discipline from any reputed university.<br>
Diploma in Graphics Design will get higher priority
<h3>Experience:</h3>
3 to 5 year(s)
							</div>
						</div>
						<div class="col-sm-4">
							<div class="section job-short-info">
								<h1>Short Info</h1>
								<ul>
									<li><span class="icon"><i class="fa fa-bolt" aria-hidden="true"></i></span>Posted: 1 day ago</li>
									<li><span class="icon"><i class="fa fa-user-plus" aria-hidden="true"></i></span> Job poster: <a href="../alumnitimeline.php">Khairul Mottakin Tanin</a></li>
									<li><span class="icon"><i class="fa fa-industry" aria-hidden="true"></i></span>Industry: <a href="#">Marketing and Advertising</a></li>
									<li><span class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></span>Experience: <a href="#">Entry level</a></li>
									<li><span class="icon"><i class="fa fa-key" aria-hidden="true"></i></span>Job function: Advertising,Design, Art/Creative</li>
								</ul>
							</div>
							<div class="section company-info">
								<h1>Company Info</h1>
								<ul>
									<li>Compnay Name: <a href="#">Dropbox Inc</a></li>
									<li>Address:Dhaka</li>
									<li>Compnay SIze:  250+ Employee</li>
									<li>Industry: <a href="#">Technology</a></li>
									<li>Phone: +8801654848910</li>
									<li>Email: <a href="#">info@dropbox.com</a></li>
									<li>Website: <a href="#">www.dropbox.com</a></li>
								</ul>
								<ul class="share-social">
									<li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!-- row -->
				</div><!-- job-details-info -->
			</div><!-- job-details -->
		</div><!-- container -->
	</section><!-- job-details-page -->



          <script type="text/javascript">
           $('#table table-striped tbody tr').click(function() {
          $(this).addClass('active').siblings().removeClass('active');
      });
      </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
