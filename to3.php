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
$phone = "89609972692";
$token = $uuid;
#$token = "5c5b104e-9ea5-4e8f-ae2d-d4ed978bb4db";
#$token = "9d741257-e2b0-4648-a17c-1349368ae2a1";
#$token = uuidv4();
#$anid = random(16);
#echo "Token: $token\n";
$akun = [
[
"a" => "5d990367-f9a4-9aa1-1242-7029cbd7766b",
"b" => "410e10ee3bacbfcc",
"uuid" => "48cb3e7b-b37f-5796-99de-109ebe908350"
],
[
"a" => "8a3ba934-c3d5-f4c1-c9dc-7e616b5c4379",
"b" => "41314e5224ea2b02",
"uuid" => "35d3801b-69bf-bedc-1d36-1d668d0a7dce"
],
[
"a" => "5c043613-b3fe-dd83-8917-26e3ddfb597f",
"b" => "da68059bda5f7333",
"uuid" => "1dd88777-518e-0b9f-f8aa-350a29273089"
],
[
"a" => "526ef74f-d502-718c-df3f-abf7b04a23fe",
"b" => "e6c9856c380ee34b",
"uuid" => "47d01aee-ae48-1d80-e8ac-b38fd9c2af4c"
],
[
"a" => "8c83f5b1-3892-bd1f-16ba-16800bf02f84",
"b" => "ba9dcda690b94eb5",
"uuid" => "ee2bdb08-cd92-e2c4-7a45-b574d9e41974"
],
[
"a" => "fbd6de16-3199-ef3c-53d9-f0570e264674",
"b" => "246b171befc8eb25",
"uuid" => "ca918e43-945c-1842-3a22-fd6b51f91e60"
],
[
"a" => "849913c8-5208-4627-02c6-27a1407d7cbe",
"b" => "0d5bbc2f8bff60a6",
"uuid" => "0ca71c61-cc23-1f7c-fcf1-751b5a12dbf6"
],
[
"a" => "4b7c2a49-4761-ee53-3e62-e38409479eb8",
"b" => "7b3debdcbb6f8c74",
"uuid" => "5e064f19-9103-016b-84fe-97519b545088"
],
[
"a" => "10e5831e-6fa8-4864-56bd-a2ba26c9f5a5",
"b" => "863ca2e03b81be34",
"uuid" => "f769d054-cd08-f705-581e-7131ca18a097"
],
[
"a" => "bee916aa-76f0-7ad7-9fcf-293f8f28d210",
"b" => "1aa930d527d591ad",
"uuid" => "bbffba4b-91ef-626a-bbe0-e1376231dc7f"
],
[
"a" => "da4e2213-d122-1c3d-5352-e1404df938f5",
"b" => "ef2117b2c69b9315",
"uuid" => "05f2347d-c8c2-f05a-ae80-a679e9626839"
],
[
"a" => "b5b37b23-c60c-0821-f054-1f958ff7a431",
"b" => "515d0e51f7872ad3",
"uuid" => "f1735466-f7b6-0799-08bd-ea7e6ba591e1"
],
[
"a" => "1b1e757f-cfc1-b5ea-6292-d80f65e72991",
"b" => "27dbc82eb0bf69f4",
"uuid" => "1f5e288d-08a0-e2f3-f077-6744d0ac1373"
],
[
"a" => "7bfa0588-87a8-9130-eab2-4dfa7d5fd4b6",
"b" => "966d9f555bced7af",
"uuid" => "8fce00c7-098e-7d1b-5b9c-8846b5e3e4db"
],
[
"a" => "b2627b8b-3448-d359-f79e-4cc7cd4a14c4",
"b" => "f2cdc1a94328b37b",
"uuid" => "400ed810-6483-cc4a-52aa-f7cad154e0e3"
],
[
"a" => "d627b832-49a7-3af5-0558-bf4dcd69af2f",
"b" => "1e1c39089e822264",
"uuid" => "d3f8b59f-c68f-676a-42c6-2a7ec504ca82"
],
[
"a" => "8d84528f-a0a3-22b3-0c3d-65cbe5be8b3a",
"b" => "fbe28aa00e40c75d",
"uuid" => "e5b9874a-7c83-6793-0c57-b0d17c989d4e"
],
[
"a" => "bc834a6e-b501-edce-a605-75028b51d911",
"b" => "e7abc4ac6e72bb96",
"uuid" => "41ba81a5-eaa4-588b-f0fc-a7178a3b3abd"
],
[
"a" => "b2c506da-e06b-23f6-8aa0-04625e6eea88",
"b" => "7db3979f1138f20b",
"uuid" => "19139074-152c-43ce-fb75-c305fd55e8ed"
],
[
"a" => "fd26d1a4-c157-340c-73cb-5ed269f39f05",
"b" => "b5271a3c9af2fc22",
"uuid" => "74ad9ecf-a7ed-30a2-c572-2f4d608c7743"
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

