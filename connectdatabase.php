<?php
$servername = "sql9.freemysqlhosting.net";
$username = "sql9201302";
$password = "neudZwccMt";
$db_name = "sql9201302";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$sql = "INSERT INTO `apiline`(`process`, `userid`) VALUES ('$text','$userid')";
if ($conn->query($sql) === TRUE) {
  echo "insert success";
} else {
  echo "error:" . $sql . "<br>" . $conn->error;
}

 ?>
