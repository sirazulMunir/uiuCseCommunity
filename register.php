<?php
   require_once('dbConnect.php');
   session_start();

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

   if (isset($_POST['alumniReg'])) {

     $aName= $_POST['alumniName'];
     $aEmail=$_POST['alumniEmail'];
     $aCompany=$_POST['alumniCompany'];
     $aID=$_POST['alumniID'];
     $aAddress = $_POST['alumniAddress'];
     $aPassword= $_POST['alumniPassword'];

     $target = "Photos/".basename($_FILES['alumniPhoto']['name']);
     $image= $_FILES['alumniPhoto']['name'];
     move_uploaded_file($_FILES['alumniPhoto']['tmp_name'],$target);

    $conn->query("INSERT INTO `alumni`(`name`, `email`, `company`, `fID`, `address`, `password`, `alumniphoto`)
                    VALUES ('$aName','$aEmail','$aCompany','$aID','$aAddress', '$aPassword', '$image')");

     $conn->close();

   }

   if (isset($_POST['studentReg'])) {

     $sName= $_POST['studentName'];
     $sEmail=$_POST['studentEmail'];
     $sID=$_POST['studentID'];
     $sFID= $_POST['studentFBID'];
     $sAddress = $_POST['studentAddress'];
     $sPassword= $_POST['studentPassword'];

     $target = "Photos/".basename($_FILES['studentPhoto']['name']);
     $image= $_FILES['studentPhoto']['name'];
     move_uploaded_file($_FILES['studentPhoto']['tmp_name'],$target);

     $conn->query("INSERT INTO `student`(`name`, `email`, `sID`, `fID`, `address`, `password`, `sPhoto`)
                    VALUES ('$sName','$sEmail','$sID','$sFID','$sAddress','$sPassword','$image')");

     $conn->close();
     header("location: register.php");
   }

 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles-->
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
       <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/uiu.png" height="35" width="45" alt=""> UIU CSE COMMUNITY</a>
       <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarResponsive">
         <ul class="navbar-nav ml-auto">
           <li class="nav-item" style="border-right: 1px solid;">
             <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
           <li>
           <li class="nav-item active" style="border-right: 1px solid;">
             <a class="nav-link" href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register<span class="sr-only">(current)</span></a>
           </li>
           <li class="nav-item" style="border-right: 1px solid;">
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
                   <input class="form-control" type="text" autocomplete="on"  name="Email" placeholder="Email address">
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


    <!-- Page Content -->
    <div class="container">
      <div class="card my-4">
          <h3 align="center" class="card-header">Register As</h3>
          <div class="card-body">
            <div class="row my-2">
                <div class="col-lg-8 order-lg-2">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="" data-target="#alumni" data-toggle="tab" class="nav-link active">Alumni</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#student" data-toggle="tab" class="nav-link">Student</a>
                        </li>
                    </ul>
                    <div class="tab-content py-4">
                        <div class="tab-pane active" id="alumni">
                            <form role="form" action="" id="alumniEntry" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="alumniName" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" name="alumniEmail" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Company</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="alumniCompany" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Facebook ID</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="url" name="alumniID" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="alumniAddress" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="alumniPassword" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="alumniCOnPassword"autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Upload Photo</label>
                                    <div class="col-lg-9">
                                      <label class="custom-file">
                                          <!--<input type="file" id="file" class="custom-file-input" name="alumniPhoto" autocomplete="off">
                                          <span class="custom-file-control">Choose file</span>-->
                                          <input type="file" class="form-control" name="alumniPhoto" autocomplete="off"/>
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <button type="submit" class="btn btn-primary" name="alumniReg">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="student">
                            <form role="form" id="studentEntry" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="studentName"autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" name="studentEmail" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Student ID</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="studentID" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Facebook ID</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="studentFBID" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="studentAddress" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="studentPassword" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="studentConPassword" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Upload Photo</label>
                                    <div class="col-lg-9">
                                      <label class="custom-file">
                                          <!--<input type="file" id="file" class="custom-file-input" name="studentPhoto" autocomplete="off">
                                          <span class="custom-file-control"></span>-->
                                          <input type="file" class="form-control" name="studentPhoto" autocomplete="off"/>
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <button type="submit" class="btn btn-primary" name="studentReg">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>

  </body>

</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#studentEntry').bootstrapValidator({
            feedbackIcons: {
               valid: 'glyphicon glyphicon-ok',
               invalid: 'glyphicon glyphicon-remove',
               validating: 'glyphicon glyphicon-refresh'
            },
            fields: {

               studentName: {
                 validators: {
                   stringLength: {
                      min: 5,
                      max: 20,
                      message: "Please enter your name within 5-20 letters"
                   },
                   notEmpty:{
                     message: "Please enter your name"
                   }
                 }
               },

               studentEmail: {
                validators: {
                  notEmpty:{
                    message: "Please enter email"
                  },
                  emailAddress: {
                    message: "Please enter valid email"
                  }
                }
              },

              studentID: {
               validators: {
                 notEmpty:{
                   message: "Please enter valid ID"
                 },
                 stringLength: {
                   min: 9,
                   max: 9
                 },
                 numeric: {
                   message: "Please enter number"
                 }
               }
             },

             studentFBID: {
               validators: {
                 stringLength: {
                   max: 100,
                   message: "Please enter your Facebook link"
                 },
                 notEmpty: {
                   message: "Please enter FB id link"
                 }
               }
             },

             studentAddress:{
               validators: {
                 notEmpty: {
                   message: "Please enter your address"
                 }
               }
             },

             studentPassword: {
               validators: {
                 notEmpty: {
                   message: "Please enter your password"
                 }
               }
             },

              studentConPassword: {
               validators: {
                 notEmpty:{
                   message: "Please re-enter password"
                 },
                 identical: {
                   field: 'studentPassword',
                   message: "Password does not match"
                 }
               }
             },


              studentPhoto: {
                validators: {
                  notEmpty: {
                    message: "Your photo is required"
                  }
                }
              }

            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#alumniEntry').bootstrapValidator({
            feedbackIcons: {
               valid: 'glyphicon glyphicon-ok',
               invalid: 'glyphicon glyphicon-remove',
               validating: 'glyphicon glyphicon-refresh'
            },
            fields: {

               alumniName: {
                 validators: {
                   stringLength: {
                      min: 5,
                      max: 20,
                      message: "Please enter your name within 5-20 letters"
                   },
                   notEmpty:{
                     message: "Please enter your name"
                   }
                 }
               },

               alumniEmail: {
                validators: {
                  notEmpty:{
                    message: "Please enter email"
                  },
                  emailAddress: {
                    message: "Please enter valid email"
                  }
                }
              },

              alumniCompany: {
               validators: {
                 notEmpty:{
                   message: "Please enter your Company Name"
                 }
               }
             },

             alumniID: {
               validators: {
                 stringLength: {
                   max: 100,
                   message: "Please enter your Facebook link"
                 },
                 notEmpty: {
                   message: "Please enter FB id link"
                 }
               }
             },

             alumniAddress:{
               validators: {
                 notEmpty: {
                   message: "Please enter your address"
                 }
               }
             },

             alumniPassword: {
               validators: {
                 notEmpty: {
                   message: "Please enter your password"
                 }
               }
             },

              alumniCOnPassword: {
               validators: {
                 notEmpty:{
                   message: "Please re-enter password"
                 },
                 identical: {
                   field: 'alumniPassword',
                   message: "Password does not match"
                 }
               }
             },


              alumniPhoto: {
                validators: {
                  notEmpty: {
                    message: "Your photo is required"
                  }
                }
              }

            }
        });
    });
</script>
