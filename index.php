<?php
   require_once('dbConnect.php');
   session_start();

   $row1 =  $conn->query("SELECT * FROM `news` ORDER BY id DESC limit 4 ");
   $row2 =  $conn->query("SELECT * FROM `events` ORDER BY id DESC limit 4 ");


   if (isset($_POST['LogIn'])) {
     $mail= mysqli_real_escape_string($conn,$_POST['Email']);
     $pass= mysqli_real_escape_string($conn,$_POST['Password']);

     $sql1 = $conn->query("SELECT `email`, `password` FROM `admin` WHERE (`email`='$mail' and `password`='$pass') ");

     $sql2 = $conn->query("SELECT `email`, `password` FROM `faculty` WHERE (`email`='$mail' and `password`='$pass') ");

     $sql3 = $conn->query("SELECT `email`, `password` FROM `alumni` WHERE (`email`='$mail' and `password`='$pass') ");

     $sql4 = $conn->query("SELECT `email`, `password` FROM `student` WHERE (`email`='$mail' and `password`='$pass') ");


     $count1 = mysqli_num_rows($sql1);
     $count2 = mysqli_num_rows($sql2);
     $count3 = mysqli_num_rows($sql3);
     $count4 = mysqli_num_rows($sql4);

     if ($count1 == 1) {
       $_SESSION['email'] = $mail;
       header("location: Admin/index.php");
     }elseif ($count2 == 1) {
       $_SESSION['email'] = $mail;
       header("location: Faculty/facultytimeline.php");
     }elseif ($count3 == 1) {
       $_SESSION['email'] = $mail;
       header("location: Alumni/alumnitimeline.php");
     }elseif ($count4 == 1) {
       $_SESSION['email'] = $mail;
       header("location: Student/timeline.php");
     }else {
       echo '<script type="text/javascript">';
       echo 'alert("Email or Password is Invalid!")';
       echo '</script>';
     }
     $conn->close();
   }
 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UIU CSE COMMUNITY</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">
    <!--video -->


  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/uiu.png" height="35" width="45" alt=""> UIU CSE COMMUNITY</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link js-scroll-trigger" href="#feed">Events</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link js-scroll-trigger" href="#gallery">Photo Gallery</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact Us</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link js-scroll-trigger" href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <!--<a class="nav-link js-scroll-trigger" href="timeline.php">SingIn</a>-->
              <a class="nav-link" href="#popUpSingIn" data-toggle="modal" data-target="#popUpSingIn"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!--Pop up SingIn-->
    <div class="modal fade" id="popUpSingIn">
          <div class="modal-dialog">
              <form class="modal-content bg-faded " method="post" action="">

                <div class="modal-header">
                  <h3 class="modal-title"><i class="fa fa-sign-in" aria-hidden="true"></i> Log-in</h3>
                  <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                  <i class="fa fa-refresh fa-spin fa-3x fa-fw" aria-hidden="true"></i><span class="sr-only">Refreshing...</span>
                </div>

                <div class="modal-body">
                  <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                    <input class="form-control" type="text" autocomplete="on" name="Email" placeholder="Email address">
                  </div><br>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                    <input class="form-control" type="password" autocomplete="off" name="Password" placeholder="Password">
                  </div>
                </div>

                <div class="modal-footer">
                  <a href="#" data-dismiss="modal" class="btn btn-danger">Close</a>
                  <button type="submit" class="btn btn-success" name="LogIn">Log In</button>
                </div>

              </form>
            </div>
        </div>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
        <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>An open platform for students, alumni and faculty</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-10">UIU CSE COMMUNITY can help you build your better future using the experience of Faculty members and Alumni members.</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">We've got what you need!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">UIU CSE COMMUNITY has everything you need to build your future! You will get help by finding job, internship! You can also learn about the struggle of job life and how to achieve success in their path!</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">At Your Service</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-book text-primary mb-3 sr-icons" aria-hidden="true"></i>
              <h3 class="mb-3">Blog</h3>
              <p class="text-muted mb-0">Blogs are written by Faculty members and Alumni members. So that you can learn from their experience.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-envelope-o text-primary mb-3 sr-icons" aria-hidden="true"></i>
              <h3 class="mb-3">Messaging</h3>
              <p class="text-muted mb-0">You can send message to the Faculty members and Alumni members for your personal query!</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-address-card-o text-primary mb-3 sr-icons" aria-hidden="true"></i>
              <h3 class="mb-3">Profile</h3>
              <p class="text-muted mb-0">You can see individual profile of Faculty and Alumni members  and their works, researchs, struggles, achievements.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-search text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Job and Internship</h3>
              <p class="text-muted mb-0">You can search your preferable job and internship!</p>
            </div>
          </div>
        </div><br>
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
                <a class="btn btn-dark btn-xl js-scroll-trigger" href="#feed">News & Events</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Updates Section-->
    <section class="bg-primary" id="feed">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading">News & Events</h2>
              <hr class="light my-1">
            </div>
          </div>
        <div class="row">
          <!-- Recent Updates-->
          <div class="col-lg-6">
            <div class="recent-updates card">
              <div class="card-close">
                <!--<div class="dropdown">
                  <button type="button" id="closeCard6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                  <div aria-labelledby="closeCard6" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                </div>-->
              </div>
              <div class="card-header">
                <h3 align="center" class="h4">News</h3>
              </div>
              <div class="card-body no-padding">
                <?php while($result1 = mysqli_fetch_array($row1)) { ?>
                <div class="item d-flex justify-content-between">
                  <div class="info d-flex">
                    <div class="icon"><i class="icon-rss-feed"></i></div>
                    <div class="title">
                      <h4> <?php echo $result1['heading']; ?></h4>
                      <p> <?php echo $result1['description']; ?> </p>
                    </div>
                  </div>
                  <div class="date text-right"><strong> <?php echo $result1['time']; ?> </strong></div>
                </div>
              <?php } ?>
              </div>
            </div>
          </div>
          <!-- Events -->
          <div class="col-lg-6">
            <div class="recent-activities card">
              <div class="card-close">
                <!--<div class="dropdown">
                  <button type="button" id="closeCard8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                  <div aria-labelledby="closeCard8" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                </div>-->
              </div>
              <div class="card-header">
                <h3 align="center" class="h4">Events</h3>
              </div>
              <div class="card-body no-padding">
                <?php while($result2 = mysqli_fetch_array($row2)) { ?>
                <div class="item d-flex justify-content-between">
                  <div class="info d-flex">
                    <div class="icon"><i class="icon-rss-feed"></i></div>
                    <div class="title">
                      <h4> <?php echo $result2['heading']; ?></h4>
                      <p> <?php echo $result2['description']; ?> </p>
                    </div>
                  </div>
                  <div class="date text-right"><strong> <?php echo $result2['time']; ?> </strong></div>
                </div>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div><br>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
              <a class="btn btn-dark btn-xl js-scroll-trigger" href="#gallery">Gallery</a>
          </div>
        </div>
      </div>

    </section>

    <section class="p-0" id="gallery">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    CSE PROJECT EXPO
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    CSE PROJECT EXPO
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    CSE PROJECT EXPO
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    CSE PROJECT EXPO
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    CSE PROJECT EXPO
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    CSE PROJECT EXPO
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="bg-white text-dark">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">If you have any doubt about us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>+88 01774 098177</p>
          </div>
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-facebook fa-3x mb-3 sr-contact"></i>
            <p>Facebook</p>
          </div>
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-twitter fa-3x mb-3 sr-contact"></i>
            <p>Twitter</p>
          </div>
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-linkedin fa-3x mb-3 sr-contact"></i>
            <p>LinkedIn</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="">uiucsecommunity@gmail.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy;UiuCseCommunity 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

</html>
