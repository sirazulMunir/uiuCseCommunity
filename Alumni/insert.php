<?php
    require_once ('../dbConnect.php');
    if(!empty($_POST)){
         $output = '';
         $message = '';
         $bTitle = mysqli_real_escape_string($conn, $_POST["title"]);
         $bDescription = mysqli_real_escape_string($conn, $_POST["description"]);
         $bAuthor = mysqli_real_escape_string($conn, $_POST["author"]);
         if($_POST["id"] != '') {
              $query = "
              UPDATE blog
              SET title='$bTitle',
              description='$bDescription'
              WHERE id='".$_POST["id"]."'";
              $message = 'Blog Updated';
         }

         if(mysqli_query($conn, $query)) {
               $output .= '<label class="text-success">' . $message . '</label>';
               $select_query = "SELECT * FROM blog WHERE (author ='$bAuthor') ORDER BY id DESC";
               $result = mysqli_query($conn, $select_query);
               $output .= '
                    <table class="table table-bordered">
                        <tr>
                            <th width="60%">Blog Title</th>
                            <th width="30%">Date</th>
                            <th width="10%" colspan="2">Action</th>
                        </tr>
               ';
               while($row = mysqli_fetch_array($result))  {
                    $output .= '
                         <tr>
                              <td>' . $row["title"] . '</td>
                              <td>' . $row["time"] . '</td>
                              <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-warning btn-xs edit_data" /></td>
                              <td><a href="deleteBlog.php?id='.$row["id"].'" class="btn btn-danger">Delete</a></td>
                         </tr>
                    ';
               }
               $output .= '</table>';
          }

         echo $output;
    }
    $conn->close();
?>
