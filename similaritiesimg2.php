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
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.line.me/v2/bot/message/push",
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{
      \"to\": \"$userid\",
      \"messages\": [
        \t      {
              \"type\": \"text\",
              \"text\": \"ระบบกำลังทำการประมวล ผลลัพธ์ที่ได้จะถูกส่งกลับในอีก 2-3 นาทีหลังจากนี้ กรุณารอสักครู่...\"
              }

        ]
   }",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer " . $access_token,
      "content-type: application/json",
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
} else {
  echo "error:" . $sql . "<br>" . $conn->error;
}

 ?>
