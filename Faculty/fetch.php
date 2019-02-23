<?php
    require_once ('../dbConnect.php');
    if(isset($_POST["id"])){
         $result = $conn->query("SELECT * FROM blog WHERE id = '".$_POST["id"]."'");
         $row = mysqli_fetch_array($result);
         echo json_encode($row);
    }
    $conn->close();
?>
