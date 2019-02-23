
<?php
    require_once ('../../dbConnect.php');
    session_start();

    if(!isset($_SESSION['email'])){
      header("Location: ../../index.php");
      exit;
    }

    $user = $_SESSION['email'];
    $row1 = $conn->query("SELECT * FROM `faculty` WHERE (email = '$user' )");
    $result1 = mysqli_fetch_array($row1);
    $row2 = $conn->query("SELECT * FROM `job` WHERE 1 ORDER by time DESC ");

    $conn->close();

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
              <a class="nav-link" href="../timeline.php"><i class="fa fa-user" aria-hidden="true"></i> Timeline</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../../index.php"><i class="fa fa-power-off" aria-hidden="true"></i></a>
						</li>
						</ul>
        </div>
      </div>
    </nav>



				<!-- nav-right -->
			</div><!-- container -->
		</nav><!-- navbar -->
	</header><!-- header -->

	<section class="job-bg page job-list-page">
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

			<div class="category-info">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<div class="accordion">
							<!-- panel-group -->
							<div class="panel-group" id="accordion">

								<!-- panel -->
								<div class="panel panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<div  class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#accordion-one">
												<h4>Categories :<span class="pull-right"></span></h4>
												<p>Graphics Designer<span class="pull-right"></span></p>
												<p>Software Engineer<span class="pull-right"></span></p>
												<p>UI/UX Designer<span class="pull-right"></i></span></p>
												<p>Web Development<span class="pull-right"></span></p>
												<p>Other<span class="pull-right"></span></p>
											</a>
										</div>
									</div><!-- panel-heading -->


								</div><!-- panel -->

							 </div><!-- panel-group -->
						</div>
					</div><!-- accordion-->

					<!-- recommended-ads -->
					<div class="col-sm-8 col-md-7">
						<div class="section job-list-item">
							<div class="featured-top">

								<div class="dropdown pull-right">
									<div class="dropdown category-dropdown">
										<h5>Sort by:</h5>
										<a data-toggle="dropdown" href="#"><span class="change-text">Most Relevant</span></a>

									</div><!-- category-change -->
								</div>
							</div><!-- featured-top -->



 					<?php while($result2 = mysqli_fetch_array($row2))  { ?>
							<div class="job-ad-item">
								<div class="item-info">
									<div class="item-image-box">
										<div class="item-image">
											<a href="job-details.php"><img src="jobs_img/graphic.jpg" alt="Image" height="60" width="2000" class="img-responsive"></a>
										</div><!-- item-image -->
									</div>

									<div class="ad-info">
										<h2 class="card-title"></h2>
										<span><a href="job_details.php" class="title"><?php echo $result2['title']; ?></a> @ <a href="#">AOK Security</a></span>
										<div class="ad-meta">
											<ul>
												<li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $result2['location']; ?></a></li>
												<li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $result2['time']; ?></a></li>
												<li><a href="#"><i class="fa fa-money" aria-hidden="true"></i><?php echo $result2['salary_range']; ?></a></li>
												<li><a href="faculty_details.php">Post By: <?php echo $result2['author']; ?></a></li>
											</ul>
										</div><!-- ad-meta -->
									</div><!-- ad-info -->
								</div><!-- item-info -->
							</div><!-- job-ad-item -->

 <?php } ?>




							<!-- pagination  -->
							<div class="text-center">
								<ul class="pagination ">

									<li><a href="#">1</a></li>
									<li class="active"><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a>...</a></li>
									<li><a href="#">10</a></li>
									<li><a href="#">20</a></li>
									<li><a href="#">30</a></li>

								</ul>
							</div><!-- pagination  -->
						</div>
					</div><!-- recommended-ads -->

					<div class="col-md-2 hidden-xs hidden-sm">
						<div class="advertisement text-center">
							<a href="#"><img src="images/ads/1.jpg" alt="" class="img-responsive"></a>
						</div>
					</div>
				</div>
			</div>
		</div><!-- container -->
	</section><!-- main -->


	<section id="something-sell" class="clearfix parallax-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2 class="title">Add your resume and let your next job find you.</h2>
					<h4>Post your Resume for free on <a href="#">uiucsecommunity.com</a></h4>
					<a href="#" class="btn btn-primary">Add Your Resume</a>
				</div>
			</div><!-- row -->
		</div><!-- contaioner -->
	</section><!-- something-sell -->

	<!-- Footer -->
    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy;UiuCseCommunity 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->

          <script type="text/javascript">
           $('#table table-striped tbody tr').click(function() {
          $(this).addClass('active').siblings().removeClass('active');
      });
      </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
