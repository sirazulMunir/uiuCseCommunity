<?php
    require_once ('../../dbConnect.php');
    session_start();

    if(!isset($_SESSION['email'])){
      header("Location: ../../index.php");
      exit;
    }

    $id = $_GET['id'];
    $user = $_SESSION['email'];
    $row1 = $conn->query("SELECT * FROM `faculty` WHERE (email = '$user' )");
    $result1 = mysqli_fetch_array($row1);
    $row2 = $conn->query("SELECT * FROM `blog` WHERE id = '$id' ");
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

     <title>Blog Details</title>

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
        <a class="navbar-brand" href="#"><img src="img/uiu.png" height="35" width="45" alt=""> UIU CSE COMMUNITY</a>
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
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../job/job.php"><i class="fa fa-briefcase" aria-hidden="true"></i> Jobs</a>
            </li>
            <li class="nav-item active" style="border-right: 1px solid;">
              <a class="nav-link" href="blog.php"><i class="fa fa-book" aria-hidden="true"></i> Blog<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../facultytimeline.php"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $result1['name']; ?></a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a>
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
						<a data-toggle="dropdown" href="#"><span class="change-text">Blog Category</span> <i class="fa fa-angle-down"></i></a>
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
						<a data-toggle="dropdown" href="#"><span class="change-text">Blog Writters</span> <i class="fa fa-angle-down"></i></a>
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
				<div>
          <img class="card-img-top" style="-webkit-user-select:none; display:block; margin:auto;"  width="760" height="300" <?php echo "<img src='../../Photos/".$result2['thumbnail']."'> "; ?><br>
					<h3> <?php echo $result2['title']; ?>  </h3>
				</div>
				<div class="job-details-info">
					<div class="row">
						<div class="col-sm-8">
							<div class="section job-description">
								<div class="description-info">
									  <p> <?php echo $result2['description']; ?> </p>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="section job-short-info">
								<h1>Short Info</h1>
								<ul>
									<li><span class="icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>Posted on: <b><?php echo $result2['time']; ?> </b> </li>
									<li><span class="icon"><i class="fa fa-user-o" aria-hidden="true"></i></span> Blog  posted by: <b><?php echo $result2['author']; ?> </b> </li>
									<li><span class="icon"><i class="fa fa-tags" aria-hidden="true"></i></span>Category: <b><?php echo $result2['category']; ?> </b></li>
									</li>
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
