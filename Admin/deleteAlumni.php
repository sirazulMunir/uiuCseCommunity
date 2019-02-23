<?php
  require_once('../dbConnect.php');

  $id = $_GET['id'];

  $conn->query("DELETE FROM `alumni` WHERE id = $id ");
  $conn->close();
  header('location: tables.php');

?>
