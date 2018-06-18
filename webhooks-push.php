<?php // callback.php

//require "vendor/autoload.php";
//require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

//$access_token = 'BBObhSYVl0ErLvWtQ/kgUd4o0izSoQxNdR57tIH3Bf5+Z2vaacs9XrURcvi55LU/VmiUOeQjYV8U0Nstd58N/ZFq7l2V1eS24qWEIXpSH/DK4KjhbHDn4dcVxigYkFp6FMH/R9slw7r0cVdY+39QdQdB04t89/1O/w1cDnyilFU=';


//copy ข้อความ Channel access token ตอนที่ตั้งค่า
$accessToken = "BBObhSYVl0ErLvWtQ/kgUd4o0izSoQxNdR57tIH3Bf5+Z2vaacs9XrURcvi55LU/VmiUOeQjYV8U0Nstd58N/ZFq7l2V1eS24qWEIXpSH/DK4KjhbHDn4dcVxigYkFp6FMH/R9slw7r0cVdY+39QdQdB04t89/1O/w1cDnyilFU=";
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];
   #ตัวอย่าง Message Type "Text + Sticker"
   if($message == "vbot"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "มาแล้วจ้าาาา";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34";
      pushMsg($arrayHeader,$arrayPostData);
   }elseif($message == "สวัสดี"){
	$arrayPostData['to'] = $id;
      	$arrayPostData['messages'][0]['type'] = "text";
      	$arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
	pushMsg($arrayHeader,$arrayPostData);
   }else{
	$arrayPostData['to'] = $id;
      	$arrayPostData['messages'][0]['type'] = "text";
      	$arrayPostData['messages'][0]['text'] = "vBot ยังไม่เข้าใจคำถาม";
      	$arrayPostData['messages'][1]['type'] = "text";
      	$arrayPostData['messages'][1]['text'] = "แต่ vBot สัญญาว่าจะพยายามเรียนรู้ให้มากขึ้น";
	pushMsg($arrayHeader,$arrayPostData);
   }
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;

   echo "OK na";
   
   ?>


