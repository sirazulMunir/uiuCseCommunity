<?php
  require_once('../dbConnect.php');

  $id = $_GET['id'];

  $conn->query("DELETE FROM `job` WHERE id = $id ");
  $conn->close();
  header('location: manageJob.php');

?>
