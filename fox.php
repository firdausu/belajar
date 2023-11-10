<?php

$chatID = '1397941074';
$message = 'Your message here';
$botToken = '6543125923:AAF8cXOfD5-ggrMLfHBHvSxclrDQOocwq60';
while(true){
$gg = file_get_contents("https://wallet.foxnb.net/api/v1/credit/reward/getRewardItemList?did=0xFEF6B223970dFCe56385232Bc18398415e9FA310&language=en");
$ff = json_decode($gg);
$dd = $ff->data->rewardItemList;
foreach($dd as $wu){
if($wu->stockCount === 0){

}else{
$msg = $wu->name." ".$wu->creditPrice."\n";
sendMessage($chatID, $msg, $botToken);
}
}
sleep(4);
}

function sendMessage($chatID, $message, $botToken) {
    $url = "https://api.telegram.org/bot$botToken/sendMessage";
    
    $postData = array(
        'chat_id' => $chatID,
        'text' => $message,
    );
    
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type:application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($postData),
        ),
    );
    
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    
    return $result;
}
