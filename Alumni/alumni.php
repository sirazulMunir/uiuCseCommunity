<?php
    require_once ('../dbConnect.php');
    session_start();

    if (!isset($_SESSION['email'])) {
      header("Location: ../index.php");
      exit;
    }

    $user = $_SESSION['email'];
    $sql1 = $conn->query("SELECT * FROM `alumni` WHERE (email = '$user') ");
    $result1 = mysqli_fetch_array($sql1);

    $row1 = $conn->query("SELECT * FROM `alumni` WHERE 1");

    $conn->close();

 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alumni</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/socialicon.css">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
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
              <a class="nav-link" href="faculty.php"><i class="fa fa-user-o" aria-hidden="true"></i> Faculty Members</a>
            </li>
            <li class="nav-item  active" style="border-right: 1px solid;">
              <a class="nav-link" href="alumni.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Alumni Members<span class="sr-only">(current)</span></a>
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
              <a class="nav-link" href="alumnitimeline.php"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $result1['name']; ?></a>
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

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <div class="card my-4">
            <h3 align="center" class="card-header">Alumni</h3>
            <div class="card-body">
              <table class="table table-striped" id="student_table">
                  <thead>
                      <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Email</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php while($result2 = mysqli_fetch_array($row1))  { ?>
                      <tr>
                        <td> <img class="img-thumbnail avatar avatar-original" style="-webkit-user-select:none; display:block; margin:auto;"  width="50" height="50" <?php echo "<img src='../Photos/".$result2['alumniphoto']."'> "; ?> </td>
                        <td> <a href="alumniDetails.php?id=<?php echo $result2['id']; ?>"> <?php echo $result2['name']; ?> </a> </td>
                        <td> <?php echo $result2['designation']; ?> </td>
                        <td> <?php echo $result2['email']; ?> </td>
                      </tr>
                      <?php } ?>
                  </tbody>
              </table>
            </div>
          </div>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; 1 </a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">2 &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          <div class="card my-4">
            <h5 align="center" class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
               <span class="input-group-addon">Search</span>
               <input type="text" name="search_text" id="search_text" placeholder="Type alumni name" class="form-control"/>
              </div>
            </div>
            <div class="result" id="result"></div>
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

          <script type="text/javascript">
           $('#table table-striped tbody tr').click(function() {
          $(this).addClass('active').siblings().removeClass('active');
      });
      </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"alumniSearchFetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
