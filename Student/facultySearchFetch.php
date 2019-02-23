<?php

require_once ('../dbConnect.php');
session_start();

$user = $_SESSION['email'];

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "SELECT * FROM faculty WHERE ( (name LIKE  '%".$search."%'))";
}
else
{
 $query = "SELECT * FROM faculty order by id limit 0";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
   <table class="table table-bordered">
    <tr>
       <th>Image<th>
       <th>Name</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result)){
  $output .= '
   <tr>
      <td><img class="img-thumbnail avatar avatar-original" style="-webkit-user-select:none; display:block; margin:auto;" width="70" height="40" '."<img src='../Photos/".$row['facultyPhoto']."'>".'<td>
      <td><a href="facultyDetails.php?id='.$row['id'].'"</a> '.$row["name"]. '</td>
   </tr>
  ';
 }
 echo $output;
}else{
  echo 'No Data Found';
}

?>