<?php
$servername = "sql9.freemysqlhosting.net";
$username = "sql9201152";
$password = "mqsrvdHm7v";
$db_name = "sql9201152";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$sql = "INSERT INTO `apiline`(`process`,`messageid`, `userid`, `image_number`) VALUES ('$text','$messageid','$userid','$image_number')";
if ($conn->query($sql) === TRUE) {
  echo "insert success";
} else {
  echo "error:" . $sql . "<br>" . $conn->error;
}

 ?>
