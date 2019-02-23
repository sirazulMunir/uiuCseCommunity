<?php

  require_once ('../dbConnect.php');
  session_start();

  if(!isset($_SESSION['email'])){
    header("Location: ../index.php");
    exit;
  }

  $user = $_SESSION['email'];
  $sql1 = $conn->query("SELECT * FROM `faculty` WHERE (email = '$user') ");
  $result1 = mysqli_fetch_array($sql1);
  $bAuthor = $result1['name'];
  $bAuthorType = "faculty";

  if(isset($_POST['Edit'])) {

    $fName = $_POST['Name'];
    $fDesignation = $_POST['Designation'];
    $fEmail = $_POST['Email'];
    $fQualification = $_POST['Qualification'];
    $fCompany = $_POST['Company'];
    $fExperience = $_POST['Experience'];
    $fProjects = $_POST['Projects'];
    $fHobby = $_POST['Hobby'];
    $fFacebookID = $_POST['fID'];
    $fTwitterID = $_POST['tID'];
    $fLinkedInID = $_POST['InID'];
    $fPassword = $_POST['Password'];

    $s = $conn->query(" UPDATE `faculty` SET `name`='$fName',`designation`='$fDesignation',`email`='$fEmail',`qualification`='$fQualification',
           `company`='$fCompany',`experience`='$fExperience',`projects`='$fProjects', `hobby`='$fHobby',`fbID`='$fFacebookID',
           `twitterID`='$fTwitterID',`linkedInID`='$fLinkedInID', `password`='$fPassword'
            WHERE (email = '$user') ");

    if ($s == 1) {
       echo '<script type="text/javascript">';
       echo 'alert("Profile updated")';
       echo '</script>';
     }else {
       echo '<script type="text/javascript">';
       echo 'alert("Can not Update Profile")';
       echo '</script>';
     }

    header("Location: facultytimeline.php");

  }

  if (isset($_POST['bPost'])) {
    $bTitle= $_POST['bTitle'];
    $bType = $_POST['bType'];
    $bDescription = $_POST['bDescription'];
    $tit=str_replace("'","''",$bTitle);
    $dis=str_replace("'","''",$bDescription);

    $target = "../Photos/".basename($_FILES['bPhoto']['name']);
    $image= $_FILES['bPhoto']['name'];
    move_uploaded_file($_FILES['bPhoto']['tmp_name'],$target);


    $t = $conn->query("INSERT INTO `blog`( `title`, `category`, `description`, `thumbnail`, `author`, `author_type`, `time`)
                  VALUES ('$tit','$bType','$dis','$image','$bAuthor','$bAuthorType',Now())");

   if ($t == 1) {
      echo '<script type="text/javascript">';
      echo 'alert("Inserted")';
      echo '</script>';
    }else {
      echo '<script type="text/javascript">';
      echo 'alert("Can not insert Blog")';
      echo '</script>';
    }

    header("Location: facultytimeline.php");
  }

  $row1 = $conn->query("SELECT * FROM `blog` WHERE (author = '$bAuthor') order by id desc");

  /*if (isset($_POST['UpdateBlog'])) {
    $iid = $_GET['dd'];
    $bDes = $_POST['Ublog'];
    $dis=str_replace("'","''",$bDes);
    $conn->query("UPDATE `blog` SET `description`='$dis' WHERE (id = '$iid') ");
    header('location: facultytimeline.php');
  }*/

 if(isset($_POST['postjob'])){
    $jtitle= $_POST['jobtitle'];
    $jsalary=$_POST['salary'];
    $jlocation=$_POST['joblocation'];
    $jcategory=$_POST['jobcategory'];
    $jdescription=$_POST['jobdescription'];
    $jcontact=$_POST['contactdetails'];
    $jauthor=$result1['name'];

    $conn->query("INSERT INTO `job`(`title`, `salary_range`, `location`, `job_category`, `job_description`, `contact_details`, `author`, `time`)
                             VALUES ('$jtitle','$jsalary','$jlocation','$jcategory','$jdescription','$jcontact',' $jauthor',Now())");

  }

  $conn->close();

 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Faculty Timeline</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container">
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
                        <li class="nav-item">
                            <a href="" data-target="#blogpost" data-toggle="tab" class="nav-link">Post A Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#manageblog" data-toggle="tab" class="nav-link">Manage Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#postjob" data-toggle="tab" class="nav-link">Post A Job</a>
                        </li>
                    </ul>

                    <div class="tab-content py-4">

                        <div class="tab-pane active" id="profile">
                                <h5 class="mb-3"><?php echo $result1['name']; ?></h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Designation</h5>
                                        <p><?php echo $result1['designation']; ?></p>
                                        <h5>Company/Organization</h5>
                                        <p> <?php echo $result1['company']; ?></p>
                                        <h5>Experience</h5>
                                        <p><?php echo $result1['experience']; ?></p>
                                        <h5>Research/Projects</h5>
                                        <p><?php echo $result1['projects']; ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Highest Qualification</h5>
                                        <p> <?php echo $result1['qualification']; ?></p>
                                        <h5>Hobbies</h5>
                                        <p> <?php echo $result1['hobby']; ?></p>
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
                                            <input class="form-control" type="text" name="Name" value="<?php echo $result1['name']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Designation</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="Designation" value="<?php echo $result1['designation']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="email" name="Email" value="<?php echo $result1['email']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Highest Qualification</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="Qualification" value="<?php echo $result1['qualification']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Company/Organization</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="Company" value="<?php echo $result1['company']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Experience</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="Experience" value="<?php echo $result1['experience']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Research/Projects</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="Projects" value="<?php echo $result1['projects']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Hobby</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="Hobby" value="<?php echo $result1['hobby']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Facebook ID</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="fID" value="<?php echo $result1['fbID']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Twitter ID</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="tID" value="<?php echo $result1['twitterID']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Linkedin ID</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="InID" value="<?php echo $result1['linkedInID']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="Password" value="<?php echo $result1['password']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input type="reset" class="btn btn-secondary" value="Cancel">
                                            <button type="submit" class="btn btn-primary" name="Edit">Save Changes</button>
                                        </div>
                                    </div>
                              </form>
                        </div>

                        <div class="tab-pane" id="blogpost">
                                <form role="form" method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Blog Title</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" placeholder="Title" name="bTitle">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Blog Category</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" size="0" name="bType">
                                                <option value="">Choose Blog Category</option>
                                                <option value="Job">Job</option>
                                                <option value="Career">Career</option>
                                                <option value="Struggle">Struggle</option>
                                                <option value="Software">Software</option>
                                                <option value="Freelancing">Freelancing</option>
                                                <option value="IT">IT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Description</label>
                                        <div class="col-lg-9">
                                            <textarea rows="3" class="form-control" placeholder="Description" name="bDescription"></textarea>
                                        </div>
                                    </div>
                                      <div class="col-lg-4 order-lg-1 text-left" style="align-content: right; float: right;">
                                            <h6 class="">Upload Blog Thumbnail</h6>
                                            <label class="custom-file">
                                                <input type="file" class="form-control" name="bPhoto" autocomplete="off"/>
                                            </label>

                                     <div class="" style="float: right; align-content: right">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <button type="submit" class="btn btn-success" name="bPost">Post</button>
                                        </div>
                                    </div>
                                </div>
                           </form>
                        </div>

                        <div class="tab-pane" id="manageblog">
                            <div class="card">
                                <div class="card-body" id="blogTable">
                                    <table class="table table-bordered">
                                      <thead>
                                          <tr>
                                            <th width="60%">Blog Title</th>
                                            <th width="30%">Date</th>
                                            <th width="10%" colspan="2">Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php while($result = mysqli_fetch_array($row1))  { ?>
                                            <tr>
                                              <td> <?php echo $result['title']; ?> </td>
                                              <td> <?php echo $result['time']; ?> </td>
                                              <td><input type="button" name="edit" value="Edit" id="<?php echo $result["id"]; ?>" class="btn btn-warning btn-xs edit_data" /></td>
                                              <td><a onclick="return confirm('Are you sure want to Delete Blog?')" href="deleteBlog.php?id= <?php echo $result['id']; ?>" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                      <?php } ?>
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="postjob">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Job Title</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" placeholder="Title" name="jobtitle">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Salary Range </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" placeholder="Salary" name="salary">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Job Location </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" placeholder="Location" name="joblocation">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Job Category</label>
                                        <div class="col-lg-9">
                                            <select id="user_time_zone" class="form-control" size="0" name="jobcategory">
                                                <option value="Part-time">Part-Time</option>
                                                <option value="Full-Time">Full-Time</option>
                                                <option value="Freelancer">Freelance</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">JOb Description </label>
                                        <div class="col-lg-9">
                                            <textarea rows="3" class="form-control" placeholder="Description" name="jobdescription"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Contact Details</label>
                                        <div class="col-lg-9">
                                            <textarea rows="3" class="form-control" placeholder="Contact" name="contactdetails"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <button type="submit" class="btn btn-success" name="postjob">Post</button>
                                        </div>
                                    </div>
                                </form>
                          </div>

                  </div>

                </div>


                <div class="col-lg-4 order-lg-1 text-center">
                    <img class="img-thumbnail avatar avatar-original" style="-webkit-user-select:none; display:block; margin:auto;"  width="300" height="450" <?php echo "<img src='../Photos/".$result1['facultyPhoto']."'> "; ?>
                    <h6 class="mt-2">
                </div>

             </div>
          </div>
      </div>
  </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy;UIU CSE Community 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

<div id="add_data_Modal" class="modal fade">
     <div class="modal-dialog">
          <div class="modal-content">
              <form method="post" id="insert_form">
                   <div class="modal-header">
                     <h5 align-items-center class="modal-title" id="exampleModalLongTitle"><i class="fa fa-edit" aria-hidden="true"></i> Update Blog</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                             <label>Blog Title</label>
                             <input type="text" name="title" id="title" class="form-control" />
                             <br />
                             <label>Blog Details</label>
                             <textarea rows="10" cols="60" name="description" id="description" class="form-control"></textarea>
                             <br />
                             <input type="hidden" name="id" id="id" />
                             <input type="hidden" name="author" id="author" />
                   </div>
                   <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                   </div>
              </form>
          </div>
     </div>
</div>

<script>
 $(document).ready(function(){
      $(document).on('click', '.edit_data', function(){
           var id = $(this).attr("id");
           $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                     $('#title').val(data.title);
                     $('#description').val(data.description);
                     $('#id').val(data.id);
                     $('#author').val(data.author);
                     $('#insert').val("Update");
                     $('#add_data_Modal').modal('show');
                }
           });
      });
      $('#insert_form').on("submit", function(event){
           event.preventDefault();
           if($('#title').val() == ""){
                alert("Title is required");
           }else if($('#description').val() == ''){
                alert("Description is required");
           }else{
                $.ajax({
                     url:"insert.php",
                     method:"POST",
                     data:$('#insert_form').serialize(),
                     beforeSend:function(){
                          $('#insert').val("Inserting");
                     },
                     success:function(data){
                          $('#insert_form')[0].reset();
                          $('#add_data_Modal').modal('hide');
                          $('#blogTable').html(data);
                     }
                });
           }
      });
 });
 </script>
