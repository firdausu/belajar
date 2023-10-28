<?php
date_default_timezone_set('Asia/Jakarta');
define('TOKEN_BOT', '6406839120:AAGTxZ1XkvFcJ13xPD0OmFPjy664_01U9ss');
function uuidv4() {
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
function curl($url, $headers, $mode="get", $data=0)
        {
        if ($mode == "get" || $mode == "Get" || $mode == "GET")
                {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $result = curl_exec($ch);
                }
        elseif ($mode == "post" || $mode == "Post" || $mode == "POST")
                {
                $headers[] = "Content-Length: ".strlen($data);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $result = curl_exec($ch);
                }
        else
                {
                $result = "Not define";
                }
        return $result;
}
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
function decrypt($text,$key,$iv){
return openssl_decrypt(base64_decode($text), 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv);
}
function encrypt($text,$key,$iv){
return base64_encode(openssl_encrypt($text, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv));
}
function random($i){
    $characters = "abcdef0123456789";
    $length = strlen($characters);
    $randomString = "";

    for ($i2 = 0; $i2 < $i; $i2++) {
        $randomString .= $characters[rand(0, $length - 1)];
    }

    return $randomString;
}
function timer($waktu){
for ($x=$waktu;$x>0;$x--){
echo "\r                                             \r";
echo "Please wait ".$x." second ";
sleep(1);
echo "\r                                             \r";
}
}
$secretkey = md5(chr(104) . chr(51) . chr(94) . chr(37) . chr(52) . chr(126) . chr(115) . chr(120) . chr(106) . chr(108) . chr(115) . chr(100) . chr(57) . chr(49), true);
$iv = chr(0) . chr(1) . chr(2) . chr(3) . chr(4) . chr(5) . chr(6) . chr(7) . chr(8) . chr(9) . chr(10) . chr(11) . chr(12) . chr(13) . chr(14) . chr(15);

$uuid = uuidv4();
$phone = "81212571925";
$token = $uuid;
#$token = "5c5b104e-9ea5-4e8f-ae2d-d4ed978bb4db";
#$token = "9d741257-e2b0-4648-a17c-1349368ae2a1";
$token = uuidv4();
$anid = random(16);
echo "Token: $token\n";
$akun = [
[
"a" => "74588452-2a3a-17f4-a512-ed7b9198b96e",
"b" => "696937a9f178bfb3"
],
[
"a" => "662176f2-2db9-537f-82ed-f7d2cbc0047d",
"b" => "227b453fedec8ade"
],
[
"a" => "1f47b4ba-c3b6-acce-42bd-e9aa11d9abda",
"b" => "102b16966e83ef23"
],
[
"a" => "8216dfac-2959-25d2-ee6a-7e12ab33d247",
"b" => "23f5ee3a14078bfe"
],
[
"a" => "65d1d73f-49bf-16d8-b782-5ee49f0823e7",
"b" => "0aa7a3ea8f545e3a"
],
[
"a" => "f2d5368b-e85c-9589-9ebd-cb1db91e70d3",
"b" => "2bd24e1ea9fb5449"
],
[
"a" => "982efc0e-948e-c26b-17d7-6994cfdc6afd",
"b" => "28cf23d4891515f0"
],
[
"a" => "daea513a-e21c-9fe9-a739-031ef30be668",
"b" => "75a1a681c8a7f278"
],
[
"a" => "d515037e-bc7f-d2fe-4a35-4269ba8006ab",
"b" => "a03666257f1b32d9"
],
[
"a" => "bbee46dc-73c9-7e3d-7a61-c1d0e55d74b4",
"b" => "8fe4fbf7b357a555"
],
[
"a" => "3aa595b2-1637-8842-184b-3c1d418ea95f",
"b" => "df2c23d0427e9422"
],

];
$xx = 1;
while(true){

foreach($akun as $in => $aa){
$uuid = uuidv4();
$anid = $aa["b"];
$token = $aa["a"];

$headers = [
'User-Agent: Android Client',
'Content-Type: application/json;charset=utf-8',
'token: '.$token,
'X-Unity-Version: 2021.3.18f1c1'
];
//echo "[$in] Akun => $token\n";
$data = encrypt('{"location":"ID","macAddress":"","uuid":"'.$token.'","advertisingId":"'.$token.'","product":0,"app_version":"1.1.8","user_channel":"knife","distinct_id":"'.$token.'","deviceId":"'.$token.'","imei":"","anid":"'.$anid.'","oaid":"","idfa":"","idfv":"","status_code":0,"wxTime":0,"country":"ID","version":118,"channel":"knife","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$balance = json_decode(curl('https://game.firstwinner.org/api/app/fc/user/start?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec = decrypt($balance,$secretkey,$iv);
$json = json_decode($dec);
//var_dump($json);
if($json->code == 200){
$total = $json->data->total;
if($total == 0){
	}else{
echo "[$xx][$in] Akun => $token | $total"."\n";
}


if($total >= 1000){
$data = encrypt('{"phone":"'.$phone.'","country":"ID","version":118,"channel":"knife","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$paylist = json_decode(curl('https://game.firstwinner.org/api/app/fc/pay/coin/paylist?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec2 = decrypt($paylist,$secretkey,$iv);
$json = json_decode($dec2);
if($json->code == 200){
foreach($json->data as $payliss){
if($total >= $payliss->amount && $payliss->last > 0){
$data = encrypt('{"mail":"bagelgaxxng2003@gmail.com","phone":"'.$phone.'","name":"Asep","amount":'.$payliss->amount.',"country":"ID","currency":"IDR","payment":"DANA","version":118,"channel":"knife","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$person = json_decode(curl('https://game.firstwinner.org/api/app/fc/pay/coin/person?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec3 = decrypt($person,$secretkey,$iv);
$json = json_decode($dec3);
if($json->code == 200){
$chatId = "1397941074";
$message = "===================\nAndroid ID: $anid\nToken: $token\n"."WD: ".$json->data->credit."\n===================\n";
$response = sendTelegramMessage($chatId, $message);
if ($response === false) {
    echo "Pesan tidak terkirim.\n";
} else {
    echo "Pesan berhasil terkirim.\n";
}
echo "[$in] Credit: ".$json->data->credit." | Status: ".$json->data->status." | Text: ".$json->data->text." | Sisa Balance: ".$json->data->total."\n";
}else{
echo "Withdraw: ".$dec3."\n";
}//person
}//kondisi
}//foreach
}else{
echo "Pay List: ".$dec2."\n";
}
}


}else{
echo "Check Balance: ".$dec."\n";
}


$data = encrypt('{"pkgName":"com.knife.game.happy","imei":"","oaid":"","androidId":"'.$token.'","idfa":"","idfv":"","adKey":"'.random(14).'","adprice":0.999999,"adPlatform":66,"sign":"'.$token.round(microtime(true) * 1000).'","status_code":0,"from":1,"country":"ID","adType":'.rand(9,18).',"version":118,"channel":"knife","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3SinyalKuatHemat","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$reward = json_decode(curl('https://game.firstwinner.org/api/app/fc/credit/coin?'.round(microtime(true) * 1000),$headers,'POST',$data));
$decs = decrypt($reward,$secretkey,$iv);
$json = json_decode($decs);
//var_dump($json);
if($json->code == 200){
echo "[$xx][$in] Claim Reward: OK - ".$json->data->credit."\n";
}else{
echo "Claim Reward: ".$decs."\n";
}
//timer(1);



}
$xx++;
if($xx % 100 == 0){
	echo exec("clear");
//	banner();
}
}

