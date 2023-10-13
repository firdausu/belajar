<?php
// k778#5555jltm99 blm tau kegunaannya katanya sih aeskey
// https://popfun.firstwinner.org/ad/network/kwai/cp sama juga blm tau kegunaannya
date_default_timezone_set('Asia/Jakarta');
define('TOKEN_BOT', '6406839120:AAGTxZ1XkvFcJ13xPD0OmFPjy664_01U9ss');
function banner(){
  echo "
 ▄▄▄██▀▀▀▒█████    ██████   ██████  ██ ▄█▀ ██▓
   ▒██  ▒██▒  ██▒▒██    ▒ ▒██    ▒  ██▄█▒ ▓██▒
   ░██  ▒██░  ██▒░ ▓██▄   ░ ▓██▄   ▓███▄░ ▒██▒
▓██▄██▓ ▒██   ██░  ▒   ██▒  ▒   ██▒▓██ █▄ ░██░
 ▓███▒  ░ ████▓▒░▒██████▒▒▒██████▒▒▒██▒ █▄░██░
 ▒▓▒▒░  ░ ▒░▒░▒░ ▒ ▒▓▒ ▒ ░▒ ▒▓▒ ▒ ░▒ ▒▒ ▓▒░▓  
 ▒ ░▒░    ░ ▒ ▒░ ░ ░▒  ░ ░░ ░▒  ░ ░░ ░▒ ▒░ ▒ ░
 ░ ░ ░  ░ ░ ░ ▒  ░  ░  ░  ░  ░  ░  ░ ░░ ░  ▒ ░
 ░   ░      ░ ░        ░        ░  ░  ░    ░  
                                              
".PHP_EOL;
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
function decrypt($text,$key,$iv){
return openssl_decrypt(base64_decode($text), 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv);
}
function encrypt($text,$key,$iv){
return base64_encode(openssl_encrypt($text, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv));
}
function random($i){
    $characters = "abcdefghijklmnopqrstuvwxyz0123456789";
    $length = strlen($characters);
    $randomString = "";

    for ($i2 = 0; $i2 < $i; $i2++) {
        $randomString .= $characters[rand(0, $length - 1)];
    }

    return $randomString;
}
function randoma($piro){
$txt = substr(str_shuffle("0123456789"),-$piro);
return $txt;
}
function randomb($piro){
$txt = substr(str_shuffle("abcdef0123456789"),-$piro);
return $txt;
}

function uuid() {
    // Generate a random UUID
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Format the UUID
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
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

/*
$dd = readline("Ok: ");
echo decrypt($dd,$secretkey,$iv)."\n";
sleep(299);
*/
$ud = uuid();
$phone = "89609972692";
$token = uuid();





$akun = [
[
"a" => "c09fb984-40bd-6df3-1d0d-1d832a25a02f",
"b" => "40f74e43442f3f17",
"uuid" => "e2f34cb7-620b-b56a-1b23-88e91785e06e"
],
[
"a" => "7dfa0556-fa63-ae2a-1e3d-6cba81893ca2",
"b" => "46cf750244e17bfb",
"uuid" => "9eda107b-e68d-c081-efb0-20a81fd24ab5"
],
[
"a" => "85b37d25-08b4-bae9-273a-6e39d91cd693",
"b" => "1e8341fd4ff0101d",
"uuid" => "ab0638fb-0eab-4641-4f42-ad5ff7bedbee"
],
[
"a" => "58d3a596-0180-bede-617d-22d31f92acd3",
"b" => "634adf3a892e35e0",
"uuid" => "82118d94-4b7c-5f42-1ab4-0ea7de4d8350"
],
[
"a" => "38290fe9-bb8a-2737-b8c3-42cd8b84f500",
"b" => "adcb4bf023262f7a",
"uuid" => "567f65d5-94b8-c10c-35e2-eab759c67653"
],
[
"a" => "678149f3-86e1-9db5-e857-ff3e6bd268ad",
"b" => "88707d068b8ee5a0",
"uuid" => "70615565-2776-6f3f-39eb-20d5c8438ab1"
],
[
"a" => "8fbece8d-58d8-ffe5-7b56-f6c63038ee4b",
"b" => "c4273b2c373dab80",
"uuid" => "55e27193-3e75-6ffa-bd64-f18a0483c046"
],
[
"a" => "892c109a-826b-b8fc-a800-2c413445d1eb",
"b" => "e42098c870dbddbc",
"uuid" => "5d9231ce-5914-ec21-7cd8-43836e93605f"
],
[
"a" => "279a10ce-2a67-7bfd-a282-b1a55bd344aa",
"b" => "a568bbdbca2cf336",
"uuid" => "9f732220-578f-de6d-aff7-9b96fb151db2"
],
[
"a" => "1f347829-1638-ba1a-92f8-e19bc95850f0",
"b" => "2c41008aecf87942",
"uuid" => "b77e586b-3473-ce5f-a6d1-29cdb9d3ff4f"
],
[
"a" => "80466cca-b985-67fa-b54f-2512f45f1199",
"b" => "0f70dcba37c403c2",
"uuid" => "34b2fee1-ecf3-dfbe-70a8-7c0ff871c2df"
],
[
"a" => "ff1e4871-6537-6a68-918b-aad6ebfeb5b5",
"b" => "a56ccb9c3f86c24d",
"uuid" => "9688e5c3-ba74-0650-31ec-80040582529e"
],
[
"a" => "e67b99eb-6e79-2a56-16a9-00d060686a05",
"b" => "9d0aee60fe5175fc",
"uuid" => "933291bf-baf0-dbce-c526-db4d10aee2a3"
],
[
"a" => "c234e1a9-8f89-4b9e-9d3a-2d64d7143cf0",
"b" => "e7890aecce0efffa",
"uuid" => "31debd6c-5edf-50bc-62a4-736603d721f2"
],
[
"a" => "265b8daf-e20a-cfbd-9a9c-70e948e27d85",
"b" => "e9d94e62fee8d9b1",
"uuid" => "7af140e4-81a3-c3a9-0aa4-04604c79c905"
],
[
"a" => "c3f7f1f4-ce00-bb51-c0a7-8a2fb75e3867",
"b" => "81efea53558cc95e",
"uuid" => "332fdccb-fc1f-1230-4d47-8474a8b58589"
],
[
"a" => "a428c3b4-f62f-0302-2530-96364619f1ca",
"b" => "23f8e32c4a3bc2cb",
"uuid" => "49d3203b-5e7a-d653-77d2-0127c5de25dc"
],
[
"a" => "b5a047f0-e314-c523-ad80-0a01e963bae0",
"b" => "8882ccf69ed87197",
"uuid" => "6409a337-945e-66f6-886a-b8cc5c73a9e9"
],
[
"a" => "87108b78-94a8-ad64-46b4-1d9e858d8729",
"b" => "d9055e5759f0fd4a",
"uuid" => "beead0be-bc65-da51-d57b-7399125d0442"
],
[
"a" => "2cd69acc-aede-d006-b166-61636b722182",
"b" => "b6f16e805fb848c7",
"uuid" => "e70fc5b1-38a3-c3e6-a709-403973439aae"
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
echo "[$in] Akun => $token\n";
$sign = randomb(16).randomb(16)."_293".randoma(4)."_".round(microtime(true) * 1000);
$data = encrypt('{"location":"CN","macAddress":"","uuid":"'.$ud.'","advertisingId":"'.$token.'","product":0,"app_version":"1.1.1","user_channel":"default","distinct_id":"'.$token.'","deviceId":"'.$anid.'","imei":"","anid":"'.$anid.'","oaid":"","idfa":"","idfv":"","status_code":96888,"wxTime":0,"country":"ID","version":111,"channel":"popfun","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3SinyalKuatHemat","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$balance = json_decode(curl('https://popfun.firstwinner.org/api/app/fc/user/start?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec = decrypt($balance,$secretkey,$iv);
$json = json_decode($dec);
if($json->code == 200){
$total = $json->data->total;
if($total > 0){
echo "Balance: ".$total."\n";
}
if($total >= 1000){
$data = encrypt('{"phone":"'.$phone.'","country":"ID","version":111,"channel":"popfun","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$paylist = json_decode(curl('https://popfun.firstwinner.org/api/app/fc/pay/coin/paylist?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec2 = decrypt($paylist,$secretkey,$iv);
$json = json_decode($dec2);
if($json->code == 200){
foreach($json->data as $payliss){
if($total >= $payliss->amount && $payliss->last > 0){
$data = encrypt('{"mail":"bag'.randomb(10).'@gmail.com","phone":"'.$phone.'","name":"Asep","amount":'.$payliss->amount.',"country":"ID","currency":"IDR","payment":"DANA","version":111,"channel":"popfun","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$person = json_decode(curl('https://popfun.firstwinner.org/api/app/fc/pay/coin/person?'.round(microtime(true) * 1000),$headers,'POST',$data));
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
echo "Credit: ".$json->data->credit." | Status: ".$json->data->status." | Text: ".$json->data->text." | Sisa Balance: ".$json->data->total."\n";
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
$data = encrypt('{"appId":"8010","country":"ID","ifa":"d9f16212-c385-4fa2-9cd6-10ca1ad1abe1","os":"Android","pkgName":"com.animalspop.ap.gp","reward":20000,"tagId":"801010001","userId":"'.$token.'","version":111}',$secretkey,$iv);
$sig = json_decode(curl('https://popfun.firstwinner.org/ad/network/kwai/v1',$headers,'POST',$data));
//$sign = $sig->id;
$data = encrypt('{"adPlatform":50,"adKey":"'.random(7).'","sign":"'.$sign.'","status_code":72168,"from":10002,"adType":0,"adprice":0.044,"mediation":0,"pkgName":"com.animalspop.ap.gp","imei":"","oaid":"","androidId":"'.$anid.'","idfa":"","idfv":"","version":111,"channel":"popfun","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$reward = json_decode(curl('https://popfun.firstwinner.org/api/app/fc/credit/coin?'.round(microtime(true) * 1000),$headers,'POST',$data));
$decs = decrypt($reward,$secretkey,$iv);
$json = json_decode($decs);
//var_dump($json);
//&& $json->data->save == 0
if($json->code == 200){
echo "Claim Reward: OK - ".$json->data->credit."\n";
}else{
//echo "Claim Reward: ".$decs."\n";
}
//timer(2);
}
$xx++;
if($xx % 100 == 0){
	echo exec("clear");
//	banner();
}
}
