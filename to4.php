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

#$uuid = uuidv4();
$phone = "89609972692";
#$token = $uuid;
#$token = "5c5b104e-9ea5-4e8f-ae2d-d4ed978bb4db";
#$token = "9d741257-e2b0-4648-a17c-1349368ae2a1";
#$token = uuidv4();
#$anid = random(16);
#echo "Token: $token\n";
$akun = [
[
"a" => "fee1395d-8108-5346-9376-332c944351e9",
"b" => "c9ec2eb7401b7aa2",
"uuid" => "f2fd5785-d13a-275d-62d5-f0e92138967a"
],
[
"a" => "db7a94bd-8e60-71ff-0d3c-3a6700c83e13",
"b" => "ca7cc95051fd0e86",
"uuid" => "d42623d7-413c-5f0b-959c-f71339816fbb"
],
[
"a" => "dcd332e7-c775-a93a-161e-47272a61f847",
"b" => "1383333647312e58",
"uuid" => "82a786c3-bf7a-1c55-0d66-6ecfad0e00c7"
],
[
"a" => "6bbb2b79-5abe-5d14-0642-c314d0bbadbd",
"b" => "cc89a1405ec2fd30",
"uuid" => "d35a78f0-8c74-dc1e-0be6-352e25065294"
],
[
"a" => "445d6019-f3d6-b627-8f7c-0f7bee073c4b",
"b" => "dbac31cb1f08ef4a",
"uuid" => "e3b0d5b7-8426-0451-253f-d0b8af2e5aa7"
],
[
"a" => "77718584-0d69-17a5-1a8a-911fc70470e9",
"b" => "417a378ea0daf0cc",
"uuid" => "ba4c6350-d514-b227-2d35-f8f0a2205099"
],
[
"a" => "559c4fcc-205e-3f2c-77cd-ac1b027198f7",
"b" => "30530c098e920052",
"uuid" => "bac0ab5f-11f3-3cb7-4bd9-73820ed0034b"
],
[
"a" => "7ffba3c8-aace-7561-f377-7432d6c05547",
"b" => "866d340d58b6b4b0",
"uuid" => "b8c11980-890d-6cfd-215f-b2469feadc95"
],
[
"a" => "781d21ff-60ee-bf96-d7a5-aaf49fa43f89",
"b" => "7774fd9ced75f78d",
"uuid" => "7c79362d-436b-16e7-589f-f4cb25abd014"
],
[
"a" => "daf4d1c5-f276-b99e-9b82-439789a6c47b",
"b" => "6b443e570c839fdc",
"uuid" => "04365810-3df0-8dbb-979c-14e7a6fecc85"
],
[
"a" => "0a1285dc-be5f-3121-a7a5-e612634cc101",
"b" => "abd4b2f9990176de",
"uuid" => "f84cf7cc-3578-0bdc-d9cf-e359c6cd966e"
],
[
"a" => "cc9f12fa-e7fd-1e6e-b2ac-d051c41dc6a3",
"b" => "df8b759c70f31b64",
"uuid" => "4d910f67-f6fd-09f1-0425-6a7250d2bb7d"
],
[
"a" => "10ed166a-9239-6137-3de6-66fb3a36b2f1",
"b" => "e732deba816c1995",
"uuid" => "77a2cbd3-c39b-fe98-373c-df56ff494ad2"
],
[
"a" => "2a61cf8e-1ed1-10aa-e9b0-0fa226a0d559",
"b" => "0640940ddf0e2b07",
"uuid" => "54d32775-cacb-8043-2bd9-75cf5bd16f62"
],
[
"a" => "ffdebd02-7412-c1ff-8a23-9b7aca622be9",
"b" => "4e18d28904583bcf",
"uuid" => "ded420f5-14a1-1eb8-f4f1-b3e5432afbec"
],
[
"a" => "4bcaa9a3-01f4-a5c2-9076-0ee7ba541b32",
"b" => "7c505d89f8da271e",
"uuid" => "0e5221a1-57fe-43c4-876d-c40a2ce418a4"
],
[
"a" => "1daa5bdb-b733-f5dc-667f-25df9e1c0390",
"b" => "2695b979fc7ee960",
"uuid" => "b7ea5c50-6d19-099d-79ab-c6da0dce96a4"
],
[
"a" => "bb89d0ca-0747-d861-d449-604a3c982955",
"b" => "23acb0a90adfc74d",
"uuid" => "1c50f14b-fc75-0139-d056-1959a28c6264"
],
[
"a" => "b5a57265-75b2-2a0b-8fec-6d7576856288",
"b" => "44a5293a83225bb2",
"uuid" => "219ffe3f-965a-eb27-1894-f286bc64539f"
],
[
"a" => "be8d9f94-7d00-1d20-db44-d0594d6d60ba",
"b" => "eb4b51bc8ac31997",
"uuid" => "20e89b87-3452-0eab-1bdd-09062fe89cee"
],

];
$xx = 1;
while(true){

foreach($akun as $in => $aa){
$uuid = $aa["uuid"];
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


$data = encrypt('{"pkgName":"com.knife.game.happy","imei":"","oaid":"","androidId":"'.$token.'","idfa":"","idfv":"","adKey":"'.random(14).'","adprice":0.999999,"adPlatform":66,"sign":"'.$token.round(microtime(true) * 1000).'","status_code":0,"from":1,"country":"ID","adType":4,"version":118,"channel":"knife","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3SinyalKuatHemat","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
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

