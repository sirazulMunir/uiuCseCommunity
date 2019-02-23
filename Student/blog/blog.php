<?php
    require_once ('../../dbConnect.php');
    session_start();

    if(!isset($_SESSION['email'])){
      header("Location: ../../index.php");
      exit;
    }

    $user = $_SESSION['email'];
    $row1 = $conn->query("SELECT * FROM `student` WHERE (email = '$user' )");
    $result1 = mysqli_fetch_array($row1);
    $row2 = $conn->query("SELECT * FROM `blog` WHERE 1 ORDER by time DESC");
    $conn->close();
 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blogs Home</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/socialicon.css">

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
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../faculty.php"><i class="fa fa-user-o" aria-hidden="true"></i> Faculty Members</a>
            </li>
           <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../alumni.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Alumni Members</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../students.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Students</a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../job/job.php"><i class="fa fa-briefcase" aria-hidden="true"></i> Jobs</a>
            </li>
            <li class="nav-item active" style="border-right: 1px solid;">
              <a class="nav-link" href="#"><i class="fa fa-book" aria-hidden="true"></i> Blog<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../timeline.php"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $result1['name']; ?></a>
            </li>
            <li class="nav-item" style="border-right: 1px solid;">
              <a class="nav-link" href="../logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav><br><br>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 align="center" class="my-4">Blogs</h1>

          <!-- Blog Post -->
        <?php while($result2 = mysqli_fetch_array($row2))  { ?>
          <div class="card mb-4">
            <!--<img class="card-img-top" src="img/career.jpg" height="300" width="760" alt="Career image">-->
            <img class="card-img-top" style="-webkit-user-select:none; display:block; margin:auto;"  width="760" height="300" <?php echo "<img src='../../Photos/".$result2['thumbnail']."'> "; ?>
            <div class="card-body">
              <h2 class="card-title"><?php echo $result2['title']; ?></h2>
              <a href="details.php?id=<?php echo $result2['id']; ?>" class="btn btn-primary">Read Details &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo $result2['time']; ?> by <a href="#"><?php echo $result2['author']; ?></a>
            </div>
          </div>
        <?php } ?>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Newer </a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Older &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Blog Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
					              <a class="navbar-brand" href="#"><img src="img/job.png" height="25" width="25" alt="">Job</a>
                   </li>
                    <li>
                     <a class="navbar-brand" href="#"><img src="img/career icon.jpg" height="25" width="25" alt="">Career</a>
                    </li>
                    <li>
                      <a class="navbar-brand" href="#"><img src="img/intern.png" height="25" width="25" alt="">Internship</a>
                    </li>
                    <li>
                      <a class="navbar-brand" href="#"><img src="img/experience icon.png" height="25" width="25" alt="">Life Experience</a>
                    </li>
                    <li>
                      <a class="navbar-brand" href="#"><img src="img/struggle icon.jpg" height="25" width="25" alt="">Struggle</a>
                    </li>
                    <li>
                      <a class="navbar-brand" href="#"><img src="img/software icon.png" height="25" width="25" alt="">Software</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

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