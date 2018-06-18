<?php



require "vendor/autoload.php";

$access_token = 'BBObhSYVl0ErLvWtQ/kgUd4o0izSoQxNdR57tIH3Bf5+Z2vaacs9XrURcvi55LU/VmiUOeQjYV8U0Nstd58N/ZFq7l2V1eS24qWEIXpSH/DK4KjhbHDn4dcVxigYkFp6FMH/R9slw7r0cVdY+39QdQdB04t89/1O/w1cDnyilFU=';

$channelSecret = '5ad75e974319b9147f0645e2cf9e3b46';

$pushID = 'U6dcf775fb805715c900445d4f55ebb7e';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







