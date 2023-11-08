<?php
// k778#5555jltm99 blm tau kegunaannya katanya sih aeskey
// https://merge.firstwinner.org/ad/network/kwai/cp sama juga blm tau kegunaannya
date_default_timezone_set('Asia/Jakarta');
define('TOKEN_BOT', '6406839120:AAGTxZ1XkvFcJ13xPD0OmFPjy664_01U9ss');
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
$phone = "81212571925";
$akun = [
[
"a" => "69d37b3c-907c-87a6-0e90-9afedd56e625",
"b" => "5b2a58d9b7d84858",
"uuid" => "56dea0e3-1917-7074-0069-6de0cfc28155"
],
[
"a" => "e947c3b3-fcb1-b1c6-1a57-4c6597396fcb",
"b" => "4f4913383b922e21",
"uuid" => "d5e736f8-0ff3-b2f1-c5c5-c818827ceeee"
],
[
"a" => "65f1bff1-9f87-0606-d7f0-f58e91512058",
"b" => "b1c4d94d2e29ca87",
"uuid" => "0690f3e8-49d1-94fe-8329-4f2bf494f546"
],
[
"a" => "2c30b963-ca21-8179-1f14-f7268b940034",
"b" => "2cc3518fd1d800b0",
"uuid" => "01ae1411-8868-aa19-ce27-083ba3f57930"
],
[
"a" => "2e219736-99ff-9e6a-2905-8dc45c2435ba",
"b" => "43122ea8ea3d1174",
"uuid" => "40a8f367-0981-5b35-60f7-e56d15cbc1fe"
],
[
"a" => "e4e816d0-ef31-6c4f-c602-3aa4013fd0ca",
"b" => "c75d1172b3c9b79e",
"uuid" => "acecfff4-6f74-2c8c-249a-0016641ba6fb"
],
[
"a" => "e9e064c7-1dcf-5085-7b2f-43f52d1031de",
"b" => "07370c164dbe2bcf",
"uuid" => "a583cd6a-f1e5-5fb9-126d-f34310c9b2c6"
],
[
"a" => "6c8f7523-8126-2e5e-8593-35f7825cb142",
"b" => "66db0b7372ddd1b5",
"uuid" => "f890fc88-29ae-e23f-51ea-836efa1e4dab"
],
[
"a" => "21711513-7c27-5d44-30a8-ce3cdd16fdb2",
"b" => "e533f8f10ff7525f",
"uuid" => "2cf36a67-816b-bfac-cd8c-b6976cef8f28"
],
[
"a" => "fc4d23a6-3eb8-d2d7-6d33-5782b24d9284",
"b" => "20fd4356e2c9b5ab",
"uuid" => "012442c9-11f3-9892-feaa-6e84687451a8"
],
[
"a" => "5be92fcf-77ef-7bc7-a63d-62dbe59b99c4",
"b" => "f0984b0923da1d69",
"uuid" => "e1a80f65-3001-7f04-853d-95d356b0a0fa"
],
[
"a" => "b7de0506-d8f6-c2bb-13e8-ec9c334d2d06",
"b" => "fd5cedda41d0df37",
"uuid" => "a388a08f-32fe-e7de-a4ef-c795b6c8af62"
],
[
"a" => "15d8fed5-3143-3429-b0ad-329c0d364743",
"b" => "515f0005cd7d97f4",
"uuid" => "6c16ac02-6452-6be9-93d0-f5869d080ae5"
],
[
"a" => "aa4253f1-c9be-5dc0-1197-f86a3580b409",
"b" => "cc148e554092679b",
"uuid" => "c3efea80-cff1-123e-f61b-c543f7baa6c3"
],
[
"a" => "8cbad6ee-ebdb-6d9e-2986-8d19725d7c68",
"b" => "386232d41c4b38fe",
"uuid" => "4200aeed-9ecb-1cf7-d261-8aa7da9ed111"
],
[
"a" => "026a10a2-bab2-9101-c58d-fd9c63306e9d",
"b" => "595fc88cdb2ed847",
"uuid" => "77dcbdce-f6c6-e40b-21af-55faeb5705fe"
],
[
"a" => "c91ae400-17db-c4c6-d494-9366f3263fcb",
"b" => "9faf9e4c5a7d64cc",
"uuid" => "571190e0-8203-c3fa-f8bc-b286d5547d14"
],
[
"a" => "b8d4b5a5-8c89-9304-789e-c6d8095d0ee5",
"b" => "bd25cacc81b2449f",
"uuid" => "a9329f26-4ff5-e528-2275-212fbeafc0d2"
],
[
"a" => "03e011ec-77b7-6b6e-d161-d502fd37593e",
"b" => "397cd314a64e62cb",
"uuid" => "83fdc6fe-42f7-6d7f-a1bf-e6d24acec311"
],
[
"a" => "25697d50-5de7-ae6c-90c7-ba984dc20a1a",
"b" => "e45b3c97f36f0252",
"uuid" => "416213c5-8dcd-00d9-f944-88148769b9a1"
],
[
"a" => "f10f559d-ecbc-3989-fc03-700a3e521d9e",
"b" => "1d96d272d1e4d9ea",
"uuid" => "53aa0536-4af1-9fb5-b959-bdc7c01792bb"
],
[
"a" => "7f6806b8-a7c6-360a-7382-7567e869d8f5",
"b" => "589bb2f86e44b8b4",
"uuid" => "3d53b8f3-ef10-b1a7-22a7-65255e505902"
],
[
"a" => "fa65c30e-7622-115a-c15c-3f9e655ba6a8",
"b" => "0e7a4f89d0abe329",
"uuid" => "3aed2fb9-e195-7a33-86dd-a64e091b24e7"
],
[
"a" => "161775f0-e57a-9f3a-dd76-d2a5f1f2014e",
"b" => "ca0dbbf3d5b279c4",
"uuid" => "9bdbcd84-b5fc-0ac9-5f57-d791032369bc"
],
[
"a" => "07f99873-478a-9ed6-7605-854447e05a8a",
"b" => "84c009d3363352be",
"uuid" => "a6c02c01-12ef-2a3e-1405-8d43d4e083c6"
],
[
"a" => "5012592b-08f9-c5b7-3e1c-2cfc2b4c33b8",
"b" => "a3a2e0be746c339b",
"uuid" => "e7a400cf-051c-fa22-af01-24495a9fe170"
],
[
"a" => "d89746f6-7a23-b55b-12f8-84d89a895198",
"b" => "0011e6358c0d6eb5",
"uuid" => "b04a5692-b8bc-209f-2ffa-84ba6d2154aa"
],
[
"a" => "7afd832e-5eca-d3da-34f3-5ef013f6e562",
"b" => "eeb378489b27fb76",
"uuid" => "3e0f499b-4f9f-8a6e-50ed-3583349f5593"
],
[
"a" => "28bdc1fd-b48c-4e27-5c17-bf552f651d52",
"b" => "c3387570548042c1",
"uuid" => "c93267f5-8a7f-6a04-f4b5-f06d17dc14bd"
],
[
"a" => "45ca3c3a-edd6-37d7-b9b1-f9c6225a8e21",
"b" => "0b32e7977f4eeccc",
"uuid" => "6ec8e56e-1dcd-9a0b-e590-60fa810f06c5"
],
[
"a" => "24e53190-ab01-30b0-7f74-5f33f0d6c0ea",
"b" => "bd278425a28a7429",
"uuid" => "5d80bfe9-ee78-3e98-dbb5-13506c81a016"
],
[
"a" => "e3cebfd2-3cf3-81f0-c0c6-40d6b1b8513c",
"b" => "8d28b29afe987655",
"uuid" => "2507f617-c338-6185-8032-60d039271709"
],
[
"a" => "922860fc-106c-a453-8f7a-8e386943cd5d",
"b" => "940c5b271c9c54de",
"uuid" => "ca748ab1-ad76-99f9-524d-b9109e72dbd6"
],
[
"a" => "88712bfb-0ad5-68ee-16ff-7e7bafad5adc",
"b" => "bfd6d94cf0c98bea",
"uuid" => "bb2802d2-4daf-92d0-f7b7-40901abc5072"
],
[
"a" => "b6a44bf9-74c4-532f-864d-95e748e518e5",
"b" => "dfcf3d2256ea7c6f",
"uuid" => "24a9723e-a150-28e2-7a84-807d9531cfd3"
],
[
"a" => "7459554f-3bf4-4aca-97bd-e77e80c52d58",
"b" => "3a5031c957fd005d",
"uuid" => "a8e9dc68-56e3-b489-c715-b5edbded94d5"
],
[
"a" => "706c39f0-e22d-d662-6d9d-70fa566bfeb0",
"b" => "2155eaa5b56b0c67",
"uuid" => "f7e20bbc-78fa-7594-6be2-1e842739438c"
],
[
"a" => "4308a46c-aef1-c3e4-86aa-230229d95bc4",
"b" => "f698aa9b891d4d16",
"uuid" => "18dda397-b808-e4f9-34d5-3a1628ae0eb9"
],
[
"a" => "5df77d64-72ce-89e6-44c0-17ef21a26edc",
"b" => "ab3cd366a51042b0",
"uuid" => "dc985ea1-647f-30e7-2f1b-df9a25fbf394"
],
[
"a" => "5d69e3bf-a207-6a4b-b8ec-a707f833ee89",
"b" => "3712893c351c0fb8",
"uuid" => "edbc2060-c44a-d9b5-d250-ac69c41b0dcf"
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


$sign = $token.round(microtime(true) * 1000);
$data = encrypt('{"location":"CN","macAddress":"","uuid":"'.$ud.'","advertisingId":"'.$token.'","product":0,"app_version":"1.1.0","user_channel":"default","distinct_id":"'.$token.'","deviceId":"'.$anid.'","imei":"","anid":"'.$anid.'","oaid":"","idfa":"","idfv":"","status_code":0,"wxTime":0,"country":"ID","version":110,"channel":"fruit","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3SinyalKuatHemat","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$balance = json_decode(curl('https://merge.firstwinner.org/api/app/fc/user/start?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec = decrypt($balance,$secretkey,$iv);
$json = json_decode($dec);
if($json->code == 200){
$total = $json->data->total;
if($total == 0){
	}else{
echo "[$xx][$in] Akun => $token | $total"."\n";
}

if($total >= 1000){
$data = encrypt('{"phone":"'.$phone.'","country":"ID","version":110,"channel":"fruit","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$paylist = json_decode(curl('https://merge.firstwinner.org/api/app/fc/pay/coin/paylist?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec2 = decrypt($paylist,$secretkey,$iv);
$json = json_decode($dec2);
if($json->code == 200){
foreach($json->data as $payliss){
if($total >= $payliss->amount && $payliss->last > 0){
$data = encrypt('{"mail":"ba'.rand(11111,99999).'@gmail.com","phone":"'.$phone.'","name":"Asep","amount":'.$payliss->amount.',"country":"ID","currency":"IDR","payment":"DANA","version":110,"channel":"fruit","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$person = json_decode(curl('https://merge.firstwinner.org/api/app/fc/pay/coin/person?'.round(microtime(true) * 1000),$headers,'POST',$data));
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
//echo "$sign\n";
$data = encrypt('{"pkgName":"com.great.merge.lkfruit.gp","imei":"","oaid":"","androidId":"'.$token.'","idfa":"","idfv":"","adKey":"'.random(7).'","adprice":0.01,"adPlatform":2,"sign":"'.$sign.'","status_code":1,"from":1,"country":"ID","adType":0,"mediation":0,"version":110,"channel":"fruit","sdkName":"11","sdkVersion":30,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$reward = json_decode(curl('https://merge.firstwinner.org/api/app/fc/credit/coin?'.round(microtime(true) * 1000),$headers,'POST',$data));
$decs = decrypt($reward,$secretkey,$iv);
$json = json_decode($decs);
//var_dump($json);
if($json->code == 200){
echo "[$xx][$in] Claim Reward: OK - ".$json->data->credit."\n";
}else{
echo "Claim Reward: ".$decs."\n";
}
}
$xx++;
if($xx % 2 == 0){
	echo exec("clear");
//	banner();
}
timer(rand(6,20));
}
