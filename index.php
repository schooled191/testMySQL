<?php
$access_token = '3fqNoDxOTgjhRbMSekT8Z98ylLrR3scnw3AqtUCzk2uIIwL6RnE93VZEyyUB+XuldePM+OqbZOxltnCGxgiAOc54/ckuYvKmR5gemIn7UChCoRFG0AOJg14SzdPxhaYJErJbivTQ3JaHKX7zHidyMAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
  foreach ($events['events'] as $event) {
    $userid = $event['source']['userId'];
  		if ($event['type'] == 'message' && ($event['message']['text'] == 'Nectec' || $event['message']['text'] == 'nectec')) {
        require "nectec.php";
      }elseif ($event['type'] == 'message' && ($event['message']['text'] == 'ocr' || $event['message']['text'] == 'Ocr' ||$event['message']['text'] == 'OCR' || $event['message']['text'] == 'similarity' || $event['message']['text'] == 'Similarity' || $event['message']['text'] == 'SIMILARITY')) {
        require "dashbord.php";
      }elseif ($event['type'] == 'postback') {
        require "postback.php";
      }elseif ($event['type'] == 'message' && $event['message']['type'] == 'image') {
        require "imageuser.php";
      }else {
        require "nonnectec.php";
      }
  }
}

echo "OK";
