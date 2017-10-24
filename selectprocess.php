<?php

$servername = "sql9.freemysqlhosting.net";
$username = "sql9201152";
$password = "mqsrvdHm7v";
$db_name = "sql9201152";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$sql = "SELECT process FROM apiline WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if ($row['process'] == 'ocr') {
  $process = 'ocr';
  require "connectbatabaseimage.php";

} elseif ($row['process'] == 'similarities') {
  $sql = "SELECT image_number FROM apiline WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  if ($row['image_number'] == 2 || $row['image_number'] == 0) {
    $image_number = 1;
    $text = "similarities";
    require "similaritiesimg.php";
  } elseif ($row['image_number'] == 1) {
    $image_number = 2;
    $text = "similarities";
    require "similaritiesimg2.php";
    require "testpushsimilarity.php";
  }
}


 ?>
