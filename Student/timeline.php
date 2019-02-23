<?php

      require_once('../dbConnect.php');
      session_start();

      if (!isset($_SESSION['email'])) {
        header("Location: ../index.php");
        exit;
      }

      $user = $_SESSION['email'];
      $sql1 = $conn->query("SELECT * FROM `student` WHERE (email = '$user') ");
      $result1 = mysqli_fetch_array($sql1);

      if (isset($_POST['edit'])) {
          $sName= $_POST['name'];
          $sDesignation = $_POST['designation'];
          $sEmail = $_POST['email'];
          $sFacebook = $_POST['fID'];
          $sTwitter = $_POST['tID'];
          $sTwitter = $_POST['tID'];
          $sLinkedIn = $_POST['inID'];
          $sHobby = $_POST['hobby'];
          $sBlood = $_POST['blood'];
          $sProjects = $_POST['projects'];
          $sAddress = $_POST['address'];
          $sPassword = $_POST['password'];

          $conn->query("UPDATE `student`
            SET `name`='$sName',`designation`='$sDesignation',`email`='$sEmail',`fID`='$sFacebook',
                `tID`='$sTwitter',`inID`='$sLinkedIn',`address`='$sAddress',`hobby`='$sHobby',`blood`='$sBlood',
                `projects`='$sProjects',`password`='$sPassword'
                WHERE (email= '$user')");

          $conn->close();
          header("Location: timeline.php");
      }

 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Timeline</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/blog-home.css" rel="stylesh0eet">
    <link rel="stylesheet" type="text/css" href="./css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/socialicon.css">
  </head>

  <body>

    <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="img/uiu.png" height="35" width="45" alt=""> UIU CSE COMMUNITY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"  style="border-right: 1px solid;">
              <a class="nav-link" href="faculty.php"><i class="fa fa-user-o" aria-hidden="true"></i> Faculty Members</a>
            </li>
            <li class="nav-item"  style="border-right: 1px solid;">
              <a class="nav-link" href="alumni.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Alumni Members</a>
            </li>
            <li class="nav-item"  style="border-right: 1px solid;">
              <a class="nav-link" href="students.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Students</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="job/job.php"><i class="fa fa-briefcase" aria-hidden="true"></i> Jobs</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="blog/blog.php"><i class="fa fa-book" aria-hidden="true"></i> Blog</a>
            </li>
            <li class="nav-item active"  style="border-right: 1px solid;">
              <a class="nav-link" href="#"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $result1['name']; ?><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item"  style="border-right: 1px solid;">
              <a class="nav-link" href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container"  style="padding-top:80px;">
      <div class="card my-4">
          <h3 align="center" class="card-header">Profile</h3>
          <div class="card-body">
            <div class="row my-2">
                <div class="col-lg-8 order-lg-2">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Info</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit Profile</a>
                        </li>
                    </ul>
                    <div class="tab-content py-4">
                        <div class="tab-pane active" id="profile">
                            <h5 class="mb-3"> <?php echo $result1['name']; ?></h5>
                            <hr>
                            <div class="row">
                              <div class="col-md-6">
                                  <h5>Student ID</h5>
                                  <p> <?php echo $result1['sID']; ?> </p>
                                  <h5>Designation</h5>
                                  <p> <?php echo $result1['designation']; ?></p>
                              </div>
                                <div class="col-md-6">
                                    <h5>Blood Group</h5>
                                    <p> <?php echo $result1['blood']; ?> </p>
                                    <h5>Hobbies</h5>
                                    <p> <?php echo $result1['hobby']; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Projects</h5>
                                    <p> <?php echo $result1['projects']; ?> </p>
                                    <h5>Social Media Links</h5>
                                    <div class="col-md-12 bg-dark">
                                        <ul class="social-network social-circle">
                                            <li><a href="<?php echo $result1['fID']; ?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="<?php echo $result1['tID']; ?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="<?php echo $result1['email']; ?>" class="icoGoogle" title="Email"><i class="fa fa-envelope"></i></a></li>
                                            <li><a href="<?php echo $result1['inID']; ?>" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
				                            </div>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
                        <div class="tab-pane" id="messages">
                            <div class="alert alert-info alert-dismissable">
                                <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                            </div>
                            <table class="table table-hover table-striped">
                                <tbody>
                                    <tr>
                                        <td>
                                           <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the..
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <span class="float-right font-weight-bold">Yesterday</span> There has been a request on your account since that was..
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <span class="float-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt ullamcorper eros eget luctus.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <span class="float-right font-weight-bold">9/4</span> Maxamillion ais the fix for tibulum tincidunt ullamcorper eros.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="edit">
                            <form role="form" action="" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="name"  value="<?php echo $result1['name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Designation</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="designation" value="<?php echo $result1['designation']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" name="email" value="<?php echo $result1['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Facebook ID</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="fID" value="<?php echo $result1['fID']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Twitter ID</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="tID" value="<?php echo $result1['tID']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Linkedin ID</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="inID" value="<?php echo $result1['inID']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Hobby</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="hobby" value="<?php echo $result1['hobby']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Blood Group</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="blood" value="<?php echo $result1['blood']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Projects</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="projects" value="<?php echo $result1['projects']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="address"  value="<?php echo $result1['address']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="password" value="<?php echo $result1['password']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <button type="submit" class="btn btn-primary" name="edit">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1 text-center">
                    <!--<img src="./img/students/munir.jpg" class="mx-auto img-fluid img-circle d-block" alt="No Image">-->
                    <img class="img-thumbnail avatar avatar-original" style="-webkit-user-select:none; display:block; margin:auto;"  width="300" height="450" <?php echo "<img src='../Photos/".$result1['sPhoto']."'> "; ?>
                    <h6 class="mt-2"><!--Upload a different photo</h6>
                    <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input">
                        <span class="custom-file-control">Choose file</span>
                    </label>-->
                </div>
             </div>
          </div>
      </div>
  </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy;UiuCseCommunity 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
