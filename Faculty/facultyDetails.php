<?php
    require_once ('../dbConnect.php');
    session_start();

    if (!isset($_SESSION['email'])) {
      header("Location: ../index.php");
      exit;
    }

    $user = $_SESSION['email'];
    $sql1 = $conn->query("SELECT * FROM `faculty` WHERE (email = '$user') ");
    $result1 = mysqli_fetch_array($sql1);

    $id = $_GET['id'];

    $row1 = $conn->query("SELECT * FROM `faculty` WHERE (id='$id' )");
    $result2 = mysqli_fetch_array($row1);

    $nm = $result2['name'];

    $row3 = $conn->query("SELECT * FROM `blog` WHERE (author = '$nm' ) ORDER by time DESC");

    $conn->close();

 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Faculty Details</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/socialicon.css">
  </head>

  <body>

    <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">UIU CSE COMMUNITY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active" style="border-right: 1px solid;">
              <a class="nav-link" href="faculty.php"><i class="fa fa-user-o" aria-hidden="true"></i> Faculty Members<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="alumni.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Alumni Members</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="students.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Students</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="job/job.php"><i class="fa fa-briefcase" aria-hidden="true"></i> Jobs</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="blog/blog.php"><i class="fa fa-book" aria-hidden="true"></i> Blog</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="facultytimeline.php"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $result1['name']; ?></a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="card my-4">
          <h3 align="center" class="card-header">Faculty Details</h3>
          <div class="card-body">
            <div class="row my-2">
                <div class="col-lg-8 order-lg-2">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="" data-target="#profile" data-toggle="tab" class="nav-link active"><i class="fa fa-address-card-o" aria-hidden="true"></i> Info</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#messages" data-toggle="tab" class="nav-link"><i class="fa fa-envelope" aria-hidden="true"></i> Send Message</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#blog" data-toggle="tab" class="nav-link"><i class="fa fa-book" aria-hidden="true"></i> Blogs</a>
                        </li>
                    </ul>
                    <div class="tab-content py-4">
                        <div class="tab-pane active" id="profile">
                          <h5 class="mb-3"><?php echo $result2['name']; ?></h5>
                          <hr>
                          <div class="row">
                              <div class="col-md-6">
                                  <h5>Designation</h5>
                                  <p><?php echo $result2['designation']; ?></p>
                                  <h5>Company/Organization</h5>
                                  <p> <?php echo $result2['company']; ?></p>
                                  <h5>Experience</h5>
                                  <p><?php echo $result2['experience']; ?></p>
                                  <h5>Research/Projects</h5>
                                  <p><?php echo $result2['projects']; ?></p>
                              </div>
                              <div class="col-md-6">
                                  <h5>Highest Qualification</h5>
                                  <p> <?php echo $result2['qualification']; ?></p>
                                  <h5>Hobbies</h5>
                                  <p> <?php echo $result2['hobby']; ?></p>
                                  <h5>Social Media Links</h5>

                                  <div class="col-md-12 bg-dark">
                                      <ul class="social-network social-circle">
                                          <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                          <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                          <li><a href="#" class="icoGoogle" title="Email"><i class="fa fa-envelope"></i></a></li>
                                          <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                            <!--/row-->
                        </div>
                        <div class="tab-pane" id="messages">
                            <form role="form">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Message Subject</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" placeholder="Type subject">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Message </label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" class="form-control" placeholder="Type Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="button" class="btn btn-success" value="Send">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="blog">
                          <div class="row">
                            <div class="col-md-12">
                              <?php while($result3 = mysqli_fetch_array($row3))  { ?>
                                <div class="card mb-4">
                                  <!--<img class="card-img-top" src="img/career.jpg" height="300" width="760" alt="Career image">-->
                                  <img class="card-img-top" style="-webkit-user-select:none; display:block; margin:auto;"  width="760" height="300" <?php echo "<img src='../Photos/".$result3['thumbnail']."'> "; ?>
                                  <div class="card-body">
                                    <h2 class="card-title"><?php echo $result3['title']; ?></h2>
                                    <a href="blog/details.php?id=<?php echo $result3['id']; ?>" class="btn btn-primary">Read Details &rarr;</a>
                                  </div>
                                  <div class="card-footer text-muted">
                                    Posted on <?php echo $result3['time']; ?>
                                  </div>
                                </div>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1 text-center">
                    <img class="img-thumbnail avatar avatar-original" style="-webkit-user-select:none; display:block; margin:auto;"  width="300" height="250" <?php echo "<img src='../Photos/".$result2['facultyPhoto']."'> "; ?><hr>
                    <h6 class="mt-2"><?php echo $result2['name']; ?></h6>
                </div>
             </div>
          </div>
      </div>
  </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy;UiuCseCommunity 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
