<?php
sleep(10);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.line.me/v2/bot/message/push",
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{
    \"to\": \"$userid\",
    \"messages\": [
      \t      {
            \"type\": \"text\",
            \"text\": \"ocr complete\"
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
