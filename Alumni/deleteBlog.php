<?php
  require_once('../dbConnect.php');

  $id = $_GET['id'];

  $conn->query("DELETE FROM `blog` WHERE (id = '$id') ");

  header('location: alumnitimeline.php');
  $conn->close();
?>
