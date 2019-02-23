<?php
  require_once('../dbConnect.php');

  $id = $_GET['id'];

  $conn->query("DELETE FROM `news` WHERE id = $id ");
  $conn->close();
  header('location: addNews.php');

?>
