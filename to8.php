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
"a" => "339c757f-1b30-8758-689d-21752ad6853e",
"b" => "89edc0c9c514167a",
"uuid" => "889c462b-3b7f-0fde-ac4d-4e38decfd8fb"
],
[
"a" => "3f4fd92f-c36b-23f6-6d86-a364f3d076bc",
"b" => "4babfe8c36c7cf34",
"uuid" => "9bb95c74-59d4-1f38-46aa-b4c24d74902c"
],
[
"a" => "7be6e4a0-abde-d301-db94-6727067f1205",
"b" => "bedd028aee6d55af",
"uuid" => "4e06e0b1-e272-a834-b9ab-ba5b47baad7c"
],
[
"a" => "1c603bd4-3949-c730-f7dc-1b31ad3563b3",
"b" => "37c29cea145e8eb8",
"uuid" => "c26597ef-6519-5878-645d-719b84b7d2cb"
],
[
"a" => "6d29b061-502e-69c7-b2f1-294c17ad74fe",
"b" => "d4ac272d45e8a929",
"uuid" => "829f03eb-1271-0a7e-5cc1-2a97723a2588"
],
[
"a" => "261565c6-e51d-cff5-adf8-94744a74b21b",
"b" => "4726e8f62d12ddd6",
"uuid" => "ee6e76cd-2eef-1d11-43a2-cce2c2aee2b3"
],
[
"a" => "f789d2ea-798e-2cd5-ac57-a7105b7b66a6",
"b" => "93a2bd0833b66390",
"uuid" => "f247cd8e-2f52-1086-2c98-6464ca2636dd"
],
[
"a" => "495304f8-dff9-bfdc-7e6c-9d811415f27d",
"b" => "196e9beb9274f33d",
"uuid" => "26f3ce17-fc18-17a0-99d1-4a2bd5e2b9e3"
],
[
"a" => "4c9ac376-e84b-152f-ff72-db636deb1332",
"b" => "22ad5e74255eab58",
"uuid" => "04afb5dc-739c-9698-bd5d-7b6223ef3e6d"
],
[
"a" => "d0675daf-1d73-1bb6-0db6-66c1e57f7fbe",
"b" => "5a071c2ed0b0bbe8",
"uuid" => "4a4265f7-841d-268c-f70d-394316c8355f"
],
[
"a" => "b9f8dad8-284e-b236-7f74-30c2f7f1becc",
"b" => "aee770bc459d7ce5",
"uuid" => "57c6b579-3d45-291c-d5bb-fcecc80336d9"
],
[
"a" => "3f53e1b6-e0cd-d0af-b8b9-0e9ccbee7391",
"b" => "953e59e5347ae290",
"uuid" => "85534c7e-31c2-d369-8d96-ad800c15982d"
],
[
"a" => "a5b579b9-07da-04d6-3d99-10ae5ff762f3",
"b" => "479a1d39b2cd1f93",
"uuid" => "2b67a614-0922-a365-cb14-e6523bbddee4"
],
[
"a" => "d82be7fa-7a87-1b6c-11a5-cb9c4224ed1a",
"b" => "718c7e49eb0a946b",
"uuid" => "5bbfd421-73c7-de64-2856-cdbed0c5f4d7"
],
[
"a" => "2d5d81ec-895b-6cf2-f4ac-abe1eefacfb4",
"b" => "42c2f773bfe8182c",
"uuid" => "bb9523b6-adac-888a-6a3a-c0c3d474ff25"
],
[
"a" => "cda07e61-8ba8-7c2f-f8e5-ec33477978be",
"b" => "dee7c9f767f449c7",
"uuid" => "98fd83b3-82d3-a7b3-c154-b0cff4b3a4f0"
],
[
"a" => "33aff34c-a00c-0c3a-237c-f254e4ea0dee",
"b" => "a8360e9c304d8f26",
"uuid" => "9e497fe8-b94f-cab7-6aab-077a790a63e2"
],
[
"a" => "a5402185-9d0c-1d27-b709-8195524edfd8",
"b" => "a36c148a80ca6f12",
"uuid" => "085b84dd-736a-e9f5-a3e5-c17af9ea7d61"
],
[
"a" => "b58f0cf1-bd75-94f2-d163-d41636092234",
"b" => "28a2ce163e039399",
"uuid" => "e13261bd-6dc0-2914-b5b9-08cdad4377b8"
],
[
"a" => "d2d505cd-0c7a-87cb-3961-e9bff60bda9e",
"b" => "9d5dc6bbc1a33f3d",
"uuid" => "dc4c9e18-b819-c3ed-a63e-99c8d8885d43"
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

